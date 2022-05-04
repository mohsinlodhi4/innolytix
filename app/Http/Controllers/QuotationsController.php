<?php

namespace App\Http\Controllers;

use App\DataTables\QuotationsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateQuotationsRequest;
use App\Http\Requests\UpdateQuotationsRequest;
use App\Models\Clients;
use App\Models\OfficeDetails;
use App\Models\QuotationProducts;
use App\Models\Quotations;
use App\Models\Tax;
use App\Models\Vendor;
use App\Repositories\QuotationsRepository;
use Flash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use Response;

class QuotationsController extends AppBaseController
{
    /** @var QuotationsRepository $quotationsRepository*/
    private $quotationsRepository;

    public function __construct(QuotationsRepository $quotationsRepo)
    {
        $this->quotationsRepository = $quotationsRepo;
    }

    /**
     * Display a listing of the Quotations.
     *
     * @param QuotationsDataTable $quotationsDataTable
     *
     * @return Response
     */
    public function index(QuotationsDataTable $quotationsDataTable)
    {
        return $quotationsDataTable->render('quotations.index');
    }

    /**
     * Show the form for creating a new Quotations.
     *
     * @return Response
     */
    public function create()
    {
        // $clients=;
        return view('quotations.create')->with('clients',Clients::all())->with('officedetails',OfficeDetails::all())->with('taxs',Tax::all())->with('vendors',Vendor::all());
    }

    /**
     * Store a newly created Quotations in storage.
     *
     * @param CreateQuotationsRequest $request
     *
     * @return Response
     */
    public function store(CreateQuotationsRequest $request)
    {
        $request->validate([
            'date'=>'required',
        ]);
        $input = $request->all();
        $products=$input['product'];
        unset($input['product']);

        $subtotal=0;
        foreach($products as $k=>$pro){
            $products[$k]['total']=$pro['qty']*$pro['unitprice'];
            $subtotal+=$pro['qty']*$pro['unitprice'];
        }
        $input['created_by']=Auth::id();
        $input['sub_total']=$subtotal;
        $discount=($input['discount']/100)*$subtotal;
        $total_tax = 0;
        if(isset($input['tax'])){
            foreach($input['tax'] as $t){
                $total_tax += $t;
            }
        }
        $input['tax'] = $total_tax;
        $tax=($total_tax/100)*$subtotal;
        $input['grand_total']=$subtotal+$tax-$discount;
        $quotations = $this->quotationsRepository->create($input);
        if($quotations){
            foreach($products as $k=>$pro){
                $products[$k]['quotation_id']=$quotations->id;
                QuotationProducts::create($products[$k]);
            }
        }
        // return view('quotations.quotation')->with('quotation',);
        Flash::success(__('messages.saved', ['model' => __('models/quotations.singular')]));

        return redirect(route('quotations.index'));
    }

    /**
     * Display the specified Quotations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quotations = $this->quotationsRepository->find($id);
        if (empty($quotations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/quotations.singular')]));

            return redirect(route('quotations.index'));
        }
        // dd($quotations);
        return view('quotations.quotation')
        ->with('quotations', $quotations)
        ->with('products',QuotationProducts::where('quotation_id',$quotations->id)->get())
        ->with('client',Clients::find($quotations->client_id))
        ->with('office_detail',OfficeDetails::find($quotations->officedetails_id));
        // return view('quotations.show')->with('quotations', $quotations);
    }

    /**
     * Show the form for editing the specified Quotations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quotations = $this->quotationsRepository->find($id);

        if (empty($quotations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/quotations.singular')]));

            return redirect(route('quotations.index'));
        }

        return view('quotations.edit')->with('quotations', $quotations)->with('clients',Clients::all())
        ->with('officedetails',OfficeDetails::all())
        ->with('taxs',Tax::all())->with('vendors',Vendor::all());
    }

    /**
     * Update the specified Quotations in storage.
     *
     * @param int $id
     * @param UpdateQuotationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuotationsRequest $request)
    {
        $quotations = $this->quotationsRepository->find($id);

        if (empty($quotations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/quotations.singular')]));

            return redirect(route('quotations.index'));
        }

        $quotations = $this->quotationsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/quotations.singular')]));

        return redirect(route('quotations.index'));
    }

    /**
     * Remove the specified Quotations from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quotations = $this->quotationsRepository->find($id);

        if (empty($quotations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/quotations.singular')]));

            return redirect(route('quotations.index'));
        }

        $this->quotationsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/quotations.singular')]));

        return redirect(route('quotations.index'));
    }
}
