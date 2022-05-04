<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/taxes.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Percent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('percent', __('models/taxes.fields.percent').':') !!}
    {!! Form::number('percent', null, ['class' => 'form-control']) !!}
</div>
