<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/ledgers.fields.id').':') !!}
    <p>{{ $ledgers->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/ledgers.fields.name').':') !!}
    <p>{{ $ledgers->name }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', __('models/ledgers.fields.type').':') !!}
    <p>{{ $ledgers->type }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/ledgers.fields.created_at').':') !!}
    <p>{{ $ledgers->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/ledgers.fields.updated_at').':') !!}
    <p>{{ $ledgers->updated_at }}</p>
</div>

