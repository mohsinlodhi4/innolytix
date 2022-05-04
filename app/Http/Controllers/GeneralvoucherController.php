<?php

namespace App\Http\Controllers;

use App\DataTables\GeneralvoucherDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGeneralvoucherRequest;
use App\Http\Requests\UpdateGeneralvoucherRequest;
use App\Repositories\GeneralvoucherRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Account;
use App\Models\Banks;
use App\Models\JobOrder;
use Illuminate\Support\Facades\Auth;
use Scottlaurent\Accounting\Models\Journal;
use Scottlaurent\Accounting\Services\Accounting as AccountingService;
use Response;

class GeneralvoucherController extends AppBaseController
{
    /** @var GeneralvoucherRepository $generalvoucherRepository*/
    private $generalvoucherRepository;

    public function __construct(GeneralvoucherRepository $generalvoucherRepo)
    {
        $this->generalvoucherRepository = $generalvoucherRepo;
    }

    /**
     * Display a listing of the Generalvoucher.
     *
     * @param GeneralvoucherDataTable $generalvoucherDataTable
     *
     * @return Response
     */
    public function index(GeneralvoucherDataTable $generalvoucherDataTable)
    {
        return $generalvoucherDataTable->render('generalvouchers.index');
    }

    /**
     * Show the form for creating a new Generalvoucher.
     *
     * @return Response
     */
    public function create()
    {
        $joborder=JobOrder::get();
        $accounts=Account::get();
        $bank=Banks::get();
        return view('generalvouchers.create')->with('bank',$bank)->with('account',$accounts)->with('joborder',$joborder);
        // return view('generalvouchers.create');
    }

    /**
     * Store a newly created Generalvoucher in storage.
     *
     * @param CreateGeneralvoucherRequest $request
     *
     * @return Response
     */
    public function store(CreateGeneralvoucherRequest $request)
    {
        $input = $request->all();
        
        $caccount=Account::find($input['c_coa_account']);
        // $bank=Banks::find($input['bank_account']);
        $Daccount=Account::find($input['d_coa_account']);
        $transaction_group = AccountingService::newDoubleEntryTransactionGroup();
        $transaction_group->addDollarTransaction($Daccount->journal, 'debit', $input['amount'],$input['description']);
        $transaction_group->addDollarTransaction($caccount->journal, 'credit', $input['amount'],$input['description']);
        $transaction_group_uuid = $transaction_group->commit();
        $input['created_by']=Auth::id();

        $input['ref'] = random_strings()."/".date('m/d');

        $input['credit_account'] = $input['c_coa_account'];
        $input['dabit_account'] = $input['d_coa_account'];

        $generalvoucher = $this->generalvoucherRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/generalvouchers.singular')]));

        return redirect(route('generalvouchers.index'));
    }

    /**
     * Display the specified Generalvoucher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $generalvoucher = $this->generalvoucherRepository->find($id);

        if (empty($generalvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generalvouchers.singular')]));

            return redirect(route('generalvouchers.index'));
        }

        // return view('generalvouchers.show')->with('generalvoucher', $generalvoucher);
        return view('generalvouchers.generalvoucher')->with('pay', $generalvoucher);
    }

    /**
     * Show the form for editing the specified Generalvoucher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $generalvoucher = $this->generalvoucherRepository->find($id);

        if (empty($generalvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generalvouchers.singular')]));

            return redirect(route('generalvouchers.index'));
        }

        return view('generalvouchers.edit')->with('generalvoucher', $generalvoucher);
    }

    /**
     * Update the specified Generalvoucher in storage.
     *
     * @param int $id
     * @param UpdateGeneralvoucherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGeneralvoucherRequest $request)
    {
        $generalvoucher = $this->generalvoucherRepository->find($id);

        if (empty($generalvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generalvouchers.singular')]));

            return redirect(route('generalvouchers.index'));
        }

        $generalvoucher = $this->generalvoucherRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/generalvouchers.singular')]));

        return redirect(route('generalvouchers.index'));
    }

    /**
     * Remove the specified Generalvoucher from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $generalvoucher = $this->generalvoucherRepository->find($id);

        if (empty($generalvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generalvouchers.singular')]));

            return redirect(route('generalvouchers.index'));
        }

        $this->generalvoucherRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/generalvouchers.singular')]));

        return redirect(route('generalvouchers.index'));
    }
}
