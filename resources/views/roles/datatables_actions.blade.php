@if(!$check_supper_admin)
{!! Form::open(['route' => ['roles.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('roles.show', $id) }}" class='btn btn-primary'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('roles.edit', $id) }}" class='btn btn-warning'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
    'type' => 'submit',
    'class' => 'btn btn-danger',
    'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
@endif
