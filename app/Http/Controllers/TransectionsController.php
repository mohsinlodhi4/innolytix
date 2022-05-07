<?php

namespace App\Http\Controllers;

use App\DataTables\TransectionsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransectionsRequest;
use App\Http\Requests\UpdateTransectionsRequest;
use App\Models\User;
use App\Models\Banks;
use App\Models\Account;
use App\Models\JobOrder;
use App\Models\OfficeDetails;
use App\Models\Tax;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TransectionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Validation\ValidationException;

class TransectionsController extends AppBaseController
{
    /** @var TransectionsRepository $transectionsRepository*/
    private $transectionsRepository;

    public function __construct(TransectionsRepository $transectionsRepo)
    {
        $this->transectionsRepository = $transectionsRepo;
    }

    /**
     * Display a listing of the Transections.
     *
     * @param TransectionsDataTable $transectionsDataTable
     *
     * @return Response
     */
    public function index(TransectionsDataTable $transectionsDataTable)
    {
        return $transectionsDataTable->render('transections.index');
    }

    /**
     * Show the form for creating a new Transections.
     *
     * @return Response
     */
    public function create()
    {
        return view('transections.create')
        ->with('joborders',JobOrder::all())
        ->with('officedetails',OfficeDetails::all())
        ->with('taxs',Tax::all())
        ->with('vendors',Vendor::all())
        ->with('banks',Banks::all());
    }

    /**
     * Store a newly created Transections in storage.
     *
     * @param CreateTransectionsRequest $request
     *
     * @return Response
     */
    public function store(CreateTransectionsRequest $request)
    {
        $request->validate([
            'bank_id'=>'required',
            'type'=>'required',
            'amount'=>'required',
        ]);
        $input = $request->all();
        $input['created_by']=Auth::id();
        // Transaction Journal Entry
        $bank_account = Account::where([
            ['type','bank'],
            ['type_id',$input['bank_id']],
        ])->first();
        if(!$bank_account){
            throw ValidationException::withMessages(['Bank_Account' => 'This Account Does not Exist']);
        }
        if($input['type'] == 'recieved'){
            $transaction_1 = $bank_account->journal->creditDollars($input['amount']);
        }else{
            $transaction_1 = $bank_account->journal->debitDollars($input['amount']);
        }
        // Transaction Journal Entry End
        $transections = $this->transectionsRepository->create($input);


        Flash::success(__('messages.saved', ['model' => __('models/transections.singular')]));

        return redirect(route('transections.index'));
    }

    /**
     * Display the specified Transections.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transections = $this->transectionsRepository->find($id);

        if (empty($transections)) {
            Flash::error(__('messages.not_found', ['model' => __('models/transections.singular')]));

            return redirect(route('transections.index'));
        }
        $transections = $transections->toArray();
        $transections['joborder_id'] = optional(JobOrder::find($transections['joborder_id']))->unique_id ?? null;
        $bank = Banks::find($transections['bank_id']);
        if($bank){
            $transections['bank_id'] = $bank->bank_name." - ". $bank->account_title;
        }
        $transections['created_by'] = optional(User::find($transections['created_by']))->name;
        return view('transections.show')->with('transections', (object)$transections);
    }

    /**
     * Show the form for editing the specified Transections.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transections = $this->transectionsRepository->find($id);

        if (empty($transections)) {
            Flash::error(__('messages.not_found', ['model' => __('models/transections.singular')]));

            return redirect(route('transections.index'));
        }

        return view('transections.edit')->with('transections', $transections);
    }

    /**
     * Update the specified Transections in storage.
     *
     * @param int $id
     * @param UpdateTransectionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransectionsRequest $request)
    {
        $transections = $this->transectionsRepository->find($id);

        if (empty($transections)) {
            Flash::error(__('messages.not_found', ['model' => __('models/transections.singular')]));

            return redirect(route('transections.index'));
        }

        $transections = $this->transectionsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/transections.singular')]));

        return redirect(route('transections.index'));
    }

    /**
     * Remove the specified Transections from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transections = $this->transectionsRepository->find($id);

        if (empty($transections)) {
            Flash::error(__('messages.not_found', ['model' => __('models/transections.singular')]));

            return redirect(route('transections.index'));
        }

        $this->transectionsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/transections.singular')]));

        return redirect(route('transections.index'));
    }
}
