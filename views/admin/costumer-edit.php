<? require_once VIEW . 'snippets/header.php'; ?>

<body class="sidebar-mini sidebar-collapse">

     <? require_once __DIR__ . '/../snippets/topbar.php'; ?>
     <? require_once __DIR__ . '/../snippets/sidebar-admin.php'; ?>


     <div class="content-wrapper">


          <div class="row">
               <div class="col-md-12 pTitle">
                    Clientes
               </div>
          </div>

          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              Tabela Clientes
                         </div>
                         <div class="card-body">

                         <? if(isset($message)) {?>
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
                              
                              <form method="POST" action="/admin/cliente/update">
                                   <h5>Informações pessoais</h5>
                                   <div class="input-group mb-3">
                                        <div class="input-group mb-3">
                                             <div class="col-md-6 mb-3">
                                                  <input type="hidden" name="id" value="<?= $costumer['id'] ?>">
                                                  <input value="<?= $costumer['name'] ;?>" type="text" name="name" class="form-control form-custom" placeholder="Nome" required />
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <input value="<?= $costumer['surname'] ;?>" type="text" name="surname" class="form-control form-custom" placeholder="Sobrenome" required />
                                             </div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <div class="col-md-4 mb-3">
                                                  <span class="labels">Data de nascimento</span>
                                                  <input value="<?= $costumer['born_date'] ;?>" type="date" name="born_date" max="<?php echo date('Y-m-d'); ?>" class="form-control form-custom" required />
                                             </div>
                                             <div class="col-md-4 mb-3">
                                                  <span class="labels">CPF/CNPJ</span>
                                                  <input value="<?= $costumer['cpf/cnpj'] ;?>" type="number" name="document" class="form-control form-custom" placeholder="(Somente Números)" required />
                                             </div>
                                             <div class="col-md-4 mb-3">
                                                  <span class="labels">Contato</span>
                                                  <input value="<?= $costumer['contact'] ;?>" type="text" name="contact" pattern="[0-9]{11}" class="form-control form-custom" placeholder="DDD+Número" required />
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <span class="labels">Email</span>
                                                  <input value="<?= $costumer['email'] ;?>" type="email" name="email" class="form-control form-custom" placeholder="Digite o email" required />
                                             </div>
                                        </div>
                                   </div>

                                   <h5>Endereço</h5>
                                   <div class="input-group mb-3">
                                        <div class="col-md-3 mb-3">
                                             <span class="labels">CEP</span>
                                             <input type="text" inputmode="number" minlength="8" maxlength="8" name="zipcode" id="zipcode" class="form-control form-custom" placeholder="28911000" onblur="getCep(this.value)" value="<?= $costumer['zipcode'] ?>" required />
                                        </div>
                                        <div class="col-md-1 mb-3">
                                             <span class="labels">Estado</span>
                                             <select class="form-control form-custom" id="state" name="state" value="<?= $costumer['state'] ?>">
                                                  <option default selected>UF</option>
                                                  <?
                                                  $states = array('RJ', 'SP', 'MG', 'PR', 'RS', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'PA', 'PB', 'PE', 'PI', 'PI', 'RN', 'RS', 'RO', 'RR', 'SC', 'SE', 'TO');

                                                  foreach ($states as $st) {
                                                       if($st == $costumer['state'])
                                                       {
                                                            $st = $costumer['state'];
                                                            echo "<option value='$st' selected>$st</option>";
                                                       }else{
                                                            echo "<option value='$st'>$st</option>";
                                                       }
                                                       
                                                  }
                                                  ?>
                                             </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                             <span class="labels">Cidade</span>
                                             <input type="text" id="city" name="city" class="form-control form-custom" placeholder="Cidade" value="<?= $costumer['city'] ?>" required />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                             <span class="labels">Bairro</span>
                                             <input type="text" id="neighborhood" name="neighborhood" class="form-control form-custom" placeholder="Bairro" value="<?= $costumer['neighborhood'] ?>" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                             <span class="labels">Logradouro</span>
                                             <input type="text" id="street" name="street" class="form-control form-custom" placeholder="Logradouro" value="<?= $costumer['street'] ?>"required />
                                        </div>
                                   </div>

                                   <div class="modal-footer">
                                        <a href="/admin/cliente" class="btn btn-secondary" data-dismiss="modal">Voltar</a>
                                        <button type="submit" class="btn btn-info">Editar</button>
                                   </div>

                              </form>

                         </div>
                    </div>
               </div>
          </div>


     </div>

     <script src="/assets/js/viacep.js"></script>


     <? require_once VIEW . '/snippets/footer.php'; ?>
</body>