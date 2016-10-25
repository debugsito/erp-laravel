<!DOCTYPE html>
<html lang="es" class="boxshadow">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Login </title>
    {{-- HTML::style('css/login.css') --}}
    {{-- HTML::script('js/modernizr.custom.44129.js') --}}
    {{ stylesheet_link_tag() }}

 </head>
 <body>
  <div class="">
    <div id="" class="">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            {{ Form::open(array('url' => 'login', 'id' => 'login')) }}
              <h2>Iniciar sesión</h2>
              <hr>
              <div class="form-group">
                {{ Form::label('email', 'Correo') }}
                {{ Form::text('email', 'admin@admin.com', array('class' => 'form-control')) }}
              </div>
              <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
              </div>
              <div class="form-group text-right">
                {{ Form::submit('Sign in', array('class' => 'btn btn-success', 'id' => 'btn-login')) }}
              </div>
            {{ Form::close() }}   
          </div>
        </div>
      </div>
    </div>
  </body>
  {{ javascript_include_tag() }}
</html>