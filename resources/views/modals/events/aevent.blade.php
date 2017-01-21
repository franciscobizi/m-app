 <!--ModalEMilitante-->                      
          <div class="modal fade" id="addGuest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Cadastrar Militante</h4>
                </div>
                <div class="modal-body">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#add-pessoal" aria-controls="add-pessoal" role="tab" data-toggle="tab">Dados pessoais</a></li>
                          <li role="presentation"><a href="#add-endereco" aria-controls="add-endereco" role="tab" data-toggle="tab">Endereço</a></li>
                          
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="add-pessoal">
                              <form method="POST" action="{{ url('add-guest') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                              <div class="form-group">
                                    <div class="text-danger text-center" style="font-weight: bold" id="e-result">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nome" class="form-control" placeholder="Nome completo" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="birth" title="Data de nascimento" class="form-control" placeholder="Data de nascimento" required>
                                </div>
                                <div class="form-group">
                                    <select name="grau" class="form-control">
                                        <option >Grau acadêmico</option>
                                        <option value="Superior">Superior</option>
                                        <option value="Médio">Médio</option>
                                        <option value="Básico">Básico</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="func" class="form-control" placeholder="Função de trabalho" required>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file" class="form-control" title="Carrega foto do militante" placeholder="Fotografia" >
                                </div>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="add-endereco">
                              <div class="form-group">
                                    <div class="text-danger text-center" style="font-weight: bold" id="e-result">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="cidade" class="form-control" placeholder="Cidade" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="morada" class="form-control" placeholder="Morada" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="mail" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="phone" name="phone" class="form-control" placeholder="Telefone" required>
                                </div>
                          </div>
                          
                          
                        </div>

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