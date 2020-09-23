@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Filtro</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.clients.index') }}" class="text-blue">Clientes</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.clients.create') }}" class="btn btn-blue icon-user ml-1">Criar Cliente</a>
                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.clients.filter')

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CNPJ/CPF</th>
                        <th>E-mail</th>
                        <th>Satus</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td><a href="{{route('admin.clients.edit', [$client->id])}}" class="text-blue">{{ $client->id }}</a></td>
                            <td><a href="{{route('admin.clients.edit', [$client->id])}}" class="text-blue">{{ $client->alias_name }}</a></td>
                            <td>{{ $client->document_company }}</td>
                            <td><a href="mailto: {{ $client->email }}" class="text-blue">{{ $client->email }}</a></td>
                            <td>{{ ($client->status) == true ? 'Ativo' : 'Inativo' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
