@extends('layout.app', ["current" => "perfil" ])
@section('body')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perfil do usuário
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Inicio</a></li>
        
        <li class="active">Perfil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/uploads/avatars/{{ $user->avatar }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <form enctype="multipart/form-data" action="/perfil" method="POST">
                    <label>Alterar Foto de Perfil</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary block ">
                  </form>
                  <br/>
              <br/>
              

                </li>
                
               <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                </li>

                <li class="list-group-item">
                  <b>Senha</b> <a class="pull-right">*******</a>
                </li>
                
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->

          <!-- /.box -->
        </div>


            <!-- /.box-header -->

            <!-- /.box-body -->
          </div>


    </section>
    <!-- /.content -->

@endsection