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
                    @if (session('duser'))
                        <div class="alert alert-success">
                            {{ session('duser') }}
                        </div>
                    @endif
                    <h2 class="text-muted">Lista de militantes do Partido</h2>
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
                        @if(isset($search))
                            <tr>
                                <td>{{$usuarios['id']}}</td>
                                <td>{{$usuarios['name']}}</td>
                                <td>{{$usuarios['email']}}</td>
                                <td>{{$usuarios['fone']}}</td>
                                <td>{{$usuarios['created_at']}}</td>
                                <td >
                                    <a href="#Amilitante" data-toggle="modal" title="Cadastrar"><span class="glyphicon glyphicon-plus-sign" ></span></a>
                                    <a href="#emilitante" data-toggle="modal" title="Editar"><span class="glyphicon glyphicon-edit" ></span></a>
                                    <a href="#dmilitante" data-toggle="modal" title="Deletar"><span class="glyphicon glyphicon-trash" ></span></a>
                                    <a href="#" title="Ficha completa"><span class="glyphicon glyphicon-print" ></span></a>
                                </td>
                            </tr>
                        @else
                        @foreach($guests as $usuarios)
                            <tr>
                                <td>{{$usuarios['id']}}</td>
                                <td>{{$usuarios['name']}}</td>
                                <td>{{$usuarios['email']}}</td>
                                <td>{{$usuarios['phone']}}</td>
                                <td>{{$usuarios['created_at']}}</td>
                                <td >
                                    <a href="#addGuest" data-toggle="modal" title="Cadastrar"><span class="glyphicon glyphicon-plus-sign" ></span></a>
                                    <button type="button" data-target="#guestModal" data-toggle="modal"  role="button" title="Editar" style=" background-color: transparent; border-style: none;" data-title="{{$usuarios['name']}}" data-grole="{{$usuarios['grole']}}" data-nome="{{$usuarios['name']}}" data-bi="{{$usuarios['birth']}}" data-status="{{$usuarios['status']}}" data-mail="{{$usuarios['email']}}" data-city="{{$usuarios['city']}}" data-fone="{{$usuarios['phone']}}" data-grau="{{$usuarios['grau']}}" data-morada="{{$usuarios['adress']}}"><span class="glyphicon glyphicon-edit" ></span></button>
                                    <button type="button" data-target="#deleteGuestModal" data-toggle="modal"  role="button" style=" background-color: transparent; border-style: none;" data-title="{{$usuarios['name']}}" data-id="{{$usuarios['id']}}" title="Deletar"><span class="glyphicon glyphicon-trash" ></span></button>
                                    
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
 