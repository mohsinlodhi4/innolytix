
<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', __('models/invoices.fields.discount').':') !!}
    {!! Form::number('discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', __('models/invoices.fields.tax').':') !!}
    {{-- {!! Form::number('tax', null, ['class' => 'form-control']) !!} --}}
    <select name="tax[]" id="" class="form-control" multiple>
        <option value=""></option>
        @foreach ($taxs as $titem)
            <option value="{{$titem->percent}}">{{$titem->title}}</option>
        @endforeach
    </select>
</div>

<!-- Grand Total Field -->
<div class="form-group col-sm-12">
    {!! Form::label('notes', 'Note') !!}
    {!! Form::textarea('notes', 'Terms & Conditions:
    1. Cheque should be drawn in favor of "Innolytix Pakistan Private Limited."
    2. Payment should be made as per agreed terms & Conditions.
    3. IPPL is expemted from Withholding Tax, according to the CONCEPT OF ‘STARTUP BUSINESS’ & RELATED INCENTIVES, Financial Act, 2017
    [Section 2(62A), Clause (143) of Part I of Second Schedule and Clauses (11A) & (43F) of Part IV of Second Schedule] ', ['class' => 'form-control']) !!}
</div>

