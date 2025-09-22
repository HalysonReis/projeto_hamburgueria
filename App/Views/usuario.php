<?php include "./App/Views/includes/head2.php"; 
$paginaAtual = 'usuario';
?>
<body>
    <?php include "./App/Views/includes/menu_produto.php";  ?>
    <main class="conteiner_principal">
        <h1>Editar Usuário</h1>
        <form action="" method="post" class="formulario">
            <div class="content_input">
                <label class="text_input">
                    E-mail:
                </label>
                <input type="text" class="input" name="email" id="email">
            </div>
            <div class="content_input input-wrapper">
                <label class="text_input">
                    Senha:
                </label>
                <input type="password" class="input" name="senha" id="senha">
                <i class="bi bi-eye-slash" id="toggleSenha"></i>
                <span class="valida_senha">
                    <span id="digitos">8 Dígitos</span>
                    <span id="numero">1 Número</span>
                    <span id="simbolo">1 Símbolo</span>
                    <span id="maiuscula">1 Maiuscula</span>
                </span>
            </div>
            <div class="content_input">
                <label class="text_input">
                    Instagram:
                </label>
                <input type="text" class="input" name="instagram" id="instragram">
            </div>
            <div class="content_input">
                <label class="text_input">
                    Endereço:
                </label>
                <input type="text" class="input" name="endereco" id="endereco">
            </div>
            <div class="content_input">
                <label class="text_input">
                    Horário:
                </label>
                <input type="time" class="input" name="hora" id="hora">
            </div>
            <div class="btns_content">
                <button type="reset" class="btn_form btn_cancel" id="btn_cancel">Cancel</button>
                <button type="submit" class="btn_form btn_submit" id="btn_cadastro">Editar</button>
            </div>
        </form>
    </main>
    <script src="./Public/js/formulario_usuario.js"></script>
</body>
</html>