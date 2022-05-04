<?php

namespace App\Http\Controllers;

use App\DataTables\PurchaseorderproductsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePurchaseorderproductsRequest;
use App\Http\Requests\UpdatePurchaseorderproductsRequest;
use App\Repositories\PurchaseorderproductsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PurchaseorderproductsController extends AppBaseController
{
    /** @var PurchaseorderproductsRepository $purchaseorderproductsRepository*/
    private $purchaseorderproductsRepository;

    public function __construct(PurchaseorderproductsRepository $purchaseorderproductsRepo)
    {
        $this->purchaseorderproductsRepository = $purchaseorderproductsRepo;
    }

    /**
     * Display a listing of the Purchaseorderproducts.
     *
     * @param PurchaseorderproductsDataTable $purchaseorderproductsDataTable
     *
     * @return Response
     */
    public function index(PurchaseorderproductsDataTable $purchaseorderproductsDataTable)
    {
        return $purchaseorderproductsDataTable->render('purchaseorderproducts.index');
    }

    /**
     * Show the form for creating a new Purchaseorderproducts.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchaseorderproducts.create');
    }

    /**
     * Store a newly created Purchaseorderproducts in storage.
     *
     * @param CreatePurchaseorderproductsRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseorderproductsRequest $request)
    {
        $input = $request->all();

        $purchaseorderproducts = $this->purchaseorderproductsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/purchaseorderproducts.singular')]));

        return redirect(route('purchaseorderproducts.index'));
    }

    /**
     * Display the specified Purchaseorderproducts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchaseorderproducts = $this->purchaseorderproductsRepository->find($id);

        if (empty($purchaseorderproducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/purchaseorderproducts.singular')]));

            return redirect(route('purchaseorderproducts.index'));
        }

        return view('purchaseorderproducts.show')->with('purchaseorderproducts', $purchaseorderproducts);
    }

    /**
     * Show the form for editing the specified Purchaseorderproducts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchaseorderproducts = $this->purchaseorderproductsRepository->find($id);

        if (empty($purchaseorderproducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/purchaseorderproducts.singular')]));

            return redirect(route('purchaseorderproducts.index'));
        }

        return view('purchaseorderproducts.edit')->with('purchaseorderproducts', $purchaseorderproducts);
    }

    /**
     * Update the specified Purchaseorderproducts in storage.
     *
     * @param int $id
     * @param UpdatePurchaseorderproductsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseorderproductsRequest $request)
    {
        $purchaseorderproducts = $this->purchaseorderproductsRepository->find($id);

        if (empty($purchaseorderproducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/purchaseorderproducts.singular')]));

            return redirect(route('purchaseorderproducts.index'));
        }

        $purchaseorderproducts = $this->purchaseorderproductsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/purchaseorderproducts.singular')]));

        return redirect(route('purchaseorderproducts.index'));
    }

    /**
     * Remove the specified Purchaseorderproducts from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchaseorderproducts = $this->purchaseorderproductsRepository->find($id);

        if (empty($purchaseorderproducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/purchaseorderproducts.singular')]));

            return redirect(route('purchaseorderproducts.index'));
        }

        $this->purchaseorderproductsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/purchaseorderproducts.singular')]));

        return redirect(route('purchaseorderproducts.index'));
    }
}
