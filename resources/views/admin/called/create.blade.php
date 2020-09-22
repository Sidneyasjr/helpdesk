<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Cadastrar Novo Chamado</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="">Chamados</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-blue">Cadastrar Chamado</a></li>
                </ul>
            </nav>

            <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
        </div>
    </header>

    <?php include('filter.php'); ?>

    <div class="dash_content_app_box">

        <div class="nav">
            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#data" class="nav_tabs_item_link active">Dados do Chamado</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#structure" class="nav_tabs_item_link">Desenvolvimento</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#images" class="nav_tabs_item_link">Arquivos</a>
                </li>
            </ul>

            <form action="" method="post" class="app_form" enctype="multipart/form-data">

                <div class="nav_tabs_content">
                    <div id="data">
                        <label class="label_g2">
                            <div class="label">
                                <span class="legend">Cliente:</span>
                                <select name="user" class="select2">
                                    <option value="">Nome (CNPJ)</option>
                                </select>
                            </div>

                            <div class="label">
                                <span class="legend">Usuario:</span>
                                <select name="user" class="select2">
                                    <option value="">Nome (E-mail)</option>
                                </select>
                            </div>
                        </label>
                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Categoria:</span>
                                <select name="category" class="select2">
                                    <option value="doubts">Duvidas</option>
                                    <option value="incident">Incidente</option>
                                    <option value="installation">Instalação</option>
                                    <option value="homologation">Homologação</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">Modulos:</span>
                                <select name="category" class="select2">
                                    <option value="doubts">Cadastro</option>
                                    <option value="incident">Comercial</option>
                                    <option value="installation">Produção</option>
                                    <option value="homologation">Financeiro</option>
                                </select>
                            </label>
                        </div>

                        <label class="label">
                            <span class="legend">*Assunto:</span>
                            <input type="text" name="subject" placeholder="Assunto" value=""/>
                        </label>


                        <div class="app_collapse">
                            <div class="app_collapse_header mt-2 collapse">
                                <h3>Descrição</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none">
                                <label class="label">
                                    <span class="legend">Descrição do Chamado:</span>
                                    <textarea name="description" cols="30" rows="10" class="mce"></textarea>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="structure" class="d-none">
                        <h3 class="mb-2">Desenvolvimento</h3>
                    </div>

                    <div id="images" class="d-none">
                        <label class="label">
                            <span class="legend">Imagens</span>
                            <input type="file" name="files[]" multiple>
                        </label>

                        <div class="content_image"></div>
                    </div>
                </div>

                <div class="text-right mt-2">
                    <button class="btn btn-large btn-green icon-check-square-o">Abrir Chamado</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    $(function () {
        $('input[name="files[]"]').change(function (files) {

            $('.content_image').text('');

            $.each(files.target.files, function (key, value) {
                var reader = new FileReader();
                reader.onload = function (value) {
                    $('.content_image').append(
                        '<div class="property_image_item">' +
                        '<div class="embed radius" ' +
                        'style="background-image: url(' + value.target.result + '); background-size: cover; background-position: center center;">' +
                        '</div>' +
                        '</div>');
                };
                reader.readAsDataURL(value);
            });
        });
    });
</script>