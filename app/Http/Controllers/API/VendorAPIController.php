<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVendorAPIRequest;
use App\Http\Requests\API\UpdateVendorAPIRequest;
use App\Models\Vendor;
use App\Repositories\VendorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VendorController
 * @package App\Http\Controllers\API
 */

class VendorAPIController extends AppBaseController
{
    /** @var  VendorRepository */
    private $vendorRepository;

    public function __construct(VendorRepository $vendorRepo)
    {
        $this->vendorRepository = $vendorRepo;
    }

    /**
     * Display a listing of the Vendor.
     * GET|HEAD /vendors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $vendors = $this->vendorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $vendors->toArray(),
            __('messages.retrieved', ['model' => __('models/vendors.plural')])
        );
    }

    /**
     * Store a newly created Vendor in storage.
     * POST /vendors
     *
     * @param CreateVendorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorAPIRequest $request)
    {
        $input = $request->all();

        $vendor = $this->vendorRepository->create($input);

        return $this->sendResponse(
            $vendor->toArray(),
            __('messages.saved', ['model' => __('models/vendors.singular')])
        );
    }

    /**
     * Display the specified Vendor.
     * GET|HEAD /vendors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Vendor $vendor */
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/vendors.singular')])
            );
        }

        return $this->sendResponse(
            $vendor->toArray(),
            __('messages.retrieved', ['model' => __('models/vendors.singular')])
        );
    }

    /**
     * Update the specified Vendor in storage.
     * PUT/PATCH /vendors/{id}
     *
     * @param int $id
     * @param UpdateVendorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vendor $vendor */
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/vendors.singular')])
            );
        }

        $vendor = $this->vendorRepository->update($input, $id);

        return $this->sendResponse(
            $vendor->toArray(),
            __('messages.updated', ['model' => __('models/vendors.singular')])
        );
    }

    /**
     * Remove the specified Vendor from storage.
     * DELETE /vendors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Vendor $vendor */
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/vendors.singular')])
            );
        }

        $vendor->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/vendors.singular')])
        );
    }
}
