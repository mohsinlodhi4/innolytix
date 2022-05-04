<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/paymentvouchers.fields.id').':') !!}
    <p>{{ $paymentvoucher->id }}</p>
</div>

<!-- Bank Account Field -->
<div class="col-sm-12">
    {!! Form::label('bank_account', __('models/paymentvouchers.fields.bank_account').':') !!}
    <p>{{ $paymentvoucher->bank_account }}</p>
</div>

<!-- Dabit Account Field -->
<div class="col-sm-12">
    {!! Form::label('dabit_account', __('models/paymentvouchers.fields.dabit_account').':') !!}
    <p>{{ $paymentvoucher->dabit_account }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/paymentvouchers.fields.description').':') !!}
    <p>{{ $paymentvoucher->description }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', __('models/paymentvouchers.fields.amount').':') !!}
    <p>{{ $paymentvoucher->amount }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/paymentvouchers.fields.created_by').':') !!}
    <p>{{ $paymentvoucher->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/paymentvouchers.fields.created_at').':') !!}
    <p>{{ $paymentvoucher->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/paymentvouchers.fields.updated_at').':') !!}
    <p>{{ $paymentvoucher->updated_at }}</p>
</div>

