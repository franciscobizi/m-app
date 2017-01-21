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
                    @if (session('isuser'))
                        <div class="alert alert-danger">
                            {{ session('isuser') }}
                        </div>
                    @endif
                    @if (session('nuser'))
                        <div class="alert alert-success">
                            {{ session('nuser') }}
                        </div>
                    @endif
                    <h2 class="text-muted">Lista de usuários</h2>
                    <br>
                    <div class="table-responsive" >       
                        <table class="table table-condensed">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nome</th>
                              <th>E-mail</th>
                              <th>Função</th>
                              <th>Cadastrado</th>
                              <th>Acção</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($usuario as $usuarios)
                                <tr style="background-color: #FFF">
                                    <td>{{$usuarios['id']}}</td>
                                    <td>{{$usuarios['name']}}</td>
                                    <td>{{$usuarios['email']}}</td>
                                    <td>{{$usuarios['roles']}}</td>
                                    <td>{{$usuarios['created_at']}}</td>
                                    <form>
                                    <td >
                                        <a href="#Ausers" data-toggle="modal" title="Adicionar"><span class="glyphicon glyphicon-plus-sign" ></span></a>
                                    </td>
                                    </form>
                                </tr>
                          @endforeach

                          </tbody>
                        </table>
                    </div>
                    
                </div>                
            </div>
        </div>
@endsection
 