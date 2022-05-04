<!-- Joborder Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('joborder_id', __('models/purchaseOrders.fields.joborder_id').':') !!}
    <!-- {!! Form::number('joborder_id', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('joborder_id',$joborders->pluck('title','id') , null, ['class' => 'form-control']) !!}
</div>

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', __('models/purchaseOrders.fields.vendor_id').':') !!}
    <!-- {!! Form::number('vendor_id', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('vendor_id', $vendors->pluck('name','id') , null, ['class' => 'form-control']) !!}
</div>

<!-- Officedetail Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('officedetail_id', __('models/purchaseOrders.fields.officedetail_id').':') !!}
    <!-- {!! Form::number('officedetail_id', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('officedetail_id', $office_details->pluck('name','id') , null, ['class' => 'form-control']) !!}

</div>

<!-- Reference No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reference_no', __('models/purchaseOrders.fields.reference_no').':') !!}
    {!! Form::text('reference_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', __('models/purchaseOrders.fields.date').':') !!}
    {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Payment Terms Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_terms', __('models/purchaseOrders.fields.payment_terms').':') !!}
    {!! Form::text('payment_terms', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', __('models/purchaseOrders.fields.tax').':') !!}
    <!-- {!! Form::select('tax', $taxs->pluck('title', 'id'), null, ['class' => 'form-control']) !!} -->
    <select class="form-control" name="tax[]" id="tax" multiple>
        <option></option>
        @foreach($taxs as $t)
            <option value="{{$t->percent}}">{{$t->title." ". $t->percent."%"}}</option>
        @endforeach
    </select>
</div>


<!-- Bank Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_id', __('models/purchaseOrders.fields.bank_id').':') !!}
    <!-- {!! Form::number('bank_id', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('bank_id', $banks->pluck('bank', 'id'), null, ['class' => 'form-control']) !!}
</div>
<!-- Discount -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Discount :') !!}
    <input type="number" name="discount" class="form-control" value="0" >
</div>