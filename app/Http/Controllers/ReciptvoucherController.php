<?php

namespace App\Http\Controllers;

use App\DataTables\ReciptvoucherDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReciptvoucherRequest;
use App\Http\Requests\UpdateReciptvoucherRequest;
use App\Repositories\ReciptvoucherRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Account;
use App\Models\AccountsHead;
use App\Models\Banks;
use App\Models\JobOrder;
use App\Models\Tax;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Scottlaurent\Accounting\Services\Accounting as AccountingService;
use Response;

class ReciptvoucherController extends AppBaseController
{
    /** @var ReciptvoucherRepository $reciptvoucherRepository*/
    private $reciptvoucherRepository;

    public function __construct(ReciptvoucherRepository $reciptvoucherRepo)
    {
        $this->reciptvoucherRepository = $reciptvoucherRepo;
    }

    /**
     * Display a listing of the Reciptvoucher.
     *
     * @param ReciptvoucherDataTable $reciptvoucherDataTable
     *
     * @return Response
     */
    public function index(ReciptvoucherDataTable $reciptvoucherDataTable)
    {
        return $reciptvoucherDataTable->render('reciptvouchers.index');
    }

    /**
     * Show the form for creating a new Reciptvoucher.
     *
     * @return Response
     */
    public function create()
    {
        // $bank=AccountsHead::where('')get();
        $bank=Account::where('head_id',12)->get();
        // Banks::get();
        $accounts=Account::get();
        return view('reciptvouchers.create')->with('bank',$bank)
        ->with('account',$accounts)
        ->with('vendors',Vendor::get())
        ->with('joborders',JobOrder::get())
        ->with('taxs',Tax::get());
    }

    /**
     * Store a newly created Reciptvoucher in storage.
     *
     * @param CreateReciptvoucherRequest $request
     *
     * @return Response
     */
    public function store(CreateReciptvoucherRequest $request)
    {
        $input = $request->all();
        // dd($input);
        $bank=Account::find($input['bank_account']);
        $account=Account::find($input['credit_account']);
        // $bank->journal;
        // $account->journal
        $transaction_group = AccountingService::newDoubleEntryTransactionGroup();
        $transaction_group->addDollarTransaction($bank->journal, 'debit', $input['amount'],$input['description']);
        $transaction_group->addDollarTransaction($account->journal, 'credit', $input['amount'],$input['description']);
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

        $reciptvoucher = $this->reciptvoucherRepository->create($input);
        if(isset($taxes)){
            foreach($taxes as $t){
                $reciptvoucher->taxes()->create(['tax_id'=>$t]);
            }
        }

        Flash::success(__('messages.saved', ['model' => __('models/reciptvouchers.singular')]));

        return redirect(route('reciptvouchers.index'));
    }

    /**
     * Display the specified Reciptvoucher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reciptvoucher = $this->reciptvoucherRepository->find($id);

        if (empty($reciptvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reciptvouchers.singular')]));

            return redirect(route('reciptvouchers.index'));
        }
        // dd($reciptvoucher->account);

        return view('reciptvouchers.receiptvoucher')->with('pay', $reciptvoucher);
    }

    /**
     * Show the form for editing the specified Reciptvoucher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reciptvoucher = $this->reciptvoucherRepository->find($id);

        if (empty($reciptvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reciptvouchers.singular')]));

            return redirect(route('reciptvouchers.index'));
        }

        $bank=Account::where('head_id',12)->get();

        return view('reciptvouchers.edit')->with('reciptvoucher', $reciptvoucher)
        ->with('bank',$bank)
        ->with('account',Account::get())
        ->with('vendors',Vendor::get())
        ->with('joborders',JobOrder::get())
        ->with('taxs',Tax::get());
    }

    /**
     * Update the specified Reciptvoucher in storage.
     *
     * @param int $id
     * @param UpdateReciptvoucherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReciptvoucherRequest $request)
    {
        $reciptvoucher = $this->reciptvoucherRepository->find($id);

        if (empty($reciptvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reciptvouchers.singular')]));

            return redirect(route('reciptvouchers.index'));
        }

        $reciptvoucher = $this->reciptvoucherRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/reciptvouchers.singular')]));

        return redirect(route('reciptvouchers.index'));
    }

    /**
     * Remove the specified Reciptvoucher from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reciptvoucher = $this->reciptvoucherRepository->find($id);

        if (empty($reciptvoucher)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reciptvouchers.singular')]));

            return redirect(route('reciptvouchers.index'));
        }

        $this->reciptvoucherRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/reciptvouchers.singular')]));

        return redirect(route('reciptvouchers.index'));
    }
}
