@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   @lang('models/chartofaccounts.plural')
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('chartofaccounts.create') }}">
                         @lang('crud.add_new')
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body p-2">
                <h3>HEADS</h3>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            @foreach ($accounts as $item)
                            {{-- <li class="nav-item {{($isinvoicesActive||$isinvoiceproduct||$isinvoicescreate)?'menu-open':''}} "> --}}
                                <li class="nav-item">
                                    <a href="#"  data-id="{{$item->id}}" class="get_accounts nav-link">
                                        <i class="nav-icon fas fa-shield-virus"></i>
                                        <p style="width: 600px">
                                            {{$item->name}}
                                            <i class="fas fa-angle-left right"></i>
                                        </p><p>{{$item->getheadbalancebalance()}}</p>
                                    </a>
                                    {{-- subaccounts --}}
                                    @if($item->has_child)
                                        @foreach($item->children as $d)
                                            <ul class="nav nav-treeview" style="margin-left: 50px;">
                                                <li class="nav-item">
                                                    <a href="#" data-id="{{$d->id}}" class="get_accounts nav-link">
                                                        <i class="nav-icon fas fa-shield-virus"></i>
                                                        <p style="width: 650px">{{$d->name}}</p><p>{{$d->getheadbalancebalance()}}</p>
                                                    </a>
                                                </li>
                                                @if($d->has_child)
                                                @foreach($d->children as $i)
                                                <li class="nav-item" style="margin-left: 50px;">
                                                    <a href="#"  data-id="{{$i->id}}" class="get_accounts nav-link">
                                                        <i class="nav-icon fas fa-shield-virus"></i>
                                                        <p style="width: 600px">{{$i->name}}</p><p>{{$i->getheadbalancebalance()}}</p>
                                                    </a>
                                                </li>
                                                @endforeach
                                            @endif
                                            </ul>
                                        @endforeach
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card p-2">
            <h3>ACCOUNTS</h3>
            <div class="card-body p-0">
                <table class="table" id="newTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>BALANCE</th>
                        </tr>
                    </thead>
                    <tbody id="dynamicTable">

                    </tbody>
                   </table>
                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>transaction_group</th>
                            <th>ref_class</th>
                            <th>memo</th>
                            <th>Ledger</th>
                            <th>Dabit</th>
                            <th>credit</th>
                            {{-- <th>Balance</th> --}}
                            <th>post_date</th>
                        </tr>
                    </thead>
                    <tbody id="dynamicledgerTable">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@push('page_scripts')
    <script type="text/javascript">

        $(".get_accounts").click(function(){
            var id=$(this).attr('data-id');
            var html='';
            $("#dynamicTable").html('');
             $.get("/getsubaccounts/"+id,
                 function (data, textStatus, jqXHR) {

                     $.each(data, function (indexInArray, valueOfElement) {
                        html='<tr data-id="'+valueOfElement.id+'"><td>'+valueOfElement.id+'</td><td>'+valueOfElement.name+'</td><td>'+valueOfElement.current_balance+'</td></tr>';
                        $("#dynamicTable").append(html);
                    });
                 },
                 "json"
             );
         });
         $("#newTable").on("click", "tr", function() {
            var id=$( this ).attr('data-id');
            var html='';
            $("#dynamicledgerTable").html('');

             $.get("/getaccountledger/"+id,
                 function (data, textStatus, jqXHR) {
                        $("#dynamicledgerTable").append(data);

                    //  $.each(data, function (indexInArray, valueOfElement) {
                    //     html='<tr><td>'+valueOfElement.id+'</td><td>'+valueOfElement.name+'</td><td>'+valueOfElement.current_balance+'</td></tr>';
                    //     $("#dynamicTable").append(html);
                    // });
                 },
                 "json"
             );
         });

        $("#add").click(function(){
            var html_vd =$('#vendor_dropdown').html();
            ++i;
            $("#dynamicTable").append('<tr><td><input type="text" name="product['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="product['+i+'][description]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="product['+i+'][model_no]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="product['+i+'][brand]" placeholder="Enter your Name" class="form-control" /></td><td><input type="number" name="product['+i+'][unitprice]" placeholder="Enter your Name" class="form-control" /></td><td><input type="number" name="product['+i+'][qty]" placeholder="Enter your Name" class="form-control" /></td><td><select name="product['+i+'][vendor_id]" class="form-control"><option value="">Others</option>'+html_vd+'</select></td><td><button type="button" class="btn btn-danger remove-tr">X</button></td></tr>');
        });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });
    </script>
@endpush
@endsection



