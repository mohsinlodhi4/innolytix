<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/clients.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/clients.fields.phone').':') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Ntn No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ntn_no', __('models/clients.fields.ntn_no').':') !!}
    {!! Form::text('ntn_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Srtn No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('srtn_no', __('models/clients.fields.srtn_no').':') !!}
    {!! Form::text('srtn_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/clients.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person', __('models/clients.fields.contact_person').':') !!}
    {!! Form::text('contact_person', null, ['class' => 'form-control']) !!}
</div>

<!-- Person Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('person_phone', __('models/clients.fields.person_phone').':') !!}
    {!! Form::number('person_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Designation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('designation', __('models/clients.fields.designation').':') !!}
    {!! Form::text('designation', null, ['class' => 'form-control']) !!}
</div>
