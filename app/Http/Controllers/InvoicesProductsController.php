<?php

namespace App\Http\Controllers;

use App\DataTables\InvoicesProductsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInvoicesProductsRequest;
use App\Http\Requests\UpdateInvoicesProductsRequest;
use App\Repositories\InvoicesProductsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InvoicesProductsController extends AppBaseController
{
    /** @var InvoicesProductsRepository $invoicesProductsRepository*/
    private $invoicesProductsRepository;

    public function __construct(InvoicesProductsRepository $invoicesProductsRepo)
    {
        $this->invoicesProductsRepository = $invoicesProductsRepo;
    }

    /**
     * Display a listing of the InvoicesProducts.
     *
     * @param InvoicesProductsDataTable $invoicesProductsDataTable
     *
     * @return Response
     */
    public function index(InvoicesProductsDataTable $invoicesProductsDataTable)
    {
        return $invoicesProductsDataTable->render('invoices_products.index');
    }

    /**
     * Show the form for creating a new InvoicesProducts.
     *
     * @return Response
     */
    public function create()
    {
        return view('invoices_products.create');
    }

    /**
     * Store a newly created InvoicesProducts in storage.
     *
     * @param CreateInvoicesProductsRequest $request
     *
     * @return Response
     */
    public function store(CreateInvoicesProductsRequest $request)
    {
        $input = $request->all();

        $invoicesProducts = $this->invoicesProductsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/invoicesProducts.singular')]));

        return redirect(route('invoicesProducts.index'));
    }

    /**
     * Display the specified InvoicesProducts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoicesProducts = $this->invoicesProductsRepository->find($id);

        if (empty($invoicesProducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoicesProducts.singular')]));

            return redirect(route('invoicesProducts.index'));
        }

        return view('invoices_products.show')->with('invoicesProducts', $invoicesProducts);
    }

    /**
     * Show the form for editing the specified InvoicesProducts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoicesProducts = $this->invoicesProductsRepository->find($id);

        if (empty($invoicesProducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoicesProducts.singular')]));

            return redirect(route('invoicesProducts.index'));
        }

        return view('invoices_products.edit')->with('invoicesProducts', $invoicesProducts);
    }

    /**
     * Update the specified InvoicesProducts in storage.
     *
     * @param int $id
     * @param UpdateInvoicesProductsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvoicesProductsRequest $request)
    {
        $invoicesProducts = $this->invoicesProductsRepository->find($id);

        if (empty($invoicesProducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoicesProducts.singular')]));

            return redirect(route('invoicesProducts.index'));
        }

        $invoicesProducts = $this->invoicesProductsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/invoicesProducts.singular')]));

        return redirect(route('invoicesProducts.index'));
    }

    /**
     * Remove the specified InvoicesProducts from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoicesProducts = $this->invoicesProductsRepository->find($id);

        if (empty($invoicesProducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/invoicesProducts.singular')]));

            return redirect(route('invoicesProducts.index'));
        }

        $this->invoicesProductsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/invoicesProducts.singular')]));

        return redirect(route('invoicesProducts.index'));
    }
}
