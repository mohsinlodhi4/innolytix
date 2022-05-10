<!-- Bank Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_account', __('models/paymentvouchers.fields.bank_account').':') !!}
    <select name="bank_account" id="" class="form-control">
        @foreach ($bank as $item)
            <option value="{{$item->id}}">{{$item->bank_name .' - '. $item->account_no}}</option>
        @endforeach
    </select>
    {{-- {!! Form::text('bank_account', null, ['class' => 'form-control']) !!} --}}
</div>

<!-- Dabit Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dabit_account', 'Party:') !!}
    {{-- {!! Form::text('dabit_account', null, ['class' => 'form-control']) !!} --}}
    <select name="dabit_account" id="" class="form-control">
        @foreach ($account as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>

<!-- Joborder Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('joborder_id', __('models/purchaseOrders.fields.joborder_id').':') !!}
    {!! Form::select('joborder_id',$joborders->pluck('unique_id','id') , null, ['class' => 'form-control']) !!}
</div>

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', __('models/purchaseOrders.fields.vendor_id').':') !!}
    <!-- {!! Form::select('vendor_id', $vendors->pluck('name','id') , null, ['class' => 'form-control']) !!} -->
    <select name="venodr_id" class="form-control">
        <option></option>
        @foreach($vendors as $v)
        <option value="{{$v->id}}">{{$v->name}}</option>

        @endforeach
    </select>
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/paymentvouchers.fields.description').':') !!}
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
    <select name="tax_id[]" id="tax_id" class="form-control" multiple>
        <option value=""></option>
        @foreach($taxs as $t)
            <option value="{{$t->id}}">{{$t->title." ". $t->percent."%"}}</option>
        @endforeach
    </select>
    <!-- {!! Form::select('tax_id', $taxs->pluck('title','id'),null, ['class' => 'form-control']) !!} -->
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', __('models/paymentvouchers.fields.amount').':') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('created_by', __('models/paymentvouchers.fields.created_by').':') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control']) !!}
</div> -->
