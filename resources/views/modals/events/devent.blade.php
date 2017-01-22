<!--ModalDEvento-->                      
          <div class="modal fade" id="deleteEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Deletar evento</h4>
                </div>
                <div class="modal-body">
                                        
                    <h4 class="text-center text-muted">Tem a certeza que pretende deletar o evento?</h4>            
                    <form method="post" action="{{ url('delete-event') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="eid" id="eid" >
                </div>
                <div class="modal-footer">
                       
                    <button id="e-btn" class="btn btn-primary">Deletar</button>
                    </form>
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                </div>
              </div>
            </div>
          </div>