@extends('admin.master.master')

@section('content')
    <div style="flex-basis: 100%;">
        <section class="dash_content_app">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Dashboard</h2>
            </header>

            <div class="dash_content_app_box">
                <section class="app_dash_home_stats">
                    <article class="control radius">
                        <h4 class="icon-users">Clientes</h4>
                        <p><b>Ativos:</b> 100</p>
                        <p><b>Inativos:</b> 100</p>
                    </article>

                    <article class="blog radius">
                        <h4 class="icon-phone">Chamados</h4>
                        <p><b>Abertos:</b> 100</p>
                        <p><b>Fechados:</b> 100</p>
                        <p><b>Total:</b> 200</p>
                    </article>

                    <article class="users radius">
                        <h4 class="icon-file-text">Desenvolvimentos</h4>
                        <p><b>Pedentes:</b> 5</p>
                        <p><b>Desenvolvidos:</b> 5</p>
                        <p><b>Total:</b> 10</p>
                    </article>
                </section>
            </div>
        </section>

        <section class="dash_content_app" style="margin-top: 40px;">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Últimos Chamados Abertos</h2>
            </header>

            <div class="dash_content_app_box">
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
                            <td><a href="" class="text-blue">Em andamento</a></td>
                            <td>Duvida</td>
                            <td>Financeiro</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
