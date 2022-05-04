<?php

namespace App\Http\Controllers;

use App\DataTables\PurchaseOrderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Repositories\PurchaseOrderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Vendor;
use App\Models\JobOrder;
use App\Models\OfficeDetails;
use App\Models\Tax;
use App\Models\Banks;
use App\Models\Clients;
use App\Models\Purchaseorderproducts;
use Response;
use DB;

class PurchaseOrderController extends AppBaseController
{
    /** @var PurchaseOrderRepository $purchaseOrderRepository*/
    private $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepo)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepo;
    }

    /**
     * Display a listing of the PurchaseOrder.
     *
     * @param PurchaseOrderDataTable $purchaseOrderDataTable
     *
     * @return Response
     */
    public function index(PurchaseOrderDataTable $purchaseOrderDataTable)
    {
        return $purchaseOrderDataTable->render('purchase_orders.index');
    }

    /**
     * Show the form for creating a new PurchaseOrder.
     *
     * @return Response
     */
    public function create()
    {
        $banks = Banks::select(DB::raw("CONCAT(bank_name,' -',account_title,' -',account_no) as bank, id"))->get();
        return view('purchase_orders.create')->with('vendors',Vendor::get())
            ->with('joborders',JobOrder::get())
            ->with('office_details',OfficeDetails::get())
            ->with('taxs',Tax::get())
            ->with('banks',$banks);
    }

    /**
     * Store a newly created PurchaseOrder in storage.
     *
     * @param CreatePurchaseOrderRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseOrderRequest $request)
    {
        $input = $request->all();
        $products=$input['product'];
        unset($input['product']);

        $subtotal=0;
        foreach($products as $k=>$pro){
            $products[$k]['total']=$pro['qty']*$pro['unitprice'];
            $subtotal+=$pro['qty']*$pro['unitprice'];
        }
        $input['created_by']=auth()->id();
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


        $purchaseOrder = $this->purchaseOrderRepository->create($input);
        if($purchaseOrder){
            foreach($products as $k=>$pro){
                $products[$k]['purchaseorder_id']=$purchaseOrder->id;
                Purchaseorderproducts::create($products[$k]);
            }
        }

        Flash::success(__('messages.saved', ['model' => __('models/purchaseOrders.singular')]));

        return redirect(route('purchaseOrders.index'));
    }

    /**
     * Display the specified PurchaseOrder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchaseOrder = $this->purchaseOrderRepository->find($id);

        if (empty($purchaseOrder)) {
            Flash::error(__('messages.not_found', ['model' => __('models/purchaseOrders.singular')]));

            return redirect(route('purchaseOrders.index'));
        }
        // return view('purchase_orders.show')->with('purchaseOrder', $purchaseOrder);
        return view('purchase_orders.purchaseorder')->with('quotations', $purchaseOrder)
            ->with('products',Purchaseorderproducts::where('purchaseorder_id',$purchaseOrder->id)->get())
            ->with('client',OfficeDetails::find($purchaseOrder->officedetail_id))
            // ->with('office_detail',OfficeDetails::find($purchaseOrder->officedetails_id))
            ->with('office_detail',Vendor::find($purchaseOrder->vendor_id));
    }

    /**
     * Show the form for editing the specified PurchaseOrder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchaseOrder = $this->purchaseOrderRepository->find($id);

        if (empty($purchaseOrder)) {
            Flash::error(__('messages.not_found', ['model' => __('models/purchaseOrders.singular')]));

            return redirect(route('purchaseOrders.index'));
        }

        $banks = Banks::select(DB::raw("CONCAT(bank_name,' -',account_title,' -',account_no) as bank, id"))->get();
        return view('purchase_orders.edit')->with('purchaseOrder', $purchaseOrder)
        ->with('vendors',Vendor::get())
        ->with('joborders',JobOrder::get())
            ->with('office_details',OfficeDetails::get())
            ->with('taxs',Tax::get())
            ->with('banks',$banks);
    }

    /**
     * Update the specified PurchaseOrder in storage.
     *
     * @param int $id
     * @param UpdatePurchaseOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseOrderRequest $request)
    {
        $purchaseOrder = $this->purchaseOrderRepository->find($id);

        if (empty($purchaseOrder)) {
            Flash::error(__('messages.not_found', ['model' => __('models/purchaseOrders.singular')]));

            return redirect(route('purchaseOrders.index'));
        }

        $purchaseOrder = $this->purchaseOrderRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/purchaseOrders.singular')]));

        return redirect(route('purchaseOrders.index'));
    }

    /**
     * Remove the specified PurchaseOrder from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchaseOrder = $this->purchaseOrderRepository->find($id);

        if (empty($purchaseOrder)) {
            Flash::error(__('messages.not_found', ['model' => __('models/purchaseOrders.singular')]));

            return redirect(route('purchaseOrders.index'));
        }

        $this->purchaseOrderRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/purchaseOrders.singular')]));

        return redirect(route('purchaseOrders.index'));
    }
}
