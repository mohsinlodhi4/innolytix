<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/quotationProducts.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/quotationProducts.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Model No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_no', __('models/quotationProducts.fields.model_no').':') !!}
    {!! Form::text('model_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', __('models/quotationProducts.fields.brand').':') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}
</div>

<!-- Unitprice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unitprice', __('models/quotationProducts.fields.unitprice').':') !!}
    {!! Form::number('unitprice', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', __('models/quotationProducts.fields.qty').':') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', __('models/quotationProducts.fields.total').':') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', __('models/quotationProducts.fields.vendor_id').':') !!}
    {!! Form::text('vendor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Quotation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quotation_id', __('models/quotationProducts.fields.quotation_id').':') !!}
    {!! Form::text('quotation_id', null, ['class' => 'form-control']) !!}
</div>