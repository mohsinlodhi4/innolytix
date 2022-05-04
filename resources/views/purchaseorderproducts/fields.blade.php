<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/purchaseorderproducts.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/purchaseorderproducts.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model', __('models/purchaseorderproducts.fields.model').':') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', __('models/purchaseorderproducts.fields.brand').':') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}
</div>

<!-- Unitprice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unitprice', __('models/purchaseorderproducts.fields.unitprice').':') !!}
    {!! Form::number('unitprice', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', __('models/purchaseorderproducts.fields.qty').':') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', __('models/purchaseorderproducts.fields.total').':') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Purchaseorder Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purchaseorder_id', __('models/purchaseorderproducts.fields.purchaseorder_id').':') !!}
    {!! Form::number('purchaseorder_id', null, ['class' => 'form-control']) !!}
</div>