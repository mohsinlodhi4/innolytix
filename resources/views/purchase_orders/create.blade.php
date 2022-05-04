@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                     @lang('models/purchaseOrders.singular')
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        {!! Form::open(['route' => 'purchaseOrders.store']) !!}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('purchase_orders.fields')
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('purchase_orders.purchaseproducts')
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <!-- <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('payment_terms', __('models/purchaseOrders.fields.payment_terms').':') !!}
                        {!! Form::text('payment_terms', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('sub_total', __('models/purchaseOrders.fields.sub_total').':') !!}
                        {!! Form::number('sub_total', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('tax', __('models/purchaseOrders.fields.tax').':') !!}
                        {!! Form::number('tax', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('grand_total', __('models/purchaseOrders.fields.grand_total').':') !!}
                        {!! Form::number('grand_total', null, ['class' => 'form-control']) !!}
                    </div>
                </div> -->
            </div>
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('purchaseOrders.index') }}" class="btn btn-default">
                 @lang('crud.cancel')
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('page_scripts')
<script>
    $('input[name=product]').on('input',function(){
        console.log(12);
    })
</script>
@endpush