<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/accountsHeads.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', __('models/accountsHeads.fields.parent_id').':') !!}
    <select name="parent_id" class="form-control" id="">
        @foreach ($heads as $item)
            <option value="{{$item->id}}">{{$item->code.' | '.$item->name}}</option>
            @if($item->has_child)
               @foreach ($item->children as $citem)
                    <option value="{{$citem->id}}">-->>{{$citem->code.' | '.$citem->name}}</option>
                    @if($item->has_child)
                        @foreach ($citem->children as $gcitem)
                            <option value="{{$gcitem->id}}">------>>{{$gcitem->code.' | '.$gcitem->name}}</option>
                        @endforeach
                    @endif
               @endforeach
            @endif
        @endforeach
    </select>
</div>
