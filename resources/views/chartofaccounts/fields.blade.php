<!-- Id Field -->

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/chartofaccounts.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('parent', __('Parent').':') !!}
    <select name="head_id" id="" class="form-control">
        <option value="">HEAD</option>
        @foreach($accounts as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @if($item->has_child)
                @foreach($item->children as $d)
                    <option value="{{$d->id}}">-->>{{$d->name}}</option>
                    @if($d->has_child)
                        @foreach($d->children as $i)
                            <option value="{{$i->id}}">------>>{{$i->name}}</option>
                        @endforeach
                    @endif
                @endforeach
            @endif
        @endforeach
    </select>
</div>
