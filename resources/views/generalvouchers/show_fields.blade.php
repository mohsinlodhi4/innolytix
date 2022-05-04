<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/generalvouchers.fields.id').':') !!}
    <p>{{ $generalvoucher->id }}</p>
</div>

<!-- Credit Account Field -->
<div class="col-sm-12">
    {!! Form::label('credit_account', __('models/generalvouchers.fields.credit_account').':') !!}
    <p>{{ $generalvoucher->credit_account }}</p>
</div>

<!-- Dabit Account Field -->
<div class="col-sm-12">
    {!! Form::label('dabit_account', __('models/generalvouchers.fields.dabit_account').':') !!}
    <p>{{ $generalvoucher->dabit_account }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', __('models/generalvouchers.fields.amount').':') !!}
    <p>{{ $generalvoucher->amount }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/generalvouchers.fields.description').':') !!}
    <p>{{ $generalvoucher->description }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/generalvouchers.fields.created_by').':') !!}
    <p>{{ $generalvoucher->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/generalvouchers.fields.created_at').':') !!}
    <p>{{ $generalvoucher->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/generalvouchers.fields.updated_at').':') !!}
    <p>{{ $generalvoucher->updated_at }}</p>
</div>

