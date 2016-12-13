<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>G-MPLA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Guia turístico na palma da mão">
        <meta name="keywords" content="MPLA" />
        <!--styles-->
        <link href="{{ url('/front-end/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ url('/front-end/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ url('/front-end/css/source-style.css')}}" rel="stylesheet" type="text/css">
        <!--fonts-->
        <link href="{{ url('/front-end/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lobster:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        
        
    </head>
    <body >
        
        
        <main>
                
        <section class="section-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="break"></div>
                    </div>
                        
                </div>
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item text-muted">
                               <h4>Recuperar senha</h4>  
                            </li>
                            <li class="list-group-item text-muted">
                                <div class="form-group">
                                    @if (session('isempty'))
                                        <div class="alert alert-warning">
                                            {{ session('isempty') }}
                                        </div>
                                    @endif
                                    @if (session('noauth'))
                                        <div class="alert alert-danger">
                                            {{ session('noauth') }}
                                        </div>
                                    @endif
                                    @if (session('auth'))
                                        <div class="alert alert-success">
                                            {{ session('auth') }}
                                        </div>
                                    @endif
                                </div>
                                <form method="post" action="{{ url('/reset') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <input type="email" name="mail" class="form-control" placeholder="E-mail">
                                </div>
                                
                                               
                            </li>
                            <li class="list-group-item text-muted">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <button  class="btn btn-block">Recuperar</button>
                                         </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <a href="{{url('/')}}" style="text-decoration: none" title="Clique para voltar a pagina anterior">
                                                <button  class="btn btn-block">Pagina anterior</button>
                                            </a>
                                         </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4"></div>
                </div>
               
            </div>
        </section >
        
        <!-- jQuery -->
    <script src="{{ url('/front-end/js/jquery-1.12.2.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('/front-end/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('/front-end/js/ajax.js')}}"></script>
   
    </body>
</html>
