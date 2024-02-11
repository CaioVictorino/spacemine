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
                              Editar categoria
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

                              <form method="POST" action="/admin/categorias/update">
                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                            <div class="col-md-12 mb-3">
                                                  <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                                  <input type="text" name="title" class="form-control form-custom" placeholder="Título" value="<?= $category['title'] ?>" required />
                                            </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="col-md-12 mb-3">
                                            <span>Descrição</span>
                                            <textarea class="form-control" name="description" minlength="10" required><?= $category['description'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="col-md-6">
                                        <span>Tipo</span>
                                        <select class="form-control" name="type" required>
                                             <? 
                                             $options = ['pages', 'utilities'];
                                             foreach($options as $opt){ ?>
                                                  <? if($opt == $category['type']){ ?>
                                                       <option value="<?= $opt ?>" selected><?= $opt ?></option>
                                                  <? } else { ?>
                                                       <option value="<?= $opt ?>"><?= $opt ?></option>
                                             <? }} ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <a type="button" href="/admin/categorias" class="btn btn-secondary" data-dismiss="modal">Voltar</a>
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