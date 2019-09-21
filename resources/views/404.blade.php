@extends('layout.app', ["current" => "404" ])

@section('body')    
    <section class="content-header">

      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <br/>
        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Acesso Negado.</h3>

          <p>
            Você não tem permissão para acessar está página.
            Por favor, volte para o <a href="/">inicio</a> ou entre em contato com o fornecedor.
          </p>


        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    @endsection