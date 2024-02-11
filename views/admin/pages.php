<? require_once VIEW . 'snippets/header.php'; ?>

<body class="sidebar-mini sidebar-collapse">

     <? require_once __DIR__ . '/../snippets/topbar.php'; ?>
     <? require_once __DIR__ . '/../snippets/sidebar-admin.php'; ?>


     <div class="content-wrapper">


          <div class="row">
               <div class="col-md-12 pTitle">
                    Utilidades
               </div>
          </div>

          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              Tabela de Páginas
                         </div>
                         <div class="card-body">
                            <div class="row mb-3">
                                   <div class="col-md-12">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-register" data-toggle="modal" data-target="#costumerRegister">
                                             Nova Página
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
                                                  <th>Título</th>
                                                  <th>Categoria</th>
                                                  <th>
                                                       <center>Ações</center>
                                                  </th>
                                             </thead>
                                             <tbody>
                                                  <? if(isset($utilities)){?>
                                                       <? foreach($utilities as $utl){ ?>
                                                       <tr>
                                                            <td><?= $utl['title'] ?></td>
                                                            <td><?= $utl['category'] ?></td>
                                                            <td>
                                                            <center>
                                                                 <div class="btn-group">
                                                                      <a class="btn btn-info" href="/admin/utilidades/editar?id=<?= $utl['id'] ?>">
                                                                           <i class="fa-solid fa-user-pen"></i>
                                                                      </a>
                                                                      <a class="btn btn-danger" href="/admin/utilidades/excluir?id=<?= $utl['id'] ?>">
                                                                           <i class="fa-solid fa-circle-xmark"></i>
                                                                      </a>
                                                                 </div>
                                                            </center>
                                                            </td>
                                                       </tr>
                                                  <? }} ?>
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
                         <h5 class="modal-title" id="exampleModalLabel">Cadastrar Páginas</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">

                         <form method="POST" action="/admin/paginas/criar">
                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                            <div class="col-md-12 mb-3">
                                                <input type="text" name="title" class="form-control form-custom" placeholder="Título" required />
                                            </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="col-md-12 mb-3">
                                            <span>Descrição</span>
                                            <textarea class="form-control" name="description" minlength="10" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                        <div class="col-md-12 mb-3">
                                            <span>Corpo da página</span>
                                            <textarea class="form-control" name="body" minlength="10" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="input-group mb-3">
                                        <div class="col-md-6 mb-3">
                                            <span>Categoria</span>
                                            <select class="form-control" name="category">
                                                  <option selected disabled>Selecione..</option>
                                                  <? if(isset($categories)){ ?>  
                                                       <? foreach($categories as $cat){ ?>
                                                       <option value="<?= $cat['title'] ?>"><?= $cat['title'] ?></option>
                                                  <?}}?>
                                            </select>
                                        </div>
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


     <? require_once VIEW . '/snippets/footer.php'; ?>
</body>