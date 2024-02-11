<? require_once VIEW . 'snippets/header.php'; ?>

<body class="sidebar-mini sidebar-collapse">

     <? require_once __DIR__ . '/../snippets/topbar.php'; ?>
     <? require_once __DIR__ . '/../snippets/sidebar-admin.php'; ?>


     <div class="content-wrapper">


          <div class="row">
               <div class="col-md-12 pTitle">
                    Marcas
               </div>
          </div>

          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              Editar Utilidade
                         </div>
                         <div class="card-body">

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


                              <form method="POST" action="/admin/equipamentos/update">
                                   <div class="input-group mb-3">
                                        <div class="input-group mb-3">
                                             <div class="col-md-12 mb-3">
                                                  <input type="hidden" name="id" value="<?= $brand['id'] ?>" />
                                                  <input type="text" name="title" class="form-control form-custom" value="<?= $brand['title'] ?>" placeholder="Título" required />
                                             </div>
                                        </div>
                                   </div>

                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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