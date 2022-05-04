<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/banks.fields.id').':') !!}
    <p>{{ $banks->id }}</p>
</div>

<!-- Bank Name Field -->
<div class="col-sm-12">
    {!! Form::label('bank_name', __('models/banks.fields.bank_name').':') !!}
    <p>{{ $banks->bank_name }}</p>
</div>

<!-- Branch Field -->
<div class="col-sm-12">
    {!! Form::label('branch', __('models/banks.fields.branch').':') !!}
    <p>{{ $banks->branch }}</p>
</div>

<!-- Account Title Field -->
<div class="col-sm-12">
    {!! Form::label('account_title', __('models/banks.fields.account_title').':') !!}
    <p>{{ $banks->account_title }}</p>
</div>

<!-- Account No Field -->
<div class="col-sm-12">
    {!! Form::label('account_no', __('models/banks.fields.account_no').':') !!}
    <p>{{ $banks->account_no }}</p>
</div>

<!-- Iban Field -->
<div class="col-sm-12">
    {!! Form::label('iban', __('models/banks.fields.iban').':') !!}
    <p>{{ $banks->iban }}</p>
</div>

<!-- Opening Balance Field -->
<div class="col-sm-12">
    {!! Form::label('opening_balance', __('models/banks.fields.opening_balance').':') !!}
    <p>{{ $banks->opening_balance }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/banks.fields.created_by').':') !!}
    <p>{{ $banks->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/banks.fields.created_at').':') !!}
    <p>{{ $banks->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/banks.fields.updated_at').':') !!}
    <p>{{ $banks->updated_at }}</p>
</div>

