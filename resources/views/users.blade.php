@extends('templates.home-template')
@section('title', 'Gestão de Actividades')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-muted">Lista de usuários</h2>
                    <br>
                    <div class="table-responsive">       
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Telefone</th>
                          <th>Cadastrado</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <td>{{$usuarios['id']}}</td>
                                <td>{{$usuarios['name']}}</td>
                                <td>{{$usuarios['email']}}</td>
                                <td>{{$usuarios['fone']}}</td>
                                <td>{{$usuarios['created_at']}}</td>
                                <td >
                                    <a href="#Ausers" data-toggle="modal" title="Adicionar"><span class="glyphicon glyphicon-plus-sign" ></span></a>
                                    <a href="#eusers" data-toggle="modal" title="Editar"><span class="glyphicon glyphicon-edit" ></span></a>
                                    <a href="#dusers" data-toggle="modal" title="Deletar"><span class="glyphicon glyphicon-trash" ></span></a>
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
 