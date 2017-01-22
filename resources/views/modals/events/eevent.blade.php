<!--ModalEEvent-->                      
          <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Editar evento</h4>
                </div>
                <div class="modal-body">
                               <div class="form-group">
                                    <input type="text" name="desc" id="desc" class="form-control" placeholder="Descrição" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Responsável" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="local" id="local" class="form-control" placeholder="Local do evento" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="hora" id="hora" class="form-control" placeholder="Horás" required>
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