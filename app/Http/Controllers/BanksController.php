<?php

namespace App\Http\Controllers;

use App\DataTables\BanksDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBanksRequest;
use App\Http\Requests\UpdateBanksRequest;
use App\Repositories\BanksRepository;
use Flash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use App\Models\Account;
use App\Models\AccountsHead;
use App\Models\Banks;
use Response;
use Scottlaurent\Accounting\Models\Ledger;

class BanksController extends AppBaseController
{
    /** @var BanksRepository $banksRepository*/
    private $banksRepository;

    public function __construct(BanksRepository $banksRepo)
    {
        $this->banksRepository = $banksRepo;
    }

    /**
     * Display a listing of the Banks.
     *
     * @param BanksDataTable $banksDataTable
     *
     * @return Response
     */
    public function index(BanksDataTable $banksDataTable)
    {
        return $banksDataTable->render('banks.index');
    }

    /**
     * Show the form for creating a new Banks.
     *
     * @return Response
     */
    public function create()
    {
        return view('banks.create');
    }

    /**
     * Store a newly created Banks in storage.
     *
     * @param CreateBanksRequest $request
     *
     * @return Response
     */
    public function store(CreateBanksRequest $request)
    {
        $input = $request->all();
        $input['created_by']=Auth::id();

        $bank = Banks::create($input);

        //$banks = $this->banksRepository->create($input);
        $heads=AccountsHead::where('name','Bank')->first();
        $this->company_asset_ledger=Ledger::where('type','asset')->first();

        $account=[
            'name' => $input['bank_name'].' '.$input['account_title'],
            'head_id' => $heads->id,
            'type' => 'bank',
            'type_id'=>$bank->id
        ];

        $this->company_expense_journal = Account::create($account)->initJournal();
        $this->company_expense_journal->assignToLedger($this->company_asset_ledger);

        Flash::success(__('messages.saved', ['model' => __('models/banks.singular')]));

        return redirect(route('banks.index'));
    }

    /**
     * Display the specified Banks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $banks = $this->banksRepository->find($id);

        if (empty($banks)) {
            Flash::error(__('messages.not_found', ['model' => __('models/banks.singular')]));

            return redirect(route('banks.index'));
        }

        return view('banks.show')->with('banks', $banks);
    }

    /**
     * Show the form for editing the specified Banks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $banks = $this->banksRepository->find($id);

        if (empty($banks)) {
            Flash::error(__('messages.not_found', ['model' => __('models/banks.singular')]));

            return redirect(route('banks.index'));
        }

        return view('banks.edit')->with('banks', $banks);
    }

    /**
     * Update the specified Banks in storage.
     *
     * @param int $id
     * @param UpdateBanksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBanksRequest $request)
    {
        $banks = $this->banksRepository->find($id);

        if (empty($banks)) {
            Flash::error(__('messages.not_found', ['model' => __('models/banks.singular')]));

            return redirect(route('banks.index'));
        }

        $banks = $this->banksRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/banks.singular')]));

        return redirect(route('banks.index'));
    }

    /**
     * Remove the specified Banks from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $banks = $this->banksRepository->find($id);

        if (empty($banks)) {
            Flash::error(__('messages.not_found', ['model' => __('models/banks.singular')]));

            return redirect(route('banks.index'));
        }

        $this->banksRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/banks.singular')]));

        return redirect(route('banks.index'));
    }
}
