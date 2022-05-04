<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/vendors.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', __('models/vendors.fields.number').':') !!}
    {!! Form::number('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Ntn No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ntn_no', __('models/vendors.fields.ntn_no').':') !!}
    {!! Form::text('ntn_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Strn No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('strn_no', __('models/vendors.fields.strn_no').':') !!}
    {!! Form::text('strn_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/vendors.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Deals In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deals_in', __('models/vendors.fields.deals_in').':') !!}
    {!! Form::text('deals_in', null, ['class' => 'form-control']) !!}
</div>