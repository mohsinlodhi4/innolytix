@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                      @lang('models/invoices.singular')
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($invoices, ['route' => ['invoices.update', $invoices->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('invoices.fields')
                </div>
            </div>
            <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('invoices.invoiceproduct')
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('invoices.endfields')
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('invoices.index') }}" class="btn btn-default">
                 @lang('crud.cancel')
                </a>
            </div>
        </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('invoices.index') }}" class="btn btn-default">
                    @lang('crud.cancel')
                 </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection