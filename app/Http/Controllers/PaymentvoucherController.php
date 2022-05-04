<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentvoucherDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePaymentvoucherRequest;
use App\Http\Requests\UpdatePaymentvoucherRequest;
use App\Repositories\PaymentvoucherRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Account;
use App\Models\Banks;
use App\Models\JobOrder;
use App\Models\Tax;
use App\Models\Vendor;

use Illuminate\Support\Facades\Auth;
use Scottlaurent\Accounting\Services\Accounting as AccountingService;
use Response;

class PaymentvoucherController extends AppBaseController
{
    /** @var PaymentvoucherRepository $paymentvoucherRepository*/
    private $paymentvoucherRepository;

    public function __construct(PaymentvoucherRepository $paymentvoucherRepo)
    {
        $this->paymentvoucherRepository = $paymentvoucherRepo;
    }

    /**
     * Display a listing of the Paymentvoucher.
     *
     * @param PaymentvoucherDataTable $paymentvoucherDataTable
     *
     * @return Response
     */
    public function index(PaymentvoucherDataTable $paymentvoucherDataTable)
    {
        return $paymentvoucherDataTable->render('paymentvouchers.index');
    }

    /**
     * Show the form for creating a new Paymentvoucher.
     *
     * @return Response
     */
    public function create()
    {
        $bank=Banks::get();
        $accounts=Account::get();
        $joborders = JobOrder::get();
        $vendors = Vendor::get();
        $taxs = Tax::get();
        return view('paymentvouchers.create')->with('bank',$bank)
        ->with('account',$accounts)->with('joborders',$joborders)
        ->with('vendors',$vendors)->with('taxs',$taxs);
        // return view('paymentvouchers.create');
    }

    /**
     * Store a newly created Paymentvoucher in storage.
     *
     * @param CreatePaymentvoucherRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentvoucherRequest $request)
    {
        $request->validate([
            'bank_account'=>'required',
            'dabit_account'=>'required',
            'cheque_date'=>'required',
            'amount'=>'required',
        ]);
        $input = $request->all();
        $bank=Banks::find($input['bank_account']);
        $account=Account::find($input['dabit_account']);
        // For BankAccount Journal
        $bank_account = Account::where([
            ['type','bank'],
            ['type_id',$bank->id],
        ])->first();
        $transaction_group = AccountingService::newDoubleEntryTransactionGroup();
        $transaction_group->addDollarTransaction($account->journal, 'debit', $input['amount'],$input['description']);
        $transaction_group->addDollarTransaction($bank_account->journal, 'credit', $input['amount'],$input['description']);
        // $transaction_group->addDollarTransaction($account->journal, 'credit', $input['amount'],$input['description']);
        // $transaction_group->addDollarTransaction($bank_account->journal, 'debit', $input['amount'],$input['description']);
        $transaction_group_uuid = $transaction_group->commit();
        $input['created_by']=Auth::id();

        $input['ref'] = random_strings()."/".date('m/d');
        $input['grand_total'] = $input['amount'];
        if(isset($input['tax_id'])){
            $taxes = $input['tax_id'];
            foreach($taxes as $t){
                $input['grand_total'] += round($input['amount'] * (Tax::find($t)->percent)/100);
            }
            $input['tax_id'] = 1;
        }


        $paymentvoucher = $this->paymentvoucherRepository->create($input);
        if(isset($taxes)){
            foreach($taxes as $t){
                $paymentvoucher->taxes()->create(['tax_id'=>$t]);
            }
        }

        Flash::success(__('messages.saved', ['model' => __('models/paymentvouchers.singular')]));

        return redirect(route('paymentvouchers.index'));
    }

    /**
     * Display the specified Paymentvoucher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paymentvoucher = $this->paymentvoucherRepository->find($id);

        if (empty($paymentvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/paymentvouchers.singular')]));

            return redirect(route('paymentvouchers.index'));
        }

        return view('paymentvouchers.paymentvoucher')->with('pay', $paymentvoucher);
    }

    /**
     * Show the form for editing the specified Paymentvoucher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paymentvoucher = $this->paymentvoucherRepository->find($id);

        if (empty($paymentvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/paymentvouchers.singular')]));

            return redirect(route('paymentvouchers.index'));
        }

        return view('paymentvouchers.edit')->with('paymentvoucher', $paymentvoucher);
    }

    /**
     * Update the specified Paymentvoucher in storage.
     *
     * @param int $id
     * @param UpdatePaymentvoucherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentvoucherRequest $request)
    {
        $paymentvoucher = $this->paymentvoucherRepository->find($id);

        if (empty($paymentvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/paymentvouchers.singular')]));

            return redirect(route('paymentvouchers.index'));
        }

        $paymentvoucher = $this->paymentvoucherRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/paymentvouchers.singular')]));

        return redirect(route('paymentvouchers.index'));
    }

    /**
     * Remove the specified Paymentvoucher from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paymentvoucher = $this->paymentvoucherRepository->find($id);

        if (empty($paymentvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/paymentvouchers.singular')]));

            return redirect(route('paymentvouchers.index'));
        }

        $this->paymentvoucherRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/paymentvouchers.singular')]));

        return redirect(route('paymentvouchers.index'));
    }
}
