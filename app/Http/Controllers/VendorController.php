<?php

namespace App\Http\Controllers;

use App\DataTables\VendorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Repositories\VendorRepository;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Vendor;
use Response;
use Scottlaurent\Accounting\Models\Ledger;

class VendorController extends AppBaseController
{
    /** @var  VendorRepository */
    private $vendorRepository;

    public function __construct(VendorRepository $vendorRepo)
    {
        $this->vendorRepository = $vendorRepo;
    }

    /**
     * Display a listing of the Vendor.
     *
     * @param VendorDataTable $vendorDataTable
     * @return Response
     */
    public function index(VendorDataTable $vendorDataTable)
    {
        return $vendorDataTable->render('vendors.index');
    }

    /**
     * Show the form for creating a new Vendor.
     *
     * @return Response
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created Vendor in storage.
     *
     * @param CreateVendorRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorRequest $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $input = $request->all();
        $input['user_id']=Auth::id();
        // $vendor = $this->vendorRepository->create($input);
        $this->company_payable_ledger=Ledger::where('type','liability')->first();
        $this->vandor = Vendor::create($input)->initJournal();
        $this->vandor->assignToLedger($this->company_payable_ledger);

        Flash::success(__('messages.saved', ['model' => __('models/vendors.singular')]));

        return redirect(route('vendors.index'));
    }

    /**
     * Display the specified Vendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('vendors.index'));
        }

        return view('vendors.show')->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified Vendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('vendors.index'));
        }

        return view('vendors.edit')->with('vendor', $vendor);
    }

    /**
     * Update the specified Vendor in storage.
     *
     * @param  int              $id
     * @param UpdateVendorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorRequest $request)
    {
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('vendors.index'));
        }

        $vendor = $this->vendorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vendors.singular')]));

        return redirect(route('vendors.index'));
    }

    /**
     * Remove the specified Vendor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendor = $this->vendorRepository->find($id);

        if (empty($vendor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vendors.singular')]));

            return redirect(route('vendors.index'));
        }

        $this->vendorRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vendors.singular')]));

        return redirect(route('vendors.index'));
    }
}
