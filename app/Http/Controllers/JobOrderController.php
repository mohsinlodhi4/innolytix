<?php

namespace App\Http\Controllers;

use App\DataTables\JobOrderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJobOrderRequest;
use App\Http\Requests\UpdateJobOrderRequest;
use App\Models\Invoices;
use App\Models\JobOrder;
use App\Repositories\JobOrderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Account;
use App\Models\AccountsHead;
use App\Models\Clients;
use Scottlaurent\Accounting\Models\Ledger;
use Illuminate\Support\Facades\Auth;
use Response;

class JobOrderController extends AppBaseController
{
    /** @var JobOrderRepository $jobOrderRepository*/
    private $jobOrderRepository;

    public function __construct(JobOrderRepository $jobOrderRepo)
    {
        $this->jobOrderRepository = $jobOrderRepo;
    }

    /**
     * Display a listing of the JobOrder.
     *
     * @param JobOrderDataTable $jobOrderDataTable
     *
     * @return Response
     */
    public function index(JobOrderDataTable $jobOrderDataTable)
    {
        return $jobOrderDataTable->render('job_orders.index');
    }

    /**
     * Show the form for creating a new JobOrder.
     *
     * @return Response
     */
    public function create()
    {
        return view('job_orders.create')->with('clients',Clients::get());
    }

    /**
     * Store a newly created JobOrder in storage.
     *
     * @param CreateJobOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateJobOrderRequest $request)
    {

        // dd($ledger);
        $input = $request->all();
        $input['created_by']=Auth::id();
        $jobOrder = JobOrder::create($input);

        $heads=AccountsHead::where('name','Accounts Receivables')->first();
        $this->company_asset_ledger=Ledger::where('type','asset')->first();

        $account=[
            'name' => $input['unique_id'],
            'head_id' => $heads->id,
            'type' => 'joborder',
            'type_id'=>$jobOrder->id,
        ];

        $this->company_expense_journal = Account::create($account)->initJournal();
        $this->company_expense_journal->assignToLedger($this->company_asset_ledger);

        Flash::success(__('messages.saved', ['model' => __('models/jobOrders.singular')]));

        return redirect(route('jobOrders.index'));
    }

    /**
     * Display the specified JobOrder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jobOrder = JobOrder::find($id);
        // locate a user (or ANY MODEL that implementes the AccountingJournal trait)
        $current_balance = $jobOrder->journal->transactions;
        dd($current_balance);
         // locate a product (optional)
         $product = Invoices::find(5);

         // init a journal for this user (do this only once)
         // $jobOrder->initJournal();

         // credit the user and reference the product
         $transaction_1 = $jobOrder->journal->creditDollars(100);
         $transaction_1->referencesObject($product);

         // check our balance (should be 100)
         $current_balance = $jobOrder->journal->getCurrentBalanceInDollars();

         // debit the user
         $transaction_2 = $jobOrder->journal->debitDollars(75);

         // check our balance (should be 25)
         $current_balance2 = $jobOrder->journal->getCurrentBalanceInDollars();

         //get the product referenced in the journal (optional)
         $product_copy = $transaction_1->getReferencedObject();
         dd($current_balance,$current_balance2,$product_copy);
      // $this->company_expense_ledger = Ledger::create([
     //     'name' => 'Company Expenses',
     //     'type' => 'expense'
     // ]);
// $this->company_ar_journal = Account::create(['name' => 'Company Accounts Receivable'])->initJournal();
     // $this->company_ar_journal->assignToLedger($this->company_assets_ledger);
        $jobOrder = $this->jobOrderRepository->find($id);

        if (empty($jobOrder)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jobOrders.singular')]));

            return redirect(route('jobOrders.index'));
        }

        return view('job_orders.show')->with('jobOrder', $jobOrder);
    }

    /**
     * Show the form for editing the specified JobOrder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jobOrder = $this->jobOrderRepository->find($id);

        if (empty($jobOrder)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jobOrders.singular')]));

            return redirect(route('jobOrders.index'));
        }

        return view('job_orders.edit')->with('jobOrder', $jobOrder);
    }

    /**
     * Update the specified JobOrder in storage.
     *
     * @param int $id
     * @param UpdateJobOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJobOrderRequest $request)
    {
        $jobOrder = $this->jobOrderRepository->find($id);

        if (empty($jobOrder)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jobOrders.singular')]));

            return redirect(route('jobOrders.index'));
        }

        $jobOrder = $this->jobOrderRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/jobOrders.singular')]));

        return redirect(route('jobOrders.index'));
    }

    /**
     * Remove the specified JobOrder from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jobOrder = $this->jobOrderRepository->find($id);

        if (empty($jobOrder)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jobOrders.singular')]));

            return redirect(route('jobOrders.index'));
        }

        $this->jobOrderRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/jobOrders.singular')]));

        return redirect(route('jobOrders.index'));
    }
}
