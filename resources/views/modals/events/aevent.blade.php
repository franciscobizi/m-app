<!--ModalAEvent-->                      
          <div class="modal fade" id="aevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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