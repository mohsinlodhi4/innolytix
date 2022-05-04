<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLedgersAPIRequest;
use App\Http\Requests\API\UpdateLedgersAPIRequest;
use App\Models\Ledgers;
use App\Repositories\LedgersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LedgersController
 * @package App\Http\Controllers\API
 */

class LedgersAPIController extends AppBaseController
{
    /** @var  LedgersRepository */
    private $ledgersRepository;

    public function __construct(LedgersRepository $ledgersRepo)
    {
        $this->ledgersRepository = $ledgersRepo;
    }

    /**
     * Display a listing of the Ledgers.
     * GET|HEAD /ledgers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ledgers = $this->ledgersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $ledgers->toArray(),
            __('messages.retrieved', ['model' => __('models/ledgers.plural')])
        );
    }

    /**
     * Store a newly created Ledgers in storage.
     * POST /ledgers
     *
     * @param CreateLedgersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLedgersAPIRequest $request)
    {
        $input = $request->all();

        $ledgers = $this->ledgersRepository->create($input);

        return $this->sendResponse(
            $ledgers->toArray(),
            __('messages.saved', ['model' => __('models/ledgers.singular')])
        );
    }

    /**
     * Display the specified Ledgers.
     * GET|HEAD /ledgers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ledgers $ledgers */
        $ledgers = $this->ledgersRepository->find($id);

        if (empty($ledgers)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/ledgers.singular')])
            );
        }

        return $this->sendResponse(
            $ledgers->toArray(),
            __('messages.retrieved', ['model' => __('models/ledgers.singular')])
        );
    }

    /**
     * Update the specified Ledgers in storage.
     * PUT/PATCH /ledgers/{id}
     *
     * @param int $id
     * @param UpdateLedgersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLedgersAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ledgers $ledgers */
        $ledgers = $this->ledgersRepository->find($id);

        if (empty($ledgers)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/ledgers.singular')])
            );
        }

        $ledgers = $this->ledgersRepository->update($input, $id);

        return $this->sendResponse(
            $ledgers->toArray(),
            __('messages.updated', ['model' => __('models/ledgers.singular')])
        );
    }

    /**
     * Remove the specified Ledgers from storage.
     * DELETE /ledgers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ledgers $ledgers */
        $ledgers = $this->ledgersRepository->find($id);

        if (empty($ledgers)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/ledgers.singular')])
            );
        }

        $ledgers->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/ledgers.singular')])
        );
    }
}
