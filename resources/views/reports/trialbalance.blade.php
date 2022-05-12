@extends('layouts.app')

@section('content')
<?php
$grand_debit = 0;
$grand_credit = 0;
?>
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        Trial Balance
                    </h4>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#summaryModal">
                        View Heads Summary
                    </button> 
                    <!-- <button type="button" class="btn btn-primary float-right mr-2" data-toggle="modal" data-target="#summaryModal2">
                        View Summary
                    </button> -->
                </div>
            </div>
            <div class="row p-2 mt-2">
            <!-- Filter From Start -->
        <form class="col-12" action="{{route('trialbalance')}}" id="filterForm" method="get" class="p-4">
            @csrf
            <div class="row justify-content-baseline">
                <div class="form-group bmd-form-group col-md-4">
                    <label class="bmd-label-static">Date From</label>
                    <input name="dateFrom" id="dateFrom" type="date" class="form-control">
                </div>
                <div class="form-group bmd-form-group col-md-4">
                    <label class="bmd-label-static">Date To</label>
                    <input name="dateTo" type="date" id="dateTo" class="form-control">
                </div>
                <div class="col-md-2 text-center pt-3">
                    <button type="submit" style="width:80%" class="btn btn-lg btn-primary">Filter</button>
                </div>
                <div class="col-md-2 text-center pt-3">
                    <a class="btn btn-lg btn-primary" style="width:80%" href="{{route('trialbalance')}}">Reset</a>
                </div>
            </div>
        </form>
        <!-- Filter From End -->
            </div>
        </div>
    </section>
    <!-- Summary Modal Start -->
    <!-- Modal -->
    <div class="modal fade" id="summaryModal" tabindex="-1" role="dialog" aria-labelledby="summaryModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="summaryModal">Trial Balance Heads Summary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Account Head</th>
                            <th>Debit Balance</th>
                            <th>Credit Balance</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_debit = 0;
                            $total_credit = 0;
                            $balance_total = 0;
                        ?>
                    @foreach($the_ledgers as $ledgers)
                    <?php
                            $total_debit += $ledgers->journal_transactions()->where($conditions)->get()->sum('debit')/100;
                            $total_credit += $ledgers->journal_transactions()->where($conditions)->get()->sum('credit')/100;
                            $balance_total += $ledgers->getCurrentBalanceInDollars();
                        ?>
                        <tr>
                            <td>{{$ledgers->name}}</td>
                            <td>{{$ledgers->journal_transactions()->where($conditions)->get()->sum('debit')/100}}</td>
                            <td>{{$ledgers->journal_transactions()->where($conditions)->get()->sum('credit')/100}}</td>
                            <td>{{$ledgers->getCurrentBalanceInDollars()}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td> <h3>Total </h3> </td>
                            <td>{{$total_debit}}</td>
                            <td>{{$total_credit}}</td>
                            <td>{{$balance_total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Summary Modal End -->
    <!-- Summary Modal 2 Start -->
    <div class="modal fade" id="summaryModal2" tabindex="-1" role="dialog" aria-labelledby="summaryModal2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="summaryModal2">Trial Balance Summary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Post Date</th>
                            <th>Account</th>
                            <th>Debit </th>
                            <th>Credit</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_debit = 0;
                            $total_credit = 0;
                            $balance_total = 0;
                        ?>
                    @foreach($the_ledgers as $ledgers)
                    <?php
                            $total_debit += $ledgers->journal_transactions()->where($conditions)->get()->sum('debit')/100;
                            $total_credit += $ledgers->journal_transactions()->where($conditions)->get()->sum('credit')/100;
                            $balance_total += $ledgers->getCurrentBalanceInDollars();
                        ?>
                        <tr>
                            <td>{{$ledgers->name}}</td>
                            <td>{{$ledgers->journal_transactions()->where($conditions)->get()->sum('debit')/100}}</td>
                            <td>{{$ledgers->journal_transactions()->where($conditions)->get()->sum('credit')/100}}</td>
                            <td>{{$ledgers->getCurrentBalanceInDollars()}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td> <h3>Total </h3> </td>
                            <td>{{$total_debit}}</td>
                            <td>{{$total_credit}}</td>
                            <td>{{$balance_total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Summary Modal 2 End -->
    <br>
@foreach($the_ledgers as $ledgers)
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 p-3 bg-dark">
                    <h1>@lang('models/ledgers.singular'): {{$ledgers->name}}</h1>
                </div>
            </div>
        </div>
</section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Post Date</th>
                            <th>Account</th>
                            <th>Memo</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            {{-- <th>Balance</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_credit = 0;
                            $total_debit = 0;
                        ?>
                    @foreach ($ledgers->journal_transactions()->where($conditions)->get() as $item)
                    <?php
                    $item_credit = removeTwoZeroes($item->credit) ?? 0;
                    $item_debit = removeTwoZeroes($item->debit) ?? 0;
                    $total_credit += $item_credit;
                    $grand_credit += $item_credit;
                    $total_debit += $item_debit;
                    $grand_debit += $item_debit;
                    ?>
                        <tr>
                            <td>{{$item->post_date?$item->post_date->toDateString():''}}</td>
                            <td>{{$item->journal->morphed->name?$item->journal->morphed->name:''}}</td>
                            <td>{{$item->memo?$item->memo:''}}</td>
                            <td>{{$item_debit}}</td>
                            <td>{{$item_credit}}</td>
                            {{-- <td>{{$item->journal->balance?$item->journal->balance:''}}</td> --}}
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td> <h3>Total </h3> </td>
                            <td>{{$total_debit}}</td>
                            <td>{{$total_credit}}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="p-3 text-center">
                    <h4> Balance: &nbsp;&nbsp;&nbsp;{{ $ledgers->getCurrentBalanceInDollars()}}</h4>
                </div>

            </div>
        </div>
    </div>
@endforeach
<div class="container-fluid p-3 bg-secondary">
    <div class="d-flex justify-content-between" style="width:70%; margin: auto auto;">
        <h4>Total Debit: {{$grand_debit}}</h4>
        <h4>Total Credit: {{$grand_credit}}</h4>
    </div>
</div>
@endsection

@push('page_scripts')
<script>
    $(document).ready(function(){
        let dtable = $('.table').DataTable({
        dom: 'Bfrtip',
        "bSort" : false,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
    });
        // Filter Setting DateFrom and To Start
        const queryString = window.location.search;
    const parameters = new URLSearchParams(queryString);
    if (parameters.get('dateFrom') != null) {
        document.getElementById('dateFrom').setAttribute('value', parameters.get('dateFrom'));
    }
    if (parameters.get('dateTo') != null) {
        document.getElementById('dateTo').setAttribute('value', parameters.get('dateTo'));
    }

    $("#filterForm").submit(function(e) {
        e.preventDefault();
        let submitForm = true;
        let dateFrom = $("#dateFrom").val();
        let dateTo = $("#dateTo").val();
        dateFrom = dateFrom != "" ? new Date(dateFrom).getTime() : null;
        dateTo = dateTo != "" ? new Date(dateTo).getTime() : null;

        if (dateFrom != null && dateTo != null) {
            submitForm = dateFrom <= dateTo;
        }

        if (submitForm) {
            $(this)[0].submit();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Invalid Date Selection !',
            }).then(function() {
                $("#dateFrom").val("");
                $("#dateTo").val("");
            });
        }

    });
    // Filter Setting DateFrom and To End

</script>
@endpush