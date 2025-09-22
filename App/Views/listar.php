<?php include "./App/Views/includes/head2.php"; 
$paginaAtual = 'listar';

?>
<body>
    <?php include "./App/Views/includes/menu_produto.php";  ?>
    <main class="conteiner_principal">
        <h1>Listar</h1>
        <section class="conteiner_cards">
            <div class="card_item">
                <div class="content_editar_lanche">
                    <i class="bi bi-trash icon icon_deletar" id="icon_deletar"></i>
                    <a href="./editar" class="link_editar_lanche"><i class="bi bi-pencil-square icon icon_editar"></i></a>
                </div>
                <div class="content_img_lanche">
                    <img src="https://storage.googleapis.com/prod-cardapio-web/uploads/item/image/2341858/db32281f079A0702.jpg" class="img_lanche">
                </div>
                <div class="content_info_lanche">
                    <p class="title_lanche">título lanche</p>
                    <span class="sobre_lanche">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                    <div class="content_preco">
                        <span class="text_preco">A partir de:</span>
                        <p class="preco_lanche">R$26,50</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="./Public/js/listar.js"></script>
</body>
</html>