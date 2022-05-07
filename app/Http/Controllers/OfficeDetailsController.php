<?php

namespace App\Http\Controllers;

use App\DataTables\OfficeDetailsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOfficeDetailsRequest;
use App\Http\Requests\UpdateOfficeDetailsRequest;
use App\Repositories\OfficeDetailsRepository;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OfficeDetailsController extends AppBaseController
{
    /** @var OfficeDetailsRepository $officeDetailsRepository*/
    private $officeDetailsRepository;

    public function __construct(OfficeDetailsRepository $officeDetailsRepo)
    {
        $this->officeDetailsRepository = $officeDetailsRepo;
    }

    /**
     * Display a listing of the OfficeDetails.
     *
     * @param OfficeDetailsDataTable $officeDetailsDataTable
     *
     * @return Response
     */
    public function index(OfficeDetailsDataTable $officeDetailsDataTable)
    {
        return $officeDetailsDataTable->render('office_details.index');
    }

    /**
     * Show the form for creating a new OfficeDetails.
     *
     * @return Response
     */
    public function create()
    {
        return view('office_details.create');
    }

    /**
     * Store a newly created OfficeDetails in storage.
     *
     * @param CreateOfficeDetailsRequest $request
     *
     * @return Response
     */
    public function store(CreateOfficeDetailsRequest $request)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'ntn_no'=>'required',
            'strn_no'=>'required',
        ]);
        $input = $request->all();
        $input['created_by']=Auth::id();
        $officeDetails = $this->officeDetailsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/officeDetails.singular')]));

        return redirect(route('officeDetails.index'));
    }

    /**
     * Display the specified OfficeDetails.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $officeDetails = $this->officeDetailsRepository->find($id);

        if (empty($officeDetails)) {
            Flash::error(__('messages.not_found', ['model' => __('models/officeDetails.singular')]));

            return redirect(route('officeDetails.index'));
        }

        return view('office_details.show')->with('officeDetails', $officeDetails);
    }

    /**
     * Show the form for editing the specified OfficeDetails.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $officeDetails = $this->officeDetailsRepository->find($id);

        if (empty($officeDetails)) {
            Flash::error(__('messages.not_found', ['model' => __('models/officeDetails.singular')]));

            return redirect(route('officeDetails.index'));
        }

        return view('office_details.edit')->with('officeDetails', $officeDetails);
    }

    /**
     * Update the specified OfficeDetails in storage.
     *
     * @param int $id
     * @param UpdateOfficeDetailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOfficeDetailsRequest $request)
    {
        $officeDetails = $this->officeDetailsRepository->find($id);

        if (empty($officeDetails)) {
            Flash::error(__('messages.not_found', ['model' => __('models/officeDetails.singular')]));

            return redirect(route('officeDetails.index'));
        }

        $officeDetails = $this->officeDetailsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/officeDetails.singular')]));

        return redirect(route('officeDetails.index'));
    }

    /**
     * Remove the specified OfficeDetails from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $officeDetails = $this->officeDetailsRepository->find($id);

        if (empty($officeDetails)) {
            Flash::error(__('messages.not_found', ['model' => __('models/officeDetails.singular')]));

            return redirect(route('officeDetails.index'));
        }

        $this->officeDetailsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/officeDetails.singular')]));

        return redirect(route('officeDetails.index'));
    }
}
