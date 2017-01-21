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
                    <h2 class="text-muted">Relatórios do partido</h2>
                    <br>
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#diario" aria-controls="diario" role="tab" data-toggle="tab">Diário</a></li>
                          <li role="presentation"><a href="#semanal" aria-controls="semanal" role="tab" data-toggle="tab">Semanal</a></li>
                          <li role="presentation"><a href="#mensal" aria-controls="mensal" role="tab" data-toggle="tab">Mensal</a></li>
                          <li role="presentation"><a href="#anual" aria-controls="anual" role="tab" data-toggle="tab">Anual</a></li>
                          
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" style=" background-color: #FFF">
                          <div role="tabpanel" class="tab-pane active" id="diario">
                                <div class="break"></div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="background-color: #196c4b; padding: 20px; width: 37%; font-weight: bold; margin-left: auto; margin-right: auto;"> 
                                            <h3>
                                                {{ $users_r['d'] }}
                                            </h3>
                                        </div>

                                        <h3 class="text-center">Usuarios</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #1b6d85; padding: 20px; width: 37%;  margin-left: auto; margin-right: auto; font-weight: bold;">
                                            <h3>
                                                {{ $guest_r['d'] }}
                                            </h3>
                                        </div>
                                        <h3 class="text-center">Militantes</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #b92c28; padding: 20px; width: 37%; margin-left: auto; margin-right: auto; font-weight: bold;">
                                            <h3> 
                                                {{ $event_r['d'] }}
                                            </h3>
                                        </div>
                                        <h3 class="text-center">Eventos</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #e38d13; padding: 20px; width: 37%; margin-left: auto; margin-right: auto; font-weight: bold;"> <h3>28</h3></div>
                                        <h3 class="text-center">Cotas</h3>
                                    </div>
                                </div>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="semanal">
                                <div class="break"></div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #196c4b; padding: 20px; width: 37%; margin-left: auto; margin-right: auto; font-weight: bold;">
                                            <h3>
                                                {{ $users_r['s'] }}
                                            </h3>
                                        </div>

                                        <h3 class="text-center">Usuarios</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #1b6d85; padding: 20px; width: 37%;  margin-left: auto; margin-right: auto; font-weight: bold;">
                                            <h3>
                                                {{ $guest_r['s'] }}
                                            </h3>
                                        </div>
                                        <h3 class="text-center">Militantes</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #b92c28; padding: 20px; width: 37%; margin-left: auto; margin-right: auto; font-weight: bold;">
                                            <h3>
                                                {{ $event_r['s'] }}
                                            </h3>
                                        </div>
                                        <h3 class="text-center">Eventos</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #e38d13; padding: 20px; width: 37%; margin-left: auto; margin-right: auto; font-weight: bold;"> <h3>58</h3></div>
                                        <h3 class="text-center">Cotas</h3>
                                    </div>
                                </div>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="mensal">
                                <div class="break"></div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="background-color: #196c4b; padding: 20px; width: 37%; margin-left: auto; margin-right: auto;">
                                            <h3>
                                                {{ $users_r['m'] }}
                                            </h3>
                                        </div>

                                        <h3 class="text-center">Usuarios</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #1b6d85; padding: 20px; width: 37%;  margin-left: auto; margin-right: auto; font-weight: bold;">
                                            <h3>
                                                {{ $guest_r['m'] }}
                                            </h3>
                                        </div>
                                        <h3 class="text-center">Militantes</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #b92c28; padding: 20px; width: 37%; margin-left: auto; margin-right: auto; font-weight: bold;">
                                            <h3>
                                                {{ $event_r['m'] }}
                                            </h3>
                                        </div>
                                        <h3 class="text-center">Eventos</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-circle text-center" style="background-color: #e38d13; padding: 20px; width: 37%; margin-left: auto; margin-right: auto; font-weight: bold;"> <h3>81</h3></div>
                                        <h3 class="text-center">Cotas</h3>
                                    </div>
                                </div>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="anual">
                              <div class="break"></div>
                              <div class="row">
                                  <div class="col-md-3">
                                      <div class="img-circle text-center" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="background-color: #196c4b; padding: 20px; width: 37%; font-weight: bold; margin-left: auto; margin-right: auto;">
                                          <h3>
                                                {{ $users_r['a'] }}
                                            </h3>
                                      </div>
                                      
                                      <h3 class="text-center">Usuarios</h3>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="img-circle text-center" style="background-color: #1b6d85; padding: 20px; width: 37%;  margin-left: auto; margin-right: auto; font-weight: bold;">
                                            <h3>
                                                {{ $guest_r['a'] }}
                                            </h3>
                                      </div>
                                      <h3 class="text-center">Militantes</h3>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="img-circle text-center" style="background-color: #b92c28; padding: 20px; width: 37%; margin-left: auto; margin-right: auto; font-weight: bold;">
                                            <h3>
                                                {{ $event_r['a'] }}
                                            </h3>
                                      </div>
                                      <h3 class="text-center">Eventos</h3>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="img-circle text-center" style="background-color: #e38d13; padding: 20px; width: 37%; margin-left: auto; margin-right: auto; "> <h3>78</h3></div>
                                      <h3 class="text-center">Cotas</h3>
                                  </div>
                              </div>
                          </div>
                          
                        </div>

                          
                    
                    
                </div>                
            </div>
        </div>
@endsection
 