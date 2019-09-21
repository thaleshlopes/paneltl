@extends('layout.app', ["current" => "usuarios" ])

@section('body')
	    
    <section class="content-header">
      <h1>
        Usuarios
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href="/usuarios"></a>Usuarios</li>
      </ol>
    </section>

 
 <section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/usuarios/novo" class="btn btn-success">Cadastrar Usuário</a>
            </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Contexto</th>
                    <th style="width: 60px">Admin</th>
                    <th style="width: 140px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td >{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->contexto }}</td/>
                    <td>@if($user->admin  == 'S')Administrador @endif
                        @if($user->admin  == 'N')Usuário @endif
                        @if($user->admin  == 'G')Gravações @endif</td>
                    <td>
                      <a href="/usuarios/editar/{{$user->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/usuarios/apagar/{{$user->id}}" onclick="return confirm('Deseja realmente excluir {{ $user->email }} ? ')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>  

@endsection