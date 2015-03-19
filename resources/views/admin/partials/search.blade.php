<div class="form-group">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del usuario'] )!!}
    {!! Form::select('type', trans('options.types'), null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Buscar', ['class'=> 'btn btn-default']) !!}
