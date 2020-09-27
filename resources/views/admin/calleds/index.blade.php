@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Filtro</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="">Chamados</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-blue">Filtro</a></li>
                    </ul>
                </nav>

                <a href="dashboard.php?app=called/create" class="btn btn-blue icon-phone ml-1">Criar Chamado</a>
                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.calleds.filter')

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
                        <td><a href="" class="text-blue">Em Atendimento</a></td>
                        <td>Duvida</td>
                        <td>Financeiro</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
