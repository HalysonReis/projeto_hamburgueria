<header class="header_home">
    <img src="./Public/assets/logo_somente_hamburguer_trans.png" class="img_logo" alt="logo">
    <ul class="list_menu">
        <li class="list_item">
            <a href="./listar" class="link_list_item <?php echo $paginaAtual == 'listar' ? 'activeMenu' : ''; ?>">listar</a>
        </li>
        <li class="list_item">
            <a href="./cadastrar" class="link_list_item <?php echo $paginaAtual == 'cadastro' ? 'activeMenu' : ''; ?>">cadastrar</a>
        </li>
        <li class="list_item">
            <a href="./usuario" class="link_list_item <?php echo $paginaAtual == 'usuario' ? 'activeMenu' : ''; ?>">usuário</a>
        </li>
    </ul>
</header>