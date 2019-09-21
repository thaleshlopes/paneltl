@extends('layout.app', ["current" => "inicio" ])

@section('body')
	    


<section class="content">
  
      <div class="row" id="extensions">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
        
        @foreach($dados as $dado)
      

        @if($dado['status']	 == 'UNKNOWN') 
        
        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$dado['RAMAL']}}</h3>

              <p>Offline</p>
            </div>
            <div class="icon">
              <i class="fa fa-microphone-slash"></i>
            </div>
            <a href="#" class="small-box-footer">Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          @endif

          @if( $dado['status'] == "UNREACHABLE") 
        
        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$dado['RAMAL']}}</h3>

              <p>Offline</p>
            </div>
            <div class="icon">
              <i class="fa fa-microphone-slash"></i>
            </div>
            <a href="#" class="small-box-footer">Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          @endif

        @if($dado['status'] == "OK") 
        
        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$dado['RAMAL']}}</h3>

              <p>Online</p>
            </div>
            <div class="icon">
              <i class="fa fa-microphone-slash"></i>
            </div>
            <a href="#" class="small-box-footer">Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          @endif



          @endforeach

          
     


        </div>
        </div>



</section>
   


@endsection