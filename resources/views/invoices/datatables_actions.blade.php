{!! Form::open(['route' => ['invoices.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('invoices.show', $id) }}" class='btn btn-primary'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('invoices.edit', $id) }}" class='btn btn-warning'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
