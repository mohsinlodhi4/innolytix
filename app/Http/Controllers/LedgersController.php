<?php

namespace App\Http\Controllers;

use App\DataTables\LedgersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLedgersRequest;
use App\Http\Requests\UpdateLedgersRequest;
use App\Repositories\LedgersRepository;
use Flash;
use Scottlaurent\Accounting\Models\Ledger;
use App\Http\Controllers\AppBaseController;
use Response;

class LedgersController extends AppBaseController
{
    /** @var LedgersRepository $ledgersRepository*/
    private $ledgersRepository;

    public function __construct(LedgersRepository $ledgersRepo)
    {
        $this->ledgersRepository = $ledgersRepo;
    }

    /**
     * Display a listing of the Ledgers.
     *
     * @param LedgersDataTable $ledgersDataTable
     *
     * @return Response
     */
    public function index(LedgersDataTable $ledgersDataTable)
    {
        return $ledgersDataTable->render('ledgers.index');
    }

    /**
     * Show the form for creating a new Ledgers.
     *
     * @return Response
     */
    public function create()
    {
        return view('ledgers.create');
    }

    /**
     * Store a newly created Ledgers in storage.
     *
     * @param CreateLedgersRequest $request
     *
     * @return Response
     */
    public function store(CreateLedgersRequest $request)
    {
        $input = $request->all();

        $ledgers = $this->ledgersRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ledgers.singular')]));

        return redirect(route('ledgers.index'));
    }

    /**
     * Display the specified Ledgers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ledgers = Ledger::find($id);

        if (empty($ledgers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ledgers.singular')]));

            return redirect(route('ledgers.index'));
        }
        // dd($ledgers->getCurrentBalanceInDollars());
        return view('ledgers.show')->with('ledgers', $ledgers);
    }

    /**
     * Show the form for editing the specified Ledgers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ledgers = $this->ledgersRepository->find($id);

        if (empty($ledgers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ledgers.singular')]));

            return redirect(route('ledgers.index'));
        }

        return view('ledgers.edit')->with('ledgers', $ledgers);
    }

    /**
     * Update the specified Ledgers in storage.
     *
     * @param int $id
     * @param UpdateLedgersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLedgersRequest $request)
    {
        $ledgers = $this->ledgersRepository->find($id);

        if (empty($ledgers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ledgers.singular')]));

            return redirect(route('ledgers.index'));
        }

        $ledgers = $this->ledgersRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ledgers.singular')]));

        return redirect(route('ledgers.index'));
    }

    /**
     * Remove the specified Ledgers from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ledgers = $this->ledgersRepository->find($id);

        if (empty($ledgers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ledgers.singular')]));

            return redirect(route('ledgers.index'));
        }

        $this->ledgersRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ledgers.singular')]));

        return redirect(route('ledgers.index'));
    }
}
