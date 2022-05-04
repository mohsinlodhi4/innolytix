<!-- Bank Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_account', __('models/reciptvouchers.fields.bank_account').':') !!}
    <select name="bank_account" id="" class="form-control">
        @foreach ($bank as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    {{-- {!! Form::text('bank_account', null, ['class' => 'form-control']) !!} --}}
</div>

<!-- Credit Account Field -->
<div class="form-group col-sm-6">
    <!-- {!! Form::label('credit_account', __('models/reciptvouchers.fields.credit_account').':') !!} -->
    {!! Form::label('credit_account','Party:') !!}
    <select name="credit_account" id="" class="form-control">
        @foreach ($account as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    {{-- {!! Form::text('credit_account', null, ['class' => 'form-control']) !!} --}}
</div>

<!-- Joborder Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('joborder_id', __('models/purchaseOrders.fields.joborder_id').':') !!}
    {!! Form::select('joborder_id',$joborders->pluck('title','id') , null, ['class' => 'form-control']) !!}
</div>



<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/reciptvouchers.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Cheque Ref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cheque_ref', 'Cheque Ref:') !!}
    {!! Form::text('cheque_ref', null, ['class' => 'form-control']) !!}
</div>
<!-- Cheque Ref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cheque_date', 'Cheque Date:') !!}
    {!! Form::date('cheque_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_id', __('models/paymentvouchers.fields.tax').':') !!}
    <!-- {!! Form::select('tax_id', $taxs->pluck('title','id'),null, ['class' => 'form-control']) !!} -->
    <select name="tax_id[]" class="form-control" multiple>
        <option value=""></option>
        @foreach($taxs as $t)
            <option value="{{$t->id}}">{{$t->title." ".$t->percent." %"}}</option>
        @endforeach
    </select>
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', __('models/reciptvouchers.fields.amount').':') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', __('Checque No').':') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control']) !!}
</div>
