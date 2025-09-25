<?php include "./App/Views/includes/head2.php"; ?>
<body>
    <section class="loginsection">
        <h1 class="title_login">Login</h1>
        <form action="" method="POST" class="form_login" id="formulario">
            <div class="content_input">
                <label class="input_label">E-mail:</label>
                <input type="email" name="email" id="email" class="input">
            </div>
            <div class="content_input">
                <label class="input_label">Senha:</label>
                <input type="password" name="senha" id="senha" class="input">
                <i class="bi bi-eye-slash icon_senha_login" id="toggleSenha"></i>
            </div>
            <?php echo getToken(); ?>
            <button class="btn_login" id="btn_login">Entrar</button>
        </form>
    </section>
    <script src="./Public/js/logar.js"></script>
</body>
</html>