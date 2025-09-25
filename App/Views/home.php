<?php include "./App/Views/includes/head.php"; ?>
<body>
    <header class="header_home">
        <img src="./Public/assets/logo_somente_hamburguer_trans.png" class="img_logo" alt="logo">
        <a href="./login" class="link_login">entrar</a>
    </header>
    <main class="content_principal">
        <section class="content_about">
            <div class="content_logo">
                <img src="./Public/assets/logo_hamburguer.jpeg" alt="logo completa" class="img_logo_grande">
            </div>
            <div class="content_informacoes">
                <div class="content_localizacao">
                    <i class="bi bi-geo-alt icon"></i>
                    <p class="local_text" id="text_rua">R. José Antônio, 1870 - Centro, Campo Grande - MS, 79002-401, Brazil</p>
                </div>
                <div class="conteiner_sobre_inferior">
                    <div class="content_sobre_inferior">
                        <i class="bi bi-clock icon"></i>
                        <p class="local_text">Abrimos às <span id="horario_text">17:30</span></p>
                    </div>
                    <div class="content_sobre_inferior">
                        <i class="bi bi-instagram icon"></i>
                        <p class="local_text" id="instagram">@Honório’sBurger</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="conteiner_cards" id="conteiner_cards">
            <div class="card_item">
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
    <script src="./Public/js/listarHome.js"></script>
</body>
</html>