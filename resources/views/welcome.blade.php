<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>G-MPLA : Software de gestão</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Gestão de actividades">
        <meta name="keywords" content="MPLA" />
        <!--styles-->
        <link href="front-end/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="front-end/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="front-end/css/source-style.css" rel="stylesheet" type="text/css">
        <!--fonts-->
        <link href="front-end/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lobster:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
     
    </head>
    <body >
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="text-center text-muted">MPLA - Paz, Trabalho e Liberdade</h1>
                        <div class="break"></div>
                    </div>        
                </div>
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item text-muted">
                               <h4>Autenticação</h4>  
                            </li>
                            <li class="list-group-item text-muted">
                                <div class="form-group">
                                    @if( isset($empty))
                                    <div class="text-danger text-center" style="font-weight: bold" >
                                        {{ $empty }}
                                    </div>
                                    @endif
                                    
                                    @if( isset($notfound))
                                    <div class="text-warning text-center" style="font-weight: bold" >
                                        {{ $notfound }}
                                    </div>
                                    @endif
                                    
                                </div>
                                <form method="post" action="{{ url('/autorization') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <input type="email" name="mail" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" placeholder="Senha" required>
                                </div>
                                
                                <div class="form-group">
                                    <h5>Esqueçeu a sua senha? <a href="{{ url('/reset')}} ">Link de recuperação</a></h5>
                                </div>
                                                
                            </li>
                            <li class="list-group-item text-muted">
                               <div class="form-group">
                                    <button  class="btn btn-block">Entrar</button>
                                </div>  
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4"></div>
                </div>
                
            </div>
        </section >

        <!-- jQuery -->
        <script src="front-end/js/jquery-1.12.2.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="front-end/js/bootstrap.min.js"></script>
        <script src="front-end/js/ajax.js"></script>
   
    </body>
</html>
