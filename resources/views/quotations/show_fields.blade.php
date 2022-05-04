<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/quotations.fields.id').':') !!}
    <p>{{ $quotations->id }}</p>
</div>

<!-- Client Id Field -->
<div class="col-sm-12">
    {!! Form::label('client_id', __('models/quotations.fields.client_id').':') !!}
    <p>{{ $quotations->client_id }}</p>
</div>

<!-- Officedetails Id Field -->
<div class="col-sm-12">
    {!! Form::label('officedetails_id', __('models/quotations.fields.officedetails_id').':') !!}
    <p>{{ $quotations->officedetails_id }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/quotations.fields.created_by').':') !!}
    <p>{{ $quotations->created_by }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', __('models/quotations.fields.date').':') !!}
    <p>{{ $quotations->date }}</p>
</div>

<!-- Subject Field -->
<div class="col-sm-12">
    {!! Form::label('subject', __('models/quotations.fields.subject').':') !!}
    <p>{{ $quotations->subject }}</p>
</div>

<!-- Sub Total Field -->
<div class="col-sm-12">
    {!! Form::label('sub_total', __('models/quotations.fields.sub_total').':') !!}
    <p>{{ $quotations->sub_total }}</p>
</div>

<!-- Discount Field -->
<div class="col-sm-12">
    {!! Form::label('discount', __('models/quotations.fields.discount').':') !!}
    <p>{{ $quotations->discount }}</p>
</div>

<!-- Tax Field -->
<div class="col-sm-12">
    {!! Form::label('tax', __('models/quotations.fields.tax').':') !!}
    <p>{{ $quotations->tax }}</p>
</div>

<!-- Grand Total Field -->
<div class="col-sm-12">
    {!! Form::label('grand_total', __('models/quotations.fields.grand_total').':') !!}
    <p>{{ $quotations->grand_total }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/quotations.fields.created_at').':') !!}
    <p>{{ $quotations->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/quotations.fields.updated_at').':') !!}
    <p>{{ $quotations->updated_at }}</p>
</div>

