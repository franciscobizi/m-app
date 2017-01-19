
          <!--ModalEMilitante-->                      
          <div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Editar Militante</h4>
                </div>
                <div class="modal-body">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#pessoal" aria-controls="home" role="tab" data-toggle="tab">Dados pessoais</a></li>
                          <li role="presentation"><a href="#endereco" aria-controls="mensal" role="tab" data-toggle="tab">Endereço</a></li>
                          <li role="presentation"><a href="#cotas" aria-controls="anual" role="tab" data-toggle="tab">Status</a></li>
                          
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="pessoal">
                              <div class="row">
                              <div class="col-md-8"> 
                              <form method="post" action="{{ route('edit-guest')}}" >
                              {!! csrf_field() !!}
                              <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                              <div class="form-group">
                                    <div class="text-danger text-center" style="font-weight: bold" id="e-result">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="nome" class="form-control" placeholder="Nome completo" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="bi" title="Data de nascimento" class="form-control" placeholder="Data de nascimento" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="grau" class="form-control" placeholder="Grau acadêmico" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="grole" class="form-control" placeholder="Função" required>
                                </div>
                                <div class="form-group">
                                    <input type="file" id="file" class="form-control" title="Carrega foto do militante" placeholder="Fotografia" >
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group"></div>
                                <img src="{{asset('/front-end/img/bg.jpg')}}" class="img-rounded img-responsive" title="[foto do militante]" alt="[foto-militante]">
                            </div>
                            </div>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="endereco">
                             
                                <div class="form-group">
                                    <div class="text-danger text-center" style="font-weight: bold" id="e-result">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="city" class="form-control" placeholder="Cidade" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="morada" class="form-control" placeholder="Morada" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="mail" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="phone" id="fone" class="form-control" placeholder="Telefone" required>
                                </div>
                            
                          </div>
                          <div role="tabpanel" class="tab-pane" id="cotas">
                                <div class="form-group"></div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="gstatus" disabled="">
                                </div>
                          </div>
                            
                        </div>

                    </div>         
                             
                </div>
                <div class="modal-footer">
                    <button id="e-btn" class="btn btn-primary">Guardar</button>
                    </form>
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                </div>
              </div>
            </div>
          </div>
          <!--Fim do modal-->