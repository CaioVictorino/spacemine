<?php require_once __DIR__ . '/snippets/header.php'; ?>

<body class="hold-transition login-page">
     <div class="login-box">
          <div class="login-logo">
               <center><img src="storage/images/icon.png" id="loginImg"></center>
          </div>

          <div class="card">
               <div class="card-body login-card-body">
                    <p class="login-box-msg">Iniciar sessão</p>
                    <form action="/admin" method="post">
                         <div class="input-group mb-3">
                              <input type="email" class="form-control" placeholder="CPF/CNPJ">
                              <div class="input-group-append">
                                   <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                   </div>
                              </div>
                         </div>
                         <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Password">
                              <div class="input-group-append">
                                   <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-8">
                                   <div class="icheck-primary">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">
                                             Lembrar-me
                                        </label>
                                   </div>
                              </div>

                              <div class="col-4">
                                   <button type="submit" class="btn btn-danger btn-block" id="loginBtn">Entrar</button>
                              </div>

                         </div>
                    </form>

                    <p class="mb-1">
                         <a href="forgot-password.html">Esqueci minha senha</a>
                    </p>
               </div>

          </div>
     </div>
</body>

<?php require_once __DIR__ . '/snippets/footer.php'; ?>
