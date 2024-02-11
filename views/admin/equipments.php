<? require_once VIEW . 'snippets/header.php'; ?>

<body class="sidebar-mini sidebar-collapse">

     <? require_once __DIR__ . '/../snippets/topbar.php'; ?>
     <? require_once __DIR__ . '/../snippets/sidebar-admin.php'; ?>


     <div class="content-wrapper">


          <div class="row">
               <div class="col-md-12 pTitle">
                    Equipamentos
               </div>
          </div>

          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              Tabela de Equipamentos
                         </div>
                         <div class="card-body">
                            <div class="row mb-3">
                                   <div class="col-md-12">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-register" data-toggle="modal" data-target="#costumerRegister">
                                             Novo equipamento
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
                                        <table class="table table-dark" id="table">
                                             <thead>
                                                  <th>Título</th>
                                                  <th>
                                                       <center>Ações</center>
                                                  </th>
                                             </thead>
                                             <tbody>
                                                  <? if(isset($equipments)){?>
                                                       <? foreach($equipments as $equip){ ?>
                                                       <tr>
                                                            <td><?= $equip['title'] ?></td>
                                                            <td>
                                                            <center>
                                                                 <div class="btn-group">
                                                                      <a class="btn btn-info" href="/admin/equipamentos/editar?id=<?= $equip['id'] ?>">
                                                                           <i class="fa-solid fa-user-pen"></i>
                                                                      </a>
                                                                      <a class="btn btn-danger" href="/admin/equipamentos/excluir?id=<?= $equip['id'] ?>">
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
                         <h5 class="modal-title" id="exampleModalLabel">Cadastrar Equipamento</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">

                         <form method="POST" action="/admin/equipamentos/criar">
                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                            <div class="col-md-12 mb-3">
                                                <input type="text" name="title" class="form-control form-custom" placeholder="Título" required />
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

     <? require_once VIEW . '/snippets/footer.php'; ?>
     <script src="/assets/js/viacep.js"></script>
     <script>
          let table = new DataTable('#table',{
               responsive: true
          });
     </script>
</body>