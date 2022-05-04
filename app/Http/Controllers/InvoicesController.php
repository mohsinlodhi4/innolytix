<?php

namespace App\Http\Controllers;

use App\DataTables\InvoicesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInvoicesRequest;
use App\Http\Requests\UpdateInvoicesRequest;
use App\Models\Banks;
use App\Repositories\InvoicesRepository;
use App\Models\Clients;
use App\Models\Invoices;
use App\Models\JobOrder;
use App\Models\InvoicesProducts;
use App\Models\OfficeDetails;
use App\Models\Tax;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\User;
use App\Models\Account;
use App\Models\CompanyJournal;
use Scottlaurent\Accounting\Models\Ledger;
use Scottlaurent\Accounting\Models\Journal;
use Scottlaurent\Accounting\Models\JournalTransaction;
use Scottlaurent\Accounting\Services\Accounting as AccountingService;
use Scottlaurent\Accounting\Providers\AccountingServiceProvider;


class InvoicesController extends AppBaseController
{
    /** @var InvoicesRepository $invoicesRepository*/
    private $invoicesRepository;

    public function __construct(InvoicesRepository $invoicesRepo)
    {
        $this->invoicesRepository = $invoicesRepo;
    }

    /**
     * Display a listing of the Invoices.
     *
     * @param InvoicesDataTable $invoicesDataTable
     *
     * @return Response
     */
    public function index(InvoicesDataTable $invoicesDataTable)
    {
        return $invoicesDataTable->render('invoices.index');
    }

    /**
     * Show the form for creating a new Invoices.
     *
     * @return Response
     */
    public function create()
    {

        // $this->company_assets_ledger = Ledger::create([
        //     'name' => 'Company Assets',
        //     'type' => 'asset'
        // ]);

        // $this->company_liability_ledger = Ledger::create([
        //     'name' => 'Company Liabilities',
        //     'type' => 'liability'
        // ]);

        // $this->company_equity_ledger = Ledger::create([
        //     'name' => 'Company Equity',
        //     'type' => 'equity'
        // ]);

        // $this->company_income_ledger = Ledger::create([
        //     'name' => 'Company Income',
        //     'type' => 'income'
        // ]);

        // $this->company_expense_ledger = Ledger::create([
        //     'name' => 'Company Expenses',
        //     'type' => 'expense'
        // ]);
        // //
        // $company_ar_journal = Account::where('name', 'Company Accounts Receivable')->first();
        // $company_cash_journal = Account::where('name','Company Asset Account')->first();
        // $this->company_ar_journal = Account::get();
        // dd($this->company_ar_journal);
        // dd($company_cash_journal->journal->transactions);
        // $this->company_ar_journal = Account::create(['name' => 'Company Accounts Receivable'])->initJournal();
        // $this->company_ar_journal->assignToLedger($this->company_assets_ledger);

        // $this->company_asset_journal = Account::create(['name' => 'Company Asset Account'])->initJournal();
        // $this->company_asset_journal->assignToLedger($this->company_assets_ledger);

        // $this->company_cash_journal = Account::create(['name' => 'Company Patty Cash'])->initJournal();
        // $this->company_cash_journal->assignToLedger($this->company_assets_ledger);

        // $this->company_expense_journal = Account::create(['name' => 'Company Expense Account'])->initJournal();
        // $this->company_expense_journal->assignToLedger($this->company_expense_ledger);

        // $this->company_libality_journal = Account::create(['name' => 'Company Accounts Payable'])->initJournal();
        // // $this->company_libality_journal->assignToLedger($this->company_liability_ledger);
        // // this represents some kind of sale to a customer for $500 based on an invoiced ammount of 500.
        // // $user = Auth::user();
        // $transaction_group = AccountingService::newDoubleEntryTransactionGroup();
        // $transaction_group->addDollarTransaction($this->$company_ar_journal, 'debit', 100);
        // $transaction_group->addDollarTransaction($this->company_ar_journal, 'credit', 100);
        // $transaction_group->addDollarTransaction($this->company_cash_journal, 'credit', 75);
        // $transaction_group->addDollarTransaction($this->company_libality_journal, 'credit', 25);
        // $transaction_group_uuid = $transaction_group->commit();
        // $current_balance1 = $this->company_assets_ledger->getCurrentBalanceInDollars();
        // $current_balance2 = $this->company_liability_ledger->getCurrentBalanceInDollars();
        // $current_balance3 = $this->company_expense_ledger->getCurrentBalanceInDollars();


        // dd($current_balance1,$current_balance2,$current_balance3);
        // dd(JournalTransaction::where('transaction_group', $transaction_group_uuid)->get());
        // this represents some kind of sale to a customer for $500 based on an invoiced ammount of 500.
        // $transaction_group = AccountingService::newDoubleEntryTransactionGroup();
        // $transaction_group->addDollarTransaction($this->company_cash_journal,'credit',500);  // your user journal probably is an income ledger
        // $transaction_group->addDollarTransaction($this->company_ar_journal,'debit',500); // this is an asset ledder
        // $transaction_group->commit();
        //
        return view('invoices.create')
        ->with('joborders',JobOrder::all())
        ->with('officedetails',OfficeDetails::all())
        ->with('taxs',Tax::all())
        ->with('vendors',Vendor::all())
        ->with('banks',Banks::all());
    }

