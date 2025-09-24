<form action="./produto/editar/1" method="post" class="formulario" id="formulario">
    <div class="content_img">
        <p class="text_input">
            Imagem:
        </p>
        <label class="label_img">
            <input type="file" class="input_img_lanche" name="img_lanche" id="img_lanche" accept="image/jpeg, image/png, image/jpg">
            <i class="bi bi-upload icon_uploads"></i>
            <img src="" class="img_preview" id="img_preview">
        </label>
    </div>
    <div class="content_input">
        <label class="text_input">
            Nome:
        </label>
        <input type="text" class="input" name="nome" id="nome">
    </div>
    <div class="content_input">
        <label class="text_input">
            Descrição:
        </label>
        <textarea class="input_area" name="descricao" id="descricao" maxlength="200"></textarea>
        <span class="max_letter"><span id="max_int_palavra" data-number="200">200</span> palavras</span>
    </div>
    <div class="content_input">
        <label class="text_input">
            Preço:
        </label>
        <input type="text" class="input" name="preco" id="preco">
    </div>
    <?php echo getToken(); ?>
    <div class="btns_content">
        <button type="reset" class="btn_form btn_cancel" id="btn_cancel">Cancel</button>
        <button type="submit" class="btn_form btn_submit" id="btn_confirmar">Cadastrar</button>
    </div>
</form>