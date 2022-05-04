@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   @lang('models/accountsHeads.plural')
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('accountsHeads.create') }}">
                         @lang('crud.add_new')
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                {{-- @include('accounts_heads.table') --}}
                <div class="sidebar">
                    <nav class="mt-2">

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            @foreach ($heads as $item)
                            {{-- <li class="nav-item {{($isinvoicesActive||$isinvoiceproduct||$isinvoicescreate)?'menu-open':''}} "> --}}
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-shield-virus"></i>
                                        <p style="width: 600px">
                                            {{$item->name}}
                                            <i class="fas fa-angle-left right"></i>
                                        </p><p style="padding-left: 100px">{{$item->getheadbalancebalance()}}</p>
                                    </a>
                                    @if($item->has_child)
                                        @foreach($item->children as $d)
                                            <ul class="nav nav-treeview" style="margin-left: 50px;">
                                                <li class="nav-item">
                                                    <a href="{{ route('invoices.index') }}" class="nav-link">
                                                        <i class="nav-icon fas fa-shield-virus"></i>
                                                        <p style="width: 650px">{{$d->name}}</p><p>{{$d->getheadbalancebalance()}}</p>
                                                    </a>

                                                </li>
                                                @if($d->has_child)
                                                @foreach($d->children as $i)
                                                        <li class="nav-item" style="margin-left: 50px;">
                                                            <a href="{{ route('invoices.index') }}" class="nav-link">
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
                </div>
                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


