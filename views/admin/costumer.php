<? require_once VIEW . 'snippets/header.php'; ?>

<body class="sidebar-mini sidebar-collapse">

     <? require_once __DIR__ . '/../snippets/topbar.php'; ?>
     <? require_once __DIR__ . '/../snippets/sidebar-admin.php'; ?>


     <div class="content-wrapper">


          <div class="row">
               <div class="col-md-12 pTitle">
                    Representantes
               </div>
          </div>

          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              Tabela Representantes
                         </div>
                         <div class="card-body">
                              <div class="row mb-3">
                                   <div class="col-md-12">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-register" data-toggle="modal" data-target="#costumerRegister">
                                             Cadastrar Representante
                                        </button>
                                   </div>
                              </div>

                              <? if ((isset($eCode)) || isset($status) && isset($message)) { ?>
                                   <div class="alert alert-<?= $status; ?> alert-dismissible fade show" role="alert">
                                        <h4><?= "$icon $title" ?></h4>
                                        <p>
                                             <?= $message ?>
                                        </p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                                        </button>
                                   </div>
                              <? } ?>

                              <div class="row">
                                   <div class="col-md-12">
                                        <table class="table table-dark">
                                             <thead>
                                                  <th>Nome</th>
                                                  <th>CPF/CNPJ</th>
                                                  <th>
                                                       <center>Ações</center>
                                                  </th>
                                             </thead>
                                             <tbody>
                                                  <? if (isset($costumers)) { ?>
                                                       <? foreach ($costumers as $costumer) { ?>
                                                            <tr>
                                                                 <td><?= $costumer['name'] . " " . $costumer['surname']; ?></td>
                                                                 <td><?= $costumer['cpf/cnpj'] ?></td>
                                                                 <td>
                                                                      <center>
                                                                           <div class="btn-group">
                                                                                <a class="btn btn-info" href="/admin/cliente/editar?id=<?= $costumer['id'] ?>">
                                                                                     <i class="fa-solid fa-user-pen"></i>
                                                                                </a>
                                                                                <a class="btn btn-danger" href="/admin/cliente/excluir?id=<?= $costumer['id'] ?>">
                                                                                     <i class="fa-solid fa-circle-xmark"></i>
                                                                                </a>
                                                                           </div>
                                                                      </center>
                                                                 </td>
                                                            </tr>
                                                  <? }
                                                  } ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>


     </div>


     <!-- Modal -->
     <div class="modal fade" id="costumerRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
               <div class="modal-content">
                    <div class="modal-header pTitle">
                         <h5 class="modal-title" id="exampleModalLabel">Cadastrar Representantes</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">

                         <form method="POST" action="/admin/cliente/criar">
                              <h5>Informações Gerais:</h5>
                              <div class="input-group mb-3">
                                   <div class="input-group mb-3">
                                        <div class="col-md-6 mb-3">
                                             <input type="text" name="name" class="form-control form-custom" placeholder="Nome" required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <input type="text" name="surname" class="form-control form-custom" placeholder="Sobrenome" required />
                                        </div>
                                   </div>
                                   <div class="input-group mb-3">
                                        <div class="col-md-4 mb-3">
                                             <span class="labels">Data de nascimento</span>
                                             <input type="date" name="born_date" max="<?php echo date('Y-m-d'); ?>" class="form-control form-custom" required />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                             <span class="labels">CPF/CNPJ</span>
                                             <input type="number" name="document" class="form-control form-custom" placeholder="(Somente Números)" required />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                             <span class="labels">Contato</span>
                                             <input type="text" name="contact" pattern="[0-9]{11}" class="form-control form-custom" placeholder="DDD+Número" required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <span class="labels">Email</span>
                                             <input type="email" name="email" class="form-control form-custom" placeholder="Digite o email" required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <span class="labels">Instagram</span>
                                             <input type="text" name="instagram" class="form-control form-custom" placeholder="@instagram.example" required />
                                        </div>
                                   </div>
                              </div>
                              <h5>Informações CNPJ (Quando Houver):</h5>
                              <div class="input-group mb-3">
                                   <div class="input-group mb-3">
                                        <div class="col-md-6 mb-3">
                                             <input type="text" name="razao_social" class="form-control form-custom" placeholder="Razão Social" required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <input type="text" name="nome_fantasia" class="form-control form-custom" placeholder="Nome Fantasia" required />
                                        </div>
                                   </div>
                              </div>

                              <h5>Informações de funcionamento:</h5>
                              <div class="input-group mb-3">
                                   <div class="col-md-6">
                                        <div class="row align-items-end">
                                             <div class="col-md-2">
                                                  <span>Abertura</span>
                                                  <input type="text" class="form-control" id="abertura" pattern="[0-9]{2}[:]{1}[0-9]{2}" placeholder="hh:mm">
                                             </div>
                                             <div class="col-md-2">
                                                  <span>Fechamento</span>
                                                  <input type="text" class="form-control" id="fechamento" pattern="[0-9]{2}[:]{1}[0-9]{2}" placeholder="hh:mm">
                                             </div>
                                        </div> 
                                   </div>
                              </div>

                              <h5>Endereço</h5>
                              <div class="input-group mb-3">
                                   <div class="col-md-3 mb-3">
                                        <span class="labels">CEP</span>
                                        <input type="text" inputmode="number" minlength="8" maxlength="8" name="zipcode" id="zipcode" class="form-control form-custom" placeholder="28911000" onblur="getCep(this.value)" required />
                                   </div>
                                   <div class="col-md-1 mb-3">
                                        <span class="labels">Estado</span>
                                        <select class="form-control form-custom" id="state" name="state">
                                             <option default selected>UF</option>
                                             <?
                                             $states = array('RJ', 'SP', 'MG', 'PR', 'RS', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'PA', 'PB', 'PE', 'PI', 'PI', 'RN', 'RS', 'RO', 'RR', 'SC', 'SE', 'TO');

                                             foreach ($states as $st) {
                                                  echo "<option value='$st'>$st</option>";
                                             }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="col-md-4 mb-3">
                                        <span class="labels">Cidade</span>
                                        <input type="text" id="city" name="city" class="form-control form-custom" placeholder="Cidade" required />
                                   </div>
                                   <div class="col-md-4 mb-3">
                                        <span class="labels">Bairro</span>
                                        <input type="text" id="neighborhood" name="neighborhood" class="form-control form-custom" placeholder="Bairro" required />
                                   </div>
                                   <div class="col-md-12 mb-3">
                                        <span class="labels">Logradouro</span>
                                        <input type="text" id="street" name="street" class="form-control form-custom" placeholder="Logradouro" required />
                                   </div>
                              </div>

                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                   <button type="submit" class="btn btn-success">Cadastrar</button>
                              </div>

                         </form>

                    </div>
               </div>
          </div>
     </div>

     <script src="/assets/js/viacep.js"></script>
     <script src="/assets/js/masks.js"></script>

     <? require_once VIEW . '/snippets/footer.php'; ?>
</body>