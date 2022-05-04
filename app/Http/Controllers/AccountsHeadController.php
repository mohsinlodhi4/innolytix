<?php

namespace App\Http\Controllers;

use App\DataTables\AccountsHeadDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAccountsHeadRequest;
use App\Http\Requests\UpdateAccountsHeadRequest;
use App\Repositories\AccountsHeadRepository;
use Flash;
use Scottlaurent\Accounting\Models\Ledger;
use App\Http\Controllers\AppBaseController;
use App\Models\AccountsHead;
use Response;


class AccountsHeadController extends AppBaseController
{
    /** @var AccountsHeadRepository $accountsHeadRepository*/
    private $accountsHeadRepository;

    public function __construct(AccountsHeadRepository $accountsHeadRepo)
    {
        $this->accountsHeadRepository = $accountsHeadRepo;
    }

    /**
     * Display a listing of the AccountsHead.
     *
     * @param AccountsHeadDataTable $accountsHeadDataTable
     *
     * @return Response
     */
    public function index(AccountsHeadDataTable $accountsHeadDataTable)
    {
        return view('accounts_heads.index')->with('heads',AccountsHead::where('has_parent',0)->get());
        // return $accountsHeadDataTable->render('accounts_heads.index');
    }

    /**
     * Show the form for creating a new AccountsHead.
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
        //

        // $this->company_ar_journal = Account::create(['name' => 'Company Accounts Receivable'])->initJournal();
        // $this->company_ar_journal->assignToLedger($this->company_assets_ledger);

        return view('accounts_heads.create')->with('heads',AccountsHead::where('has_parent',0)->get());
    }

    /**
     * Store a newly created AccountsHead in storage.
     *
     * @param CreateAccountsHeadRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountsHeadRequest $request)
    {
        $input = $request->all();
        $parent=AccountsHead::find($input['parent_id']);
        $parent->has_child=1;
        $parent->save();
        $input['type']=$parent->type;
        $input['has_parent']=1;
        $input['ledger_id']=$parent->ledger_id;
        $input['code']=$parent->code+1;
        $accountsHead = $this->accountsHeadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accountsHeads.singular')]));

        return redirect(route('accountsHeads.index'));
    }

    /**
     * Display the specified AccountsHead.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountsHead = $this->accountsHeadRepository->find($id);

        if (empty($accountsHead)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountsHeads.singular')]));

            return redirect(route('accountsHeads.index'));
        }

        return view('accounts_heads.show')->with('accountsHead', $accountsHead);
    }

    /**
     * Show the form for editing the specified AccountsHead.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountsHead = $this->accountsHeadRepository->find($id);

        if (empty($accountsHead)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountsHeads.singular')]));

            return redirect(route('accountsHeads.index'));
        }

        return view('accounts_heads.edit')->with('accountsHead', $accountsHead);
    }

    /**
     * Update the specified AccountsHead in storage.
     *
     * @param int $id
     * @param UpdateAccountsHeadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountsHeadRequest $request)
    {
        $accountsHead = $this->accountsHeadRepository->find($id);

        if (empty($accountsHead)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountsHeads.singular')]));

            return redirect(route('accountsHeads.index'));
        }

        $accountsHead = $this->accountsHeadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accountsHeads.singular')]));

        return redirect(route('accountsHeads.index'));
    }

    /**
     * Remove the specified AccountsHead from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountsHead = $this->accountsHeadRepository->find($id);

        if (empty($accountsHead)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accountsHeads.singular')]));

            return redirect(route('accountsHeads.index'));
        }

        $this->accountsHeadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accountsHeads.singular')]));

        return redirect(route('accountsHeads.index'));
    }
}
