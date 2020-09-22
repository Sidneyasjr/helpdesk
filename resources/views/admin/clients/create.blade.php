@extends('admin.master.master')

@section('content')

<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Novo Cliente</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.clients.index') }}">Clientes</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-blue">Novo Cliente</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="nav">
            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#complementary" class="nav_tabs_item_link">Dados Complementares</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#realties" class="nav_tabs_item_link">Chamados</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#management" class="nav_tabs_item_link">Administrativo</a>
                </li>
            </ul>

            <form class="app_form" action="" method="post" enctype="multipart/form-data">
                <div class="nav_tabs_content">
                    <div id="data">
                        <label class="label">
                            <span class="legend">*Razão Social:</span>
                            <input type="text" name="social_name" placeholder="Razão Social" value=""/>
                        </label>

                        <label class="label">
                            <span class="legend">Nome Fantasia:</span>
                            <input type="text" name="alias_name" placeholder="Nome Fantasia" value=""/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">CNPJ:</span>
                                <input type="tel" name="document_company" class="mask-cnpj"
                                       placeholder="CNPJ da Empresa"
                                       value=""/>
                            </label>

                            <label class="label">
                                <span class="legend">Inscrição Estadual:</span>
                                <input type="text" name="document_company_secondary" placeholder="Número da Inscrição"
                                       value=""/>
                            </label>
                        </div>

                        <div class="app_collapse">
                            <div class="app_collapse_header mt-2 collapse">
                                <h3>Endereço</h3>
                                <span class="icon-minus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content">
                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*CEP:</span>
                                        <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                               placeholder="Digite o CEP" value=""/>
                                    </label>
                                </div>

                                <label class="label">
                                    <span class="legend">*Endereço:</span>
                                    <input type="text" name="street" class="street" placeholder="Endereço Completo"
                                           value=""/>
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Número:</span>
                                        <input type="text" name="number" placeholder="Número do Endereço" value=""/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Complemento:</span>
                                        <input type="text" name="complement" placeholder="Completo (Opcional)"
                                               value=""/>
                                    </label>
                                </div>

                                <label class="label">
                                    <span class="legend">*Bairro:</span>
                                    <input type="text" name="neighborhood" class="neighborhood" placeholder="Bairro"
                                           value=""/>
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Estado:</span>
                                        <input type="text" name="state" class="state" placeholder="Estado" value=""/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Cidade:</span>
                                        <input type="text" name="city" class="city" placeholder="Cidade" value=""/>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="app_collapse mt-2">
                            <div class="app_collapse_header collapse">
                                <h3>Contato</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none">
                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Telefone:</span>
                                        <input type="tel" name="telephone" class="mask-phone"
                                               placeholder="Número do Telefone com DDD" value=""/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Celular:</span>
                                        <input type="tel" name="cell" class="mask-cell"
                                               placeholder="Número do Telefone com DDD" value=""/>
                                    </label>
                                </div>
                            </div>

                            <div class="app_collapse_content d-none">
                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*E-mail Principal:</span>
                                        <input type="email" name="email" class="email" placeholder="E-mail Principal" value=""/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*E-mails Secundarios:</span>
                                        <input type="email" name="email-seconds" class="email-seconds" placeholder="E-mails Secundarios" value=""/>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="complementary" class="d-none">

                        <div class="app_collapse mt-2">
                            <div class="app_collapse_header collapse">
                                <h3>Usuarios</h3>
                                <span class="icon-minus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content">

                                <p class="text-right">
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-green icon-building-o">Cadastrar
                                        Novo Usuario</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div id="realties" class="d-none">
                        <div class="app_collapse">
                            <div class="app_collapse_header collapse">
                                <h3>Chamados</h3>
                                <span class="icon-minus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content">
                                <div id="realties">
                                    <div class="dash_content_app_box_stage">
                                        <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Abertura</th>
                                                <th>Cliente</th>
                                                <th>Satus</th>
                                                <th>Categoria</th>
                                                <th>Modulo</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><a href="" class="text-blue">123456</a></td>
                                                <td><a href="" class="text-blue"><?= date('H/m/Y'); ?></a></td>
                                                <td><a href="" class="text-blue">Seta Soluções</a></td>
                                                <td><a href="" class="text-blue">Em atendimento</a></td>
                                                <td>Duvida</td>
                                                <td>Financeiro</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="no-content">Não foram encontrados registros!</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="management" class="d-none">
                        <div class="label_gc">
                            <span class="legend">Situação:</span>
                            <label class="label">
                                <input type="checkbox" name="admin"><span>Ativo</span>
                            </label>

                            <label class="label">
                                <input type="checkbox" name="client"><span>Inativo</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-2">
                    <button class="btn btn-large btn-green icon-check-square-o" type="submit">Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
