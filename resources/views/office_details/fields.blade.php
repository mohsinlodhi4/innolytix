<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/officeDetails.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/officeDetails.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/officeDetails.fields.phone').':') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Ntn No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ntn_no', __('models/officeDetails.fields.ntn_no').':') !!}
    {!! Form::text('ntn_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Strn No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('strn_no', __('models/officeDetails.fields.strn_no').':') !!}
    {!! Form::text('strn_no', null, ['class' => 'form-control']) !!}
</div>
