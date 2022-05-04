<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/vendors.fields.id').':') !!}
    <p>{{ $vendor->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/vendors.fields.name').':') !!}
    <p>{{ $vendor->name }}</p>
</div>

<!-- Number Field -->
<div class="col-sm-12">
    {!! Form::label('number', __('models/vendors.fields.number').':') !!}
    <p>{{ $vendor->number }}</p>
</div>

<!-- Ntn No Field -->
<div class="col-sm-12">
    {!! Form::label('ntn_no', __('models/vendors.fields.ntn_no').':') !!}
    <p>{{ $vendor->ntn_no }}</p>
</div>

<!-- Strn No Field -->
<div class="col-sm-12">
    {!! Form::label('strn_no', __('models/vendors.fields.strn_no').':') !!}
    <p>{{ $vendor->strn_no }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', __('models/vendors.fields.address').':') !!}
    <p>{{ $vendor->address }}</p>
</div>

<!-- Deals In Field -->
<div class="col-sm-12">
    {!! Form::label('deals_in', __('models/vendors.fields.deals_in').':') !!}
    <p>{{ $vendor->deals_in }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/vendors.fields.created_at').':') !!}
    <p>{{ $vendor->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/vendors.fields.updated_at').':') !!}
    <p>{{ $vendor->updated_at }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('models/vendors.fields.user_id').':') !!}
    <p>{{ $vendor->user_id }}</p>
</div>

