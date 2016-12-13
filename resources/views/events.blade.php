@extends('templates.home-template')

@section('title', 'Gestão de Actividades')
@section('content')
    
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                          
                        
                            <tr>
                                <td>{{$events['id']}}</td>
                                <td>{{$events['desc']}}</td>
                                <td>{{$events['local']}}</td>
                                <td>{{$events['resp']}}</td>
                                <td>{{$events['data']}}</td>
                                <td >
                                    <a href="#Aevent" data-toggle="modal" title="Cadastrar"><span class="glyphicon glyphicon-plus-sign" ></span></a>
                                    <a href="#eevento" data-toggle="modal" title="Editar"><span class="glyphicon glyphicon-edit" ></span></a>
                                    <a href="#devento" data-toggle="modal" title="Deletar"><span class="glyphicon glyphicon-trash" ></span></a>
                                </td>
                            </tr>
                            
                        </form> 

                      </tbody>
                    </table>
 
                    </div>
                    
                </div>
                
            </div>
        </div>  
    
@endsection
 