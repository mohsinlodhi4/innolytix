
<table class="table table-bordered" id="dynamicTable">
    <tr>
        <th style="width:21%">Name</th>
        <th style="width:21%">Description</th>
        <th style="width:12%">Model</th>
        <th style="width:12%">Brand</th>
        <th style="width:9%">UnitRate</th>
        <th style="width:9%">Qty</th>
        <th style="width:10%">Vendor</th>
        <th style="width:6%">Action</th>
    </tr>
    <tr>
        <td><input type="text" name="product[0][name]" placeholder="Enter your Name" class="form-control" /></td>
        <td><input type="text" name="product[0][description]" placeholder="Enter your Description" class="form-control" /></td>
        <td><input type="text" name="product[0][model_no]" placeholder="Enter your Model" class="form-control" /></td>
        <td><input type="text" name="product[0][brand]" placeholder="Enter your Brand" class="form-control" /></td>
        <td><input type="number" name="product[0][unitprice]" placeholder="Enter your Price" class="form-control" /></td>
        <td><input type="number" name="product[0][qty]" placeholder="Enter your Qty" class="form-control" /></td>
        <td><select name="product[0][vendor_id]" class="form-control">
            <option value="">Others</option>
            @foreach ($vendors as $v)
            <option value="{{$v->id}}">{{$v->name}}</option>
            @endforeach
            </select>
        </td>
        <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
    </tr>
</table>
<div id="vendor_dropdown" style="display: none">
        @foreach ($vendors as $v)
            <option value="{{$v->id}}">{{$v->name}}</option>
        @endforeach
</div>

@push('page_scripts')
    <script type="text/javascript">
         var i = 0;
    $("#add").click(function(){
        var html_vd =$('#vendor_dropdown').html();
        ++i;
        $("#dynamicTable").append('<tr><td><input  type="text" name="product['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="product['+i+'][description]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="product['+i+'][model_no]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="product['+i+'][brand]" placeholder="Enter your Name" class="form-control" /></td><td><input type="number" name="product['+i+'][unitprice]" placeholder="Enter your Name" class="form-control" /></td><td><input type="number" name="product['+i+'][qty]" placeholder="Enter your Name" class="form-control" /></td><td><select name="product['+i+'][vendor_id]" class="form-control"><option value="">Others</option>'+html_vd+'</select></td><td><button type="button" class="btn btn-danger remove-tr">X</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });
    </script>
@endpush
