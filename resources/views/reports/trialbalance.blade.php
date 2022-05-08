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
                    <!-- <a class="btn btn-primary float-right"
                       href="{{ route('chartofaccounts.create') }}">
                         View Summary
                    </a> -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#summaryModal">
                        View Summary
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Summary Modal Start -->
    <!-- Modal -->
    <div class="modal fade" id="summaryModal" tabindex="-1" role="dialog" aria-labelledby="summaryModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="summaryModal">Trial Balance Summary</h5>
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
                            $total_debit += $ledgers->journal_transactions->sum('debit')/100;
                            $total_credit += $ledgers->journal_transactions->sum('credit')/100;
                            $balance_total += $ledgers->getCurrentBalanceInDollars();
                        ?>
                        <tr>
                            <td>{{$ledgers->name}}</td>
                            <td>{{$ledgers->journal_transactions->sum('debit')/100}}</td>
                            <td>{{$ledgers->journal_transactions->sum('credit')/100}}</td>
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
                    @foreach ($ledgers->journal_transactions as $item)
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
</script>
@endpush