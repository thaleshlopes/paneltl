@extends('layout.app', ["current" => "gravador" ])

@section('body')
      
    <section class="content-header">
      <h1>
        Gravações
        <small>.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href="/gravador"></a>Gravações</li>
      </ol>
    </section>

   
    <section class="content container-fluid">
      
        <div class="box">
          <div class="box-header with-border">
            <div class="box-body">

               <form action="{{ route('gravador.store') }}" class="needs-validation" method="POST" novalidate>
                 {!! csrf_field() !!}
                 <div class="form-row">
                  <div class="col-md-2 mb-3">
                    <label for="validationCustom01">Data </label>
                    <input type="date" class="form-control" id="" name="datainicial" placeholder="" value="" required>
                    <div class="valid-feedback">
        
                    </div>
                  </div>

                 </div>

                  <div class="form-row">

                    
                    <div class="col-md-2 mb-3">
                      <label for="validationCustom03">Estado</label>
                      <select class="form-control" name="estado" required>
                        <option value="">Todos</option>
                        <option value="ANSWERED">Atendidas</option>
                        <option value="BUSY">Ocupado</option>
                        <option value="NO ANSWER">Não Atendidas</option>
                      </select>
                    </div>

                    <div class="col-md-2 mb-3">
                      <label for="">Campo</label>
                      <select class="form-control" name="campo" required>
                        <option value="">Todos</option>
                        <option value="src">Origem</option>
                        <option value="dst">Destino</option>
                      </select>
                    </div>

                    <div class="col-md-2   mb-3">
                      <label for="">Número</label>
                      <input type="text" class="form-control" id="" name="numero" placeholder="" value="" required>
                    </div>

                    <div class="col-md-2 mb-3">
                    <br/>  
                      <button class="btn btn-primary" type="submit">Pesqueisar</button>  
                    </div>
      </div>
</form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
             <!-- <table id="example1" class="table table-bordered table-striped"> -->
                <thead>
                <tr>
                  <th class="text-center">Data</th>
                  <th class="text-center">Origem</th>
                  <th class="text-center">Destino</th>
                  <th class="text-center">Duração</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Mensagem</th>
                  
                 
                  <!-- <th>Ações</th> -->
                </tr>
                </thead>
                <tbody>
                  @foreach($tarifa as $tarifas)
                  <tr>
                    <td class="text-center">{{date('d/m/Y - H:i:s', strtotime($tarifas->calldate ))}}</td>
                    <td class="text-center">{{$tarifas->src }}</td>
                    <td class="text-center">{{$tarifas->dst }}</td>
                    <td class="text-center">{{gmdate('H:i:s', $tarifas->duration) }}</td>
                    <td class="text-center">
<!--                        @if(strlen($tarifas->src) == (strlen($tarifas->src))) <span class="label label-success">Atendida</span>@endif -->
                        @if($tarifas->disposition=="ANSWERED") <span class="label label-success">Atendida</span> @endif
                        @if($tarifas->disposition=="BUSY") <span class="label label-warning">Ocupado</span> @endif
                        @if($tarifas->disposition=="NO ANSWER") <span class="label label-danger">Não Atendida</span> @endif</td>
                                       
                    <td class="text-center">

                      @if($tarifas->userfield)
                      <a onclick="window.open('{{$tarifas->userfield}}');" href="" class="btn btn-primary btn-xs">Ouvir</a>
                      @endif

                    </td>
                </tr>
                 @endforeach
                </tbody>
            <!--    <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
              </table>
                @if (isset($data))
                {!! $tarifa->appends($data)->links() !!}
              @else
                {!! $tarifa->links() !!}
              @endif
            </div>
            <!-- /.box-body -->
          </div>

    </section>
@endsection

