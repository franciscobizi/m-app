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
        <link href="{{ url('/front-end/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('/front-end/css/source-style.css') }}" rel="stylesheet" type="text/css">
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
    <body>
        
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
        <form class="navbar-form navbar-left" role="search" method="post" action="{{ url('search') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">      
            <div class="form-group  has-feedback">  
            <input type="text" class="form-control placeholder" name="search" placeholder="Por número de telefone">
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
          <!--UsersModels-->
          @include('modals.users.auser')
          @include('modals.users.suser')
          <!--EndOfUsersModels-->
          <!--GuestModels-->
          @include('modals.guests.eguest')
          @include('modals.guests.aguest')
          @include('modals.guests.dguest')
          <!--EndOfGuestModels-->
          <!--EventsModels-->
          @include('modals.events.devent')
          @include('modals.events.aevent')
          @include('modals.events.eevent')
          <!--EndOfEventsModels-->

         
         
          <!--ModalNotifications-->                      
          <div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Notificação</h4>
                </div>
                <div class="modal-body">
                   @if( $noth == 0 )
                        <h4 class="text-center text-muted">Nenhuma notificação</h4>
                   @else
                    <div class="table-responsive">
                        <h4 class="text-center text-muted">Eventos em eminência</h4>  
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Descrição</th>
                          <th>Local</th>
                          <th>Responsável</th>
                          <th>Data</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($listN as $events)
                            <tr style="background-color: #FFF">
                                <td>{{$events['description']}}</td>
                                <td>{{$events['local']}}</td>
                                <td>{{$events['locutor']}}</td>
                                <td>{{$events['temp']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                       </table>
                   @endif
                    </div>             
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

//Edit and Delete Events
$('#eventModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var description = button.data('desc'); // Extract info from data-* attributes
  var rnome = button.data('nome');
  var local = button.data('local');
  var hora = button.data('temp');
  
  var modal = $(this);
  modal.find('#desc').val(description);
  modal.find('#nome').val(rnome);
  modal.find('#local').val(local);
  modal.find('#hora').val(hora);
  
});
    
$('#deleteEventModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var ide = button.data('ide');
  
  var modal = $(this);
  modal.find('#eid').val(ide);
  
});
</script>
   
    </body>
</html>
