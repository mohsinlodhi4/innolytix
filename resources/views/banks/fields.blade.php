<!-- Bank Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_name', __('models/banks.fields.bank_name').':') !!}
    {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch', __('models/banks.fields.branch').':') !!}
    {!! Form::text('branch', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_title', __('models/banks.fields.account_title').':') !!}
    {!! Form::text('account_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Account No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_no', __('models/banks.fields.account_no').':') !!}
    {!! Form::text('account_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Iban Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iban', __('models/banks.fields.iban').':') !!}
    {!! Form::text('iban', null, ['class' => 'form-control']) !!}
</div>

<!-- Opening Balance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opening_balance', __('models/banks.fields.opening_balance').':') !!}
    {!! Form::text('opening_balance', null, ['class' => 'form-control']) !!}
</div>

