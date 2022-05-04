<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/ledgers.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('models/ledgers.fields.type').':') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>