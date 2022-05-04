<?php

namespace App\Http\Controllers;

use App\DataTables\QuotationProductsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateQuotationProductsRequest;
use App\Http\Requests\UpdateQuotationProductsRequest;
use App\Repositories\QuotationProductsRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class QuotationProductsController extends AppBaseController
{
    /** @var QuotationProductsRepository $quotationProductsRepository*/
    private $quotationProductsRepository;

    public function __construct(QuotationProductsRepository $quotationProductsRepo)
    {
        $this->quotationProductsRepository = $quotationProductsRepo;
    }

    /**
     * Display a listing of the QuotationProducts.
     *
     * @param QuotationProductsDataTable $quotationProductsDataTable
     *
     * @return Response
     */
    public function index(QuotationProductsDataTable $quotationProductsDataTable)
    {
        return $quotationProductsDataTable->render('quotation_products.index');
    }

    /**
     * Show the form for creating a new QuotationProducts.
     *
     * @return Response
     */
    public function create()
    {
        return view('quotation_products.create');
    }

    /**
     * Store a newly created QuotationProducts in storage.
     *
     * @param CreateQuotationProductsRequest $request
     *
     * @return Response
     */
    public function store(CreateQuotationProductsRequest $request)
    {
        $input = $request->all();

        $quotationProducts = $this->quotationProductsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/quotationProducts.singular')]));

        return redirect(route('quotationProducts.index'));
    }

    /**
     * Display the specified QuotationProducts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quotationProducts = $this->quotationProductsRepository->find($id);

        if (empty($quotationProducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/quotationProducts.singular')]));

            return redirect(route('quotationProducts.index'));
        }

        return view('quotation_products.show')->with('quotationProducts', $quotationProducts);
    }

    /**
     * Show the form for editing the specified QuotationProducts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quotationProducts = $this->quotationProductsRepository->find($id);

        if (empty($quotationProducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/quotationProducts.singular')]));

            return redirect(route('quotationProducts.index'));
        }

        return view('quotation_products.edit')->with('quotationProducts', $quotationProducts);
    }

    /**
     * Update the specified QuotationProducts in storage.
     *
     * @param int $id
     * @param UpdateQuotationProductsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuotationProductsRequest $request)
    {
        $quotationProducts = $this->quotationProductsRepository->find($id);

        if (empty($quotationProducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/quotationProducts.singular')]));

            return redirect(route('quotationProducts.index'));
        }

        $quotationProducts = $this->quotationProductsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/quotationProducts.singular')]));

        return redirect(route('quotationProducts.index'));
    }

    /**
     * Remove the specified QuotationProducts from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quotationProducts = $this->quotationProductsRepository->find($id);

        if (empty($quotationProducts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/quotationProducts.singular')]));

            return redirect(route('quotationProducts.index'));
        }

        $this->quotationProductsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/quotationProducts.singular')]));

        return redirect(route('quotationProducts.index'));
    }
}
