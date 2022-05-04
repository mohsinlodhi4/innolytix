
<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', __('models/quotations.fields.discount').':') !!}
    {!! Form::number('discount', 0, ['class' => 'form-control']) !!}
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', __('models/quotations.fields.tax').':') !!}
    {{-- {!! Form::number('tax', null, ['class' => 'form-control']) !!} --}}
    <select name="tax[]" id="" class="form-control" multiple>
        <option value="0" selected></option>
        @foreach ($taxs as $titem)
            <option value="{{$titem->percent}}">{{$titem->title."     ".$titem->percent."%"}}</option>
        @endforeach
    </select>
</div>

