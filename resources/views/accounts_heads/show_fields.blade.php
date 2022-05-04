<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/accountsHeads.fields.id').':') !!}
    <p>{{ $accountsHead->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/accountsHeads.fields.name').':') !!}
    <p>{{ $accountsHead->name }}</p>
</div>

<!-- Ledger Id Field -->
<div class="col-sm-12">
    {!! Form::label('ledger_id', __('models/accountsHeads.fields.ledger_id').':') !!}
    <p>{{ $accountsHead->ledger_id }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', __('models/accountsHeads.fields.type').':') !!}
    <p>{{ $accountsHead->type }}</p>
</div>

<!-- Parent Id Field -->
<div class="col-sm-12">
    {!! Form::label('parent_id', __('models/accountsHeads.fields.parent_id').':') !!}
    <p>{{ $accountsHead->parent_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/accountsHeads.fields.created_at').':') !!}
    <p>{{ $accountsHead->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/accountsHeads.fields.updated_at').':') !!}
    <p>{{ $accountsHead->updated_at }}</p>
</div>

