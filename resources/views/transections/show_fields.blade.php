<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/transections.fields.id').':') !!}
    <p>{{ $transections->id }}</p>
</div>

<!-- Joborder Id Field -->
<div class="col-sm-12">
    {!! Form::label('joborder_id', __('models/transections.fields.joborder_id').':') !!}
    <p>{{ $transections->joborder_id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/transections.fields.title').':') !!}
    <p>{{ $transections->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/transections.fields.description').':') !!}
    <p>{{ $transections->description }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', __('models/transections.fields.type').':') !!}
    <p>{{ $transections->type }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', __('models/transections.fields.amount').':') !!}
    <p>{{ $transections->amount }}</p>
</div>

<!-- Bank Id Field -->
<div class="col-sm-12">
    {!! Form::label('bank_id', __('models/transections.fields.bank_id').':') !!}
    <p>{{ $transections->bank_id }}</p>
</div>

<!-- Cheque No Field -->
<div class="col-sm-12">
    {!! Form::label('cheque_no', __('models/transections.fields.cheque_no').':') !!}
    <p>{{ $transections->cheque_no }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/transections.fields.created_by').':') !!}
    <p>{{ $transections->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/transections.fields.created_at').':') !!}
    <p>{{ $transections->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/transections.fields.updated_at').':') !!}
    <p>{{ $transections->updated_at }}</p>
</div>

