@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Chamados</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.calleds.index') }}" class="text-blue">Chamados</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.calleds.create') }}" class="btn btn-blue icon-phone ml-1">Criar Chamado</a>
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
                    @foreach($calleds as $called)
                        <tr>
                            <td><a href="{{ route('admin.calleds.edit', [ 'called' => $called->id]) }}" class="text-blue">{{ $called->id }}</a></td>
                            <td><a href="{{ route('admin.calleds.edit', [ 'called' => $called->id]) }}" class="text-blue">{{ $called->created_at }}</a></td>
                            <td><a href="{{ route('admin.calleds.edit', [ 'called' => $called->id]) }}" class="text-blue">{{ $called->clientObject->social_name }}</a></td>
                            <td>Atendimento</td>
                            <td>{{ $called->categoryObject->description }}</td>
                            <td>{{ $called->moduleObject->description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
