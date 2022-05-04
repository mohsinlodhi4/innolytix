<!-- Dabit Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dabit_account', __('models/generalvouchers.fields.dabit_account').':') !!}

    <select name="d_coa_account" id="d_coa_account"  class="form-control">
        <option value="">SELECT ACCOUNT</option>
        @foreach ($account as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('credit_account', __('models/generalvouchers.fields.credit_account').':') !!}
    <select name="c_coa_account" id="c_coa_account" class="form-control">
        <option value="">SELECT ACCOUNT</option>
        @foreach ($account as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>

<br>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', __('models/generalvouchers.fields.amount').':') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/generalvouchers.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', __('models/generalvouchers.fields.created_by').':') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control']) !!}
</div>
@push('page_scripts')
    <script type="text/javascript">
         var i = 0;
    $("#credit_account").change(function(){

        if($("#credit_account").val()=='coa'){
           $('#c_coa_account').show();
           $('#c_bank_account').hide();
           $('#c_bank_account').val('');
           $('#c_joborder').hide();
           $('#c_joborder').val('');
        }else if($("#credit_account").val()=='bank'){
            $('#c_coa_account').hide();
            $('#c_coa_account').val('');
           $('#c_bank_account').show();
           $('#c_joborder').hide();
           $('#c_joborder').val('');
        }else if($("#credit_account").val()=='joborder'){
            $('#c_coa_account').hide();
            $('#c_coa_account').val('');
           $('#c_bank_account').hide();
           $('#c_bank_account').val('');
           $('#c_joborder').show();
        }else{
            $('#c_coa_account').hide();
            $('#c_coa_account').val('');
           $('#c_bank_account').hide();
           $('#c_bank_account').val('');
           $('#c_joborder').hide();
           $('#c_joborder').val('');
        }
        // var html_vd =$('#vendor_dropdown').html();
        // ++i;
        // $("#dynamicTable").append('<tr><td><input type="text" name="product['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="product['+i+'][description]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="product['+i+'][model_no]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="product['+i+'][brand]" placeholder="Enter your Name" class="form-control" /></td><td><input type="number" name="product['+i+'][unitprice]" placeholder="Enter your Name" class="form-control" /></td><td><input type="number" name="product['+i+'][qty]" placeholder="Enter your Name" class="form-control" /></td><td><select name="product['+i+'][vendor_id]" class="form-control"><option value="">Others</option>'+html_vd+'</select></td><td><button type="button" class="btn btn-danger remove-tr">X</button></td></tr>');
    });
    $("#dabit_account").change(function(){
        if($("#dabit_account").val()=='coa'){
           $('#d_coa_account').show();
           $('#d_bank_account').hide();
           $('#d_joborder').hide();
        }else if($("#dabit_account").val()=='bank'){
            $('#d_coa_account').hide();
           $('#d_bank_account').show();
           $('#d_joborder').hide();
        }else if($("#dabit_account").val()=='joborder'){
            $('#d_coa_account').hide();
           $('#d_bank_account').hide();
           $('#d_joborder').show();
        }else{
            $('#c_coa_account').hide();
           $('#c_bank_account').hide();
           $('#c_joborder').hide();
        }
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });
    </script>
@endpush
