@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                     @lang('models/quotations.singular')
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')



        {!! Form::open(['route' => 'quotations.store']) !!}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('quotations.fields')
                </div>
            </div>
        </div>
        <p>ADD PRODUCTS</p>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('quotations.productfield')
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('quotations.endfield')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('quotations.index') }}" class="btn btn-default">
                 @lang('crud.cancel')
                </a>
            </div>
        </div>
        {!! Form::close() !!}


    </div>
@endsection
