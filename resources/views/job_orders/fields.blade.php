<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', __('models/jobOrders.fields.client_id').':') !!}
    <select name="client_id" id="" class="form-control">
        <option value=""></option>
        @foreach ($clients as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    {{-- {!! Form::number('client_id', null, ['class' => 'form-control']) !!} --}}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/jobOrders.fields.title').' / P.O#:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Unique Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unique_id', __('models/jobOrders.fields.unique_id').':') !!}
    {!! Form::text('unique_id', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-3 p-4">
    <button class="btn btn-primary rounded" id="generate">Generate</button>
</div>

@push('page_scripts')
<script>
    String.prototype.shuffle = function () {
    var a = this.split(""),
        n = a.length;

    for(var i = n - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
    }
    return a.join("");
}
    // let old_id = Date.now().toString().shuffle();
    let id = Math.random().toString(16).slice(2).toUpperCase();
    $('input[name=unique_id').val(id);
    $("#generate").click((e)=>{
        e.preventDefault();
        id = Math.random().toString(16).slice(2).toUpperCase();
        $('input[name=unique_id').val(id);

    })
</script>
@endpush