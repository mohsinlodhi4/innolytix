@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('models/chartofaccounts.singular')</h1>
                    <h1>Balance:{{ $chartofaccounts->getCurrentBalanceInDollars()}}</h1>

                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('chartofaccounts.index') }}">
                         @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
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
                    <tbody>
                    @foreach ($chartofaccounts->transactions as $item)
                        <tr>
                            <td>{{$item->transaction_group?$item->transaction_group:''}}</td>
                            <td>{{$item->ref_class?$item->ref_class:''}}</td>
                            <td>{{$item->memo?$item->memo:''}}</td>
                            <td>{{$item->journal->ledger->name?$item->journal->ledger->name:''}}</td>
                            <td>{{$item->debit?$item->debit:''}}</td>
                            <td>{{$item->credit?$item->credit:''}}</td>
                            {{-- <td>{{$item->journal->balance?$item->journal->balance:''}}</td> --}}
                            <td>{{$item->post_date?$item->post_date:''}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{-- <div class="row">
                    @include('chartofaccounts.show_fields')
                </div>     --}}

            </div>
        </div>
    </div>
@endsection
