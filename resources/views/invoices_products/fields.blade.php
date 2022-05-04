<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/invoicesProducts.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/invoicesProducts.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Model No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_no', __('models/invoicesProducts.fields.model_no').':') !!}
    {!! Form::text('model_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', __('models/invoicesProducts.fields.brand').':') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}
</div>

<!-- Unitprice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unitprice', __('models/invoicesProducts.fields.unitprice').':') !!}
    {!! Form::number('unitprice', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', __('models/invoicesProducts.fields.qty').':') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', __('models/invoicesProducts.fields.total').':') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', __('models/invoicesProducts.fields.vendor_id').':') !!}
    {!! Form::number('vendor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoice_id', __('models/invoicesProducts.fields.invoice_id').':') !!}
    {!! Form::number('invoice_id', null, ['class' => 'form-control']) !!}
</div>