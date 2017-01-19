@if(!session('person'))
    <script>window.location="{{ url('/') }}";</script>
@endif 

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GMPLA - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Guia turístico na palma da mão">
        <meta name="keywords" content="MPLA" />
        <!--styles-->
        <link href="{{ url('/front-end/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/front-end/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/front-end/css/source-style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/front-end/css/stylesheet.css') }}" rel="stylesheet" type="text/css">
        <!--fonts-->
        <link href="{{ url('/front-end/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lobster:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <script src="{{ url('/front-end/js/jquery-1.12.2.min.js') }}"></script>
        
        
    </head>
    <body style="background-color: #EEE">
        
        <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('user-profile') }}">G-MPLA</a>
        </div>
        <form class="navbar-form navbar-left" role="search" method="post" action="{{ url('militantes') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">      
            <div class="form-group  has-feedback">  
            <input type="text" class="form-control placeholder" name="msearch" placeholder="Nome, telefone, cartão...">
            <a><span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span></a>
            </div>
                  
        </form>
        <div id="navbar" class="navbar-collapse collapse pull-right">
          <ul class="nav navbar-nav">
              <li><a href="#notification" data-toggle="modal" ><i class='glyphicon glyphicon-bell'></i> Notificações <span class="badge">{{ $noth }}</span></a></li>
            <li><a href="#ajuda" data-toggle="modal" ><i class='glyphicon glyphicon-question-sign'></i> Ajuda</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='glyphicon glyphicon-user'></i> {{$name}} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#perfil" data-toggle="modal" ><i class='glyphicon glyphicon-edit'></i> Editar perfil</a></li>
                
                <li role="separator" class="divider"></li>
                
                <li><a href="{{url('/logout')}}"><i class='glyphicon glyphicon-log-out'></i> Sair</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div style="padding-top: 150px;"></div>
    <main>
              @yield('content')
    </main>
    
       <!--This the section of Modals-->
       
          <div class="modal fade" id="ajuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Ajuda</h4>
                </div>
                <div class="modal-body">
                 <h4>Usuários</h4>
                 <p>
                     Item que da acesso ao gerenciamento dos usuários do sistema. Nele existem funcionalidades de adicionar, editar e deletar os usuários.
                 </p>
                 <h4>Agenda das actividades</h4>
                 <p>
                     Item que da acesso ao gerenciamento das actividades do partido. Nele existem funcionalidades de adicionar, editar e deletar as agendas das actividades.
                 </p>
                 <h4>Militantes</h4>
                 <p>
                     Item que da acesso ao gerenciamento dos militantes do partido. Nele existem funcionalidades de adicionar, editar e deletar os militantes.
                 </p>
                 <!--h4>Em destaque</h4>
                 <p>
                     Item que da acesso ao gerenciamento dos comunicados do partido. Nele existem funcionalidades de adicionar, editar e deletar as notícias em destaques.
                 </p>             
                 <h4>Galeria</h4>
                 <p>
                     Item que da acesso ao gerenciamento da galeria do partido. Nele existem funcionalidades de adicionar, editar e deletar as imagens.
                 </p-->
                 <h4>Relatórios</h4>
                 <p>
                     Item que da acesso ao gerenciamento dos relatórios do partido. Nele existem funcionalidades de gerar relatórios.
                 </p>
                  
                            
                </div>
                <div class="modal-footer">
                        
                    
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Fechar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--ModalEPerfil-->                      
          <div class="modal fade" id="perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Editar perfil</h4>
                </div>
                <div class="modal-body">
                                        
                               <div class="form-group">
                                    <div class="text-danger text-center" style="font-weight: bold" id="e-result">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="user" class="form-control" placeholder="Nome" value="{{$name}}" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="mail" class="form-control" placeholder="E-mail" value="{{$person}}" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="pass" class="form-control" placeholder="Senha" value="{{$pass}}" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="funcao" class="form-control" placeholder="Função" value="{{$rule}}" required>
                                </div>
                                
                </div>
                <div class="modal-footer">
                        <button id="e-btn" class="btn btn-primary">Guardar</button>
                    
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->
          <!--GuestModels-->
          @include('modals.guests.eguest')
          @include('modals.guests.aguest')
          @include('modals.guests.dguest')
          <!--EndOfGuestModels-->

          
          <!--ModalAEvent-->                      
          <div class="modal fade" id="Aevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Cadastrar evento</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('add-events') }}">
                        {!! csrf_field() !!}
                               <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">                   
                               <div class="form-group">
                                    <div class="text-danger text-center" style="font-weight: bold" id="e-result">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="desc" class="form-control" placeholder="Descrição" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="locutor" class="form-control" placeholder="Responsável" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="local" class="form-control" placeholder="Local do evento" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="uid" value="{{session('id')}}" class="form-control"  required>
                                    <input type="datetime-local" name="tempo" title="Hora do evento" class="form-control" placeholder="Horás" required>
                                </div>
                                
                </div>
                <div class="modal-footer">
                        <button id="add-Event" class="btn btn-primary">Cadastrar</button>
                    </form>
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->
          <!--ModalEEvent-->                      
          <div class="modal fade" id="eevento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Editar evento</h4>
                </div>
                <div class="modal-body">
                                        
                               <div class="form-group">
                                    <div class="text-danger text-center" style="font-weight: bold" id="e-result">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="desc" class="form-control" placeholder="Descrição" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="resp" class="form-control" placeholder="Responsável" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="local" class="form-control" placeholder="Local do evento" required>
                                </div>
                                <div class="form-group">
                                    <input type="time" name="tempo" title="Hora do evento" class="form-control" placeholder="Horás" required>
                                </div>
                                
                </div>
                <div class="modal-footer">
                        <button id="e-btn" class="btn btn-primary">Guardar</button>
                    
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->

          <!--ModalAUsers-->                      
          <div class="modal fade" id="Ausers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Cadastrar usuário</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('signup-user') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">           
                        <div class="form-group">
                            <input type="text" name="nome" class="form-control" placeholder="Nome" >
                        </div>
                        <div class="form-group">
                            <input type="email" name="mail" class="form-control" placeholder="E-mail" >
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" placeholder="Senha" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="funcao" class="form-control" placeholder="Função" >
                        </div>
                               
                </div>
                <div class="modal-footer">
                        <button id="e-btn" class="btn btn-primary">Cadastrar</button>
                    </form>
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->
          <!--ModalEUsers-->                      
          <div class="modal fade" id="eusers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Editar usuário</h4>
                </div>
                <div class="modal-body">
                                        
                               <div class="form-group">
                                    <div class="text-danger text-center" style="font-weight: bold" id="e-result">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="nome" class="form-control" placeholder="Nome" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="mail" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="pass" class="form-control" placeholder="Senha" required>
                                </div>
                                <div class="form-group">
                                    <input type="phone" id="phone" class="form-control" placeholder="Telefone" required>
                                </div>
                                
                </div>
                <div class="modal-footer">
                        <button id="e-btn" class="btn btn-primary">Guardar</button>
                    
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->

          
          <!--ModalRelatorios-->                      
          <div class="modal fade" id="relatorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Relatórios</h4>
                </div>
                <div class="modal-body">
                                        
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Semanal</a></li>
                          <li role="presentation"><a href="#mensal" aria-controls="mensal" role="tab" data-toggle="tab">Mensal</a></li>
                          <li role="presentation"><a href="#anual" aria-controls="anual" role="tab" data-toggle="tab">Anual</a></li>
                          
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="home">
                              <h4 class="text-muted text-center">
                               Relatório semanal
                              </h4>
                              <div id="pieChart" class="chart"></div>
                                    
                              
                          </div>
                          <div role="tabpanel" class="tab-pane" id="mensal">
                              <h4 class="text-muted text-center"> 
                               Relatório mensal
                              </h4>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="anual">
                              <h4 class="text-muted text-center"> 
                               Relatório anual
                              </h4>
                          </div>
                          
                        </div>

                    </div>         
                                
                </div>
                <div class="modal-footer">
                    
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->
          <!--ModalNotifications-->                      
          <div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Notificação</h4>
                </div>
                <div class="modal-body">
                   
                   <h4 class="text-center text-muted">Nenhuma notificação</h4>
                                
                </div>
                <div class="modal-footer">
                       
                    
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Fechar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->
          
          <!--ModalDUsers-->                      
          <div class="modal fade" id="D" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="control-label">Recipient:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="control-label">Message:</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Send message</button>
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->
          
          <!--Fim do modal-->
          <!--ModalDEvento-->                      
          <div class="modal fade" id="devento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Deletar evento</h4>
                </div>
                <div class="modal-body">
                                        
                    <h4 class="text-center text-muted">Tens certeza de que pretendes deletar?</h4>            
                                
                </div>
                <div class="modal-footer">
                       
                    <button id="e-btn" class="btn btn-primary">Deletar</button>
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->
          <!-- jQuery -->
    
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script-->
    <script src="{{ url('/front-end/js/ajax.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('/front-end/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/front-end/js/chart.js') }}"></script>
    
   
    <script type="text/javascript">
        //Verify data
$('#guestModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var description = button.data('title'); // Extract info from data-* attributes
  var bi = button.data('bi');
  var mail = button.data('mail');
  var fone = button.data('fone');
  var grau = button.data('grau');
  var city = button.data('city');
  var grole = button.data('grole');
  var morada = button.data('morada');
  var gstatus = button.data('status');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text("Editar dados do Sr(a) " + description);
  modal.find('#nome').val(description);
  modal.find('#bi').val(bi);
  modal.find('#mail').val(mail);
  modal.find('#fone').val(fone);
  modal.find('#grau').val(grau);
  modal.find('#city').val(city);
  modal.find('#grole').val(grole);
  modal.find('#morada').val(morada);
  modal.find('#gstatus').val(gstatus);
  
});
    
$('#deleteGuestModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); 
  var description = button.data('title');
  var id = button.data('id');
  
  var modal = $(this);
  modal.find('#guest-name').text("Tens certeza de que pretendes deletar o(a) Sr(a) " + description + "?");
  modal.find('#gid').val(id);
  
});
</script>
   
    </body>
</html>
