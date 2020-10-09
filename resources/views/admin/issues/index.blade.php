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
                        <li><a href="{{ route('admin.issues.index') }}" class="text-blue">Chamados</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.issues.create') }}" class="btn btn-blue icon-phone ml-1">Criar Chamado</a>
                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.issues.filter')

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe dataTable" width="100" style="width: 100% !important;">
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
                    @foreach($issues as $issue)
                        <tr>
                            <td><a href="{{ route('admin.issues.edit', [ 'issue' => $issue->id]) }}" class="text-blue">{{ $issue->id }}</a></td>
                            <td><a href="{{ route('admin.issues.edit', [ 'issue' => $issue->id]) }}" class="text-blue">{{ $issue->created_at }}</a></td>
                            <td><a href="{{ route('admin.issues.edit', [ 'issue' => $issue->id]) }}" class="text-blue">{{ $issue->costumerObject->social_name }}</a></td>
                            <td>Atendimento</td>
                            <td>{{ $issue->categoryObject->description }}</td>
                            <td>{{ $issue->moduleObject->description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
