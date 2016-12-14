@extends('templates.home-template')

@section('title', 'Gestão de Actividades')
@section('content')
    
    
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('all-users')}}">
                    <span class="fa-stack fa-4x" id="girar">
                            <i class="fa fa-circle fa-stack-2x iten-color"></i>
                            <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <h4 class="text-muted">Usuários</h4>
                </div>
                
                <div class="col-md-6">
                    <a href='{{route('all-militants')}}'>
                    <span class="fa-stack fa-4x" id="girar">
                            <i class="fa fa-circle fa-stack-2x iten-color"></i>
                            <i class="fa fa-users fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <h4 class="text-muted">Militantes</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href='{{url('eventos')}}'>
                    <span class="fa-stack fa-4x" id="girar">
                            <i class="fa fa-circle fa-stack-2x iten-color"></i>
                            <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <h4 class="text-muted">Agenda </h4>
                </div>
                <!--div class="col-md-4">
                    <a href='#'>
                    <span class="fa-stack fa-4x" id="girar">
                            <i class="fa fa-circle fa-stack-2x iten-color"></i>
                            <i class="fa fa-newspaper-o fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <h4 class="text-muted">Em destaque</h4>
                </div-->
                
                <div class="col-md-6">
                    <a href="#relatorio" data-toggle="modal">
                    <span class="fa-stack fa-4x" id="girar">
                            <i class="fa fa-circle fa-stack-2x iten-color"></i>
                            <i class="fa fa-signal fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <h4 class="text-muted">Relatórios</h4>
                </div>
                <!--div class="col-md-4">
                    <a href='#'>
                    <span class="fa-stack fa-4x" id="girar">
                            <i class="fa fa-circle fa-stack-2x iten-color"></i>
                            <i class="fa fa-picture-o fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <h4 class="text-muted">Galeria</h4>
                </div-->
            </div>
        </div>  
    
@endsection
 