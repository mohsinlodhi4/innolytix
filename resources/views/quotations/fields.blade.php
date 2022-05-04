<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id','Client:') !!}
    <select name="client_id" id="" class="form-control">
        @foreach ($clients as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    {{-- {!! Form::number('client_id', null, ['class' => 'form-control']) !!} --}}
</div>

<!-- Officedetails Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('officedetails_id', 'Office Details:') !!}
    {{-- {!! Form::number('officedetails_id', null, ['class' => 'form-control']) !!} --}}
    <select name="officedetails_id" id="" class="form-control">
        @foreach ($officedetails as $oitem)
            <option value="{{$oitem->id}}">{{$oitem->name}}</option>
        @endforeach
    </select>
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', __('models/quotations.fields.date').':') !!}
    {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', __('models/quotations.fields.subject').':') !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
