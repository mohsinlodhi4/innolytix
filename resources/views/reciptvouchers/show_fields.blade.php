<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/reciptvouchers.fields.id').':') !!}
    <p>{{ $reciptvoucher->id }}</p>
</div>

<!-- Bank Account Field -->
<div class="col-sm-12">
    {!! Form::label('bank_account', __('models/reciptvouchers.fields.bank_account').':') !!}
    <p>{{ $reciptvoucher->bank_account }}</p>
</div>

<!-- Credit Account Field -->
<div class="col-sm-12">
    {!! Form::label('credit_account', __('models/reciptvouchers.fields.credit_account').':') !!}
    <p>{{ $reciptvoucher->credit_account }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/reciptvouchers.fields.description').':') !!}
    <p>{{ $reciptvoucher->description }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', __('models/reciptvouchers.fields.amount').':') !!}
    <p>{{ $reciptvoucher->amount }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/reciptvouchers.fields.created_by').':') !!}
    <p>{{ $reciptvoucher->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/reciptvouchers.fields.created_at').':') !!}
    <p>{{ $reciptvoucher->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/reciptvouchers.fields.updated_at').':') !!}
    <p>{{ $reciptvoucher->updated_at }}</p>
</div>

