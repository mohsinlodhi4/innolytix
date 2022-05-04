<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/officeDetails.fields.id').':') !!}
    <p>{{ $officeDetails->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/officeDetails.fields.name').':') !!}
    <p>{{ $officeDetails->name }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', __('models/officeDetails.fields.address').':') !!}
    <p>{{ $officeDetails->address }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', __('models/officeDetails.fields.phone').':') !!}
    <p>{{ $officeDetails->phone }}</p>
</div>

<!-- Ntn No Field -->
<div class="col-sm-12">
    {!! Form::label('ntn_no', __('models/officeDetails.fields.ntn_no').':') !!}
    <p>{{ $officeDetails->ntn_no }}</p>
</div>

<!-- Strn No Field -->
<div class="col-sm-12">
    {!! Form::label('strn_no', __('models/officeDetails.fields.strn_no').':') !!}
    <p>{{ $officeDetails->strn_no }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/officeDetails.fields.created_by').':') !!}
    <p>{{ $officeDetails->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/officeDetails.fields.created_at').':') !!}
    <p>{{ $officeDetails->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/officeDetails.fields.updated_at').':') !!}
    <p>{{ $officeDetails->updated_at }}</p>
</div>

