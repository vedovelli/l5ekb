<div class="form-group">
  {!! Form::label('name', 'Nome', array('class' => 'control-label')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('email', 'Email', array('class' => 'control-label')) !!}
  {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('age', 'Idade', array('class' => 'control-label')) !!}
  {!! Form::text('age', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('password', 'Senha', array('class' => 'control-label')) !!}
  {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('password_confirmation', 'Confirmar Senha', array('class' => 'control-label')) !!}
  {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>