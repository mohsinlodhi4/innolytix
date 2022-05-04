<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/taxes.fields.id').':') !!}
    <p>{{ $tax->id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/taxes.fields.title').':') !!}
    <p>{{ $tax->title }}</p>
</div>

<!-- Percent Field -->
<div class="col-sm-12">
    {!! Form::label('percent', __('models/taxes.fields.percent').':') !!}
    <p>{{ $tax->percent }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/taxes.fields.created_by').':') !!}
    <p>{{ $tax->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/taxes.fields.created_at').':') !!}
    <p>{{ $tax->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/taxes.fields.updated_at').':') !!}
    <p>{{ $tax->updated_at }}</p>
</div>

