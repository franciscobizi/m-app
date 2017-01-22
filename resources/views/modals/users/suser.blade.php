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