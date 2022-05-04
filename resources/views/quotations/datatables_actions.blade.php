{!! Form::open(['route' => ['quotations.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('quotations.show', $id) }}" class='btn btn-primary'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('quotations.edit', $id) }}" class='btn btn-warning'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
