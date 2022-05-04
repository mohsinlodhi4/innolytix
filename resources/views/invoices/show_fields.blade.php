<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/invoices.fields.id').':') !!}
    <p>{{ $invoices->id }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', __('models/invoices.fields.date').':') !!}
    <p>{{ $invoices->date }}</p>
</div>

<!-- Subject Field -->
<div class="col-sm-12">
    {!! Form::label('subject', __('models/invoices.fields.subject').':') !!}
    <p>{{ $invoices->subject }}</p>
</div>

<!-- Client Id Field -->
<div class="col-sm-12">
    {!! Form::label('joborder_id', __('models/invoices.fields.joborder_id').':') !!}
    <p>{{ $invoices->joborder_id }}</p>
</div>

<!-- Officedetails Id Field -->
<div class="col-sm-12">
    {!! Form::label('officedetails_id', __('models/invoices.fields.officedetails_id').':') !!}
    <p>{{ $invoices->officedetails_id }}</p>
</div>

<!-- Sub Total Field -->
<div class="col-sm-12">
    {!! Form::label('sub_total', __('models/invoices.fields.sub_total').':') !!}
    <p>{{ $invoices->sub_total }}</p>
</div>

<!-- Discount Field -->
<div class="col-sm-12">
    {!! Form::label('discount', __('models/invoices.fields.discount').':') !!}
    <p>{{ $invoices->discount }}</p>
</div>

<!-- Tax Field -->
<div class="col-sm-12">
    {!! Form::label('tax', __('models/invoices.fields.tax').':') !!}
    <p>{{ $invoices->tax }}</p>
</div>

<!-- Grand Total Field -->
<div class="col-sm-12">
    {!! Form::label('grand_total', __('models/invoices.fields.grand_total').':') !!}
    <p>{{ $invoices->grand_total }}</p>
</div>

<!-- Bank Id Field -->
<div class="col-sm-12">
    {!! Form::label('bank_id', __('models/invoices.fields.bank_id').':') !!}
    <p>{{ $invoices->bank_id }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/invoices.fields.created_by').':') !!}
    <p>{{ $invoices->created_by }}</p>
</div>

<!-- Notes Field -->
<div class="col-sm-12">
    {!! Form::label('notes', __('models/invoices.fields.notes').':') !!}
    <p>{{ $invoices->notes }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/invoices.fields.created_at').':') !!}
    <p>{{ $invoices->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/invoices.fields.updated_at').':') !!}
    <p>{{ $invoices->updated_at }}</p>
</div>

