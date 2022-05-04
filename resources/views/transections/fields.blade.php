<!-- Joborder Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('joborder_id', __('models/transections.fields.joborder_id').':') !!}
    {{-- {!! Form::number('joborder_id', null, ['class' => 'form-control']) !!} --}}
    <select name="joborder_id" id="" class="form-control">
        <option value=""></option>
        @foreach ($joborders as $item)
            <option value="{{$item->id}}">{{$item->unique_id}}</option>
        @endforeach
    </select>
</div>

<!-- Bank Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_id', __('models/transections.fields.bank_id').':') !!}
    {{-- {!! Form::number('bank_id', null, ['class' => 'form-control']) !!} --}}
    <select name="bank_id" id="" class="form-control">
        <option value=""></option>
        @foreach ($banks as $item)
            <option value="{{$item->id}}">{{$item->bank_name." | ".$item->account_title." | ".$item->account_no}}</option>
        @endforeach
    </select>
</div>

<!-- Cheque No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cheque_no', __('models/transections.fields.cheque_no').':') !!}
    {!! Form::text('cheque_no', null, ['class' => 'form-control']) !!}
</div>
<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('models/transections.fields.type').':') !!}
    {{-- {!! Form::text('type', null, ['class' => 'form-control']) !!} --}}
    <select name="type" id="" class="form-control">
        <option value="recieved">Payment Recieved</option>
        <option value="expense">Paid Expense</option>
    </select>
</div>
<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/transections.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/transections.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>



<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', __('models/transections.fields.amount').':') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>



