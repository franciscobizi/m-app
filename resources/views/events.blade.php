@extends('templates.home-template')

@section('title', 'Gestão de Actividades')
@section('content')
    
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (session('isempty'))
                        <div class="alert alert-warning">
                            {{ session('isempty') }}
                        </div>
                    @endif
                    @if (session('nosucess'))
                        <div class="alert alert-danger">
                            {{ session('nosucess') }}
                        </div>
                    @endif
                    @if (session('sucess'))
                        <div class="alert alert-success">
                            {{ session('sucess') }}
                        </div>
                    @endif
                    <h2 class="text-muted">Lista de eventos</h2>
                    <br>
                    
                    <div class="table-responsive">
                          
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Descrição</th>
                          <th>Local</th>
                          <th>Responsável</th>
                          <th>Data</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(isset($Empty))
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td >
                                    <a href="#Aevent" data-toggle="modal" title="Cadastrar"><span class="glyphicon glyphicon-plus-sign" ></span></a>
                                    <a href="#eevento" data-toggle="modal" title="Editar"><span class="glyphicon glyphicon-edit" ></span></a>
                                    <a href="#devento" data-toggle="modal" title="Deletar"><span class="glyphicon glyphicon-trash" ></span></a>
                                </td>
                            </tr>
                        @else
                    
                            @foreach($event as $events)
                            <tr style="background-color: #FFF">
                                <td>{{$events['id']}}</td>
                                <td>{{$events['description']}}</td>
                                <td>{{$events['local']}}</td>
                                <td>{{$events['locutor']}}</td>
                                <td>{{$events['temp']}}</td>
                                <td >
                                    <a href="#Aevent" data-toggle="modal" title="Cadastrar"><span class="glyphicon glyphicon-plus-sign" ></span></a>
                                    <a href="#eevento" data-toggle="modal" title="Editar"><span class="glyphicon glyphicon-edit" ></span></a>
                                    <a href="#devento" data-toggle="modal" title="Deletar"><span class="glyphicon glyphicon-trash" ></span></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif  
                        </form> 

                      </tbody>
                    </table>
 
                    </div>
                    
                </div>
                
            </div>
        </div>  
    
@endsection
 