    /**
     * Store a newly created Invoices in storage.
     *
     * @param CreateInvoicesRequest $request
     *
     * @return Response
     */
    public function store(CreateInvoicesRequest $request)
    {
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
        $tax=($input['tax']/100)*$subtotal;
        $input['grand_total']=$subtotal+$tax-$discount;

        $invoices = $this->invoicesRepository->create($input);

    // locate a product (optional)

    $this->company_ar_journal = Account::find(29);
    $this->joborder = Account::where('type_id',$invoices->joborder_id)->where('type','joborder')->first();

    $transaction_group = AccountingService::newDoubleEntryTransactionGroup();
    $transaction_group->addDollarTransaction($this->joborder->journal, 'debit', $input['grand_total'],'Invoice to customer',$invoices);
    $transaction_group->addDollarTransaction($this->company_ar_journal->journal,'credit', $input['grand_total'],'Invoice to customer',$invoices);
    $transaction_group_uuid = $transaction_group->commit();

        if($invoices){
            foreach($products as $k=>$pro){
                $products[$k]['invoice_id']=$invoices->id;
                InvoicesProducts::create($products[$k]);
            }
        }

        Flash::success(__('messages.saved', ['model' => __('models/invoices.singular')]));

        return redirect(route('invoices.index'));
    }

    /**
     * Display the specified Invoices.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoices = $this->invoicesRepository->find($id);

        if (empty($invoices)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoices.singular')]));

            return redirect(route('invoices.index'));
        }
        return view('invoices.invoice')
        ->with('invoices', $invoices)
        ->with('products',InvoicesProducts::where('invoice_id',$invoices->id)->get())
        ->with('joborder',JobOrder::find($invoices->joborder_id)->with('client')->first())
        ->with('office_detail',OfficeDetails::find($invoices->officedetails_id));
        // return view('invoices.show')->with('invoices', $invoices);
    }

    /**
     * Show the form for editing the specified Invoices.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoices = $this->invoicesRepository->find($id);

        if (empty($invoices)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoices.singular')]));

            return redirect(route('invoices.index'));
        }

        return view('invoices.edit')->with('invoices', $invoices)
        ->with('joborders', JobOrder::get())
        ->with('officedetails',OfficeDetails::all())
        ->with('taxs',Tax::all())
        ->with('vendors',Vendor::all())
        ->with('banks',Banks::all());
    }

    /**
     * Update the specified Invoices in storage.
     *
     * @param int $id
     * @param UpdateInvoicesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvoicesRequest $request)
    {
        $invoices = $this->invoicesRepository->find($id);

        if (empty($invoices)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoices.singular')]));

            return redirect(route('invoices.index'));
        }

        $invoices = $this->invoicesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/invoices.singular')]));

        return redirect(route('invoices.index'));
    }

    /**
     * Remove the specified Invoices from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoices = $this->invoicesRepository->find($id);

        if (empty($invoices)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoices.singular')]));

            return redirect(route('invoices.index'));
        }

        $this->invoicesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/invoices.singular')]));

        return redirect(route('invoices.index'));
    }
}
