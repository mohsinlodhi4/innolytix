@extends('layouts.app')

@section('content')
<?php
$grand_debit = 0;
$grand_credit = 0;
?>
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
                            <th>Ledger</th>
                            <th>memo</th>
                            <th>Dabit</th>
                            <th>credit</th>
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
                    $total_credit += $item->credit ?? 0;
                    $grand_credit += $item->credit ?? 0;
                    $total_debit += $item->debit ?? 0;
                    $grand_debit += $item->debit ?? 0;

                    ?>
                        <tr>
                            <td>{{$item->post_date?$item->post_date:''}}</td>
                            <td>{{$item->journal->ledger->name?$item->journal->ledger->name:''}}</td>
                            <td>{{$item->memo?$item->memo:''}}</td>
                            <td>{{$item->debit?$item->debit:''}}</td>
                            <td>{{$item->credit?$item->credit:''}}</td>
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