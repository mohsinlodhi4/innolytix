<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/purchaseOrders.fields.id').':') !!}
    <p>{{ $purchaseOrder->id }}</p>
</div>

<!-- Joborder Id Field -->
<div class="col-sm-12">
    {!! Form::label('joborder_id', __('models/purchaseOrders.fields.joborder_id').':') !!}
    <p>{{ $purchaseOrder->joborder_id }}</p>
</div>

<!-- Vendor Id Field -->
<div class="col-sm-12">
    {!! Form::label('vendor_id', __('models/purchaseOrders.fields.vendor_id').':') !!}
    <p>{{ $purchaseOrder->vendor_id }}</p>
</div>

<!-- Officedetail Id Field -->
<div class="col-sm-12">
    {!! Form::label('officedetail_id', __('models/purchaseOrders.fields.officedetail_id').':') !!}
    <p>{{ $purchaseOrder->officedetail_id }}</p>
</div>

<!-- Reference No Field -->
<div class="col-sm-12">
    {!! Form::label('reference_no', __('models/purchaseOrders.fields.reference_no').':') !!}
    <p>{{ $purchaseOrder->reference_no }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', __('models/purchaseOrders.fields.date').':') !!}
    <p>{{ $purchaseOrder->date }}</p>
</div>

<!-- Payment Terms Field -->
<div class="col-sm-12">
    {!! Form::label('payment_terms', __('models/purchaseOrders.fields.payment_terms').':') !!}
    <p>{{ $purchaseOrder->payment_terms }}</p>
</div>

<!-- Sub Total Field -->
<div class="col-sm-12">
    {!! Form::label('sub_total', __('models/purchaseOrders.fields.sub_total').':') !!}
    <p>{{ $purchaseOrder->sub_total }}</p>
</div>

<!-- Tax Field -->
<div class="col-sm-12">
    {!! Form::label('tax', __('models/purchaseOrders.fields.tax').':') !!}
    <p>{{ $purchaseOrder->tax }}</p>
</div>

<!-- Grand Total Field -->
<div class="col-sm-12">
    {!! Form::label('grand_total', __('models/purchaseOrders.fields.grand_total').':') !!}
    <p>{{ $purchaseOrder->grand_total }}</p>
</div>

<!-- Bank Id Field -->
<div class="col-sm-12">
    {!! Form::label('bank_id', __('models/purchaseOrders.fields.bank_id').':') !!}
    <p>{{ $purchaseOrder->bank_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/purchaseOrders.fields.created_at').':') !!}
    <p>{{ $purchaseOrder->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/purchaseOrders.fields.updated_at').':') !!}
    <p>{{ $purchaseOrder->updated_at }}</p>
</div>

