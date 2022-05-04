<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/jobOrders.fields.id').':') !!}
    <p>{{ $jobOrder->id }}</p>
</div>

<!-- Client Id Field -->
<div class="col-sm-12">
    {!! Form::label('client_id', __('models/jobOrders.fields.client_id').':') !!}
    <p>{{ $jobOrder->client_id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/jobOrders.fields.title').':') !!}
    <p>{{ $jobOrder->title }}</p>
</div>

<!-- Unique Id Field -->
<div class="col-sm-12">
    {!! Form::label('unique_id', __('models/jobOrders.fields.unique_id').':') !!}
    <p>{{ $jobOrder->unique_id }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/jobOrders.fields.created_by').':') !!}
    <p>{{ $jobOrder->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/jobOrders.fields.created_at').':') !!}
    <p>{{ $jobOrder->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/jobOrders.fields.updated_at').':') !!}
    <p>{{ $jobOrder->updated_at }}</p>
</div>

