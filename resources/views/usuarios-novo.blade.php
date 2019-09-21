@extends('layout.app', ["current" => "usuarios" ])

@section('body')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/users">Usuários</a></li>
    <li class="active"><a href="/admin/users/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/usuarios" method="post">
          @csrf
          <div class="box-body">
           <div class="form-group">
              <label for="desperson">{{ __('Nome') }}</label>
              <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Digite o nome">

              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif

            </div>
            
            <div class="form-group">
              <label for="desperson">{{ __('E-Mail') }}</label>
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Digite o email">

              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
              <label for="deslogin">{{ __('Senha') }}</label>
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Digite a senha">

              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif

            </div>
            <div class="form-group">
              <label for="nrphone">{{ __('Confirmar Senha') }}</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme a senha">


            </div>
            <div class="form-group">
              <label for="desemail">{{ __('Contexto') }}</label>
              <input id="contexto" type="text" class="form-control{{ $errors->has('contexto') ? ' is-invalid' : '' }}" name="contexto" value="{{ old('contexto') }}" required autofocus placeholder="Digite o contexto">


            </div>
            
            <div class="form-group">
              <label for="desemail">{{ __('Nivel') }}</label>
              <select id="admin" name="admin" class="form-control{{ $errors->has('admin') ? ' is-invalid' : '' }}" >
                <option value="N" selected>Usuário</option> 
                <option value="S">Administrador</option>
                <option value="G">Usuário Gravação</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->


<!-- /.content-wrapper -->
@endsection