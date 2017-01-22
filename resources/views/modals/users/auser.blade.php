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