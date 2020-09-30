@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Cadastrar Novo Chamado</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.calleds.index') }}">Chamados</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.calleds.create') }}" class="text-blue">Cadastrar Chamado</a></li>
                    </ul>
                </nav>

                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.calleds.filter')

        <div class="dash_content_app_box">

            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="message message-red">
                        <p class="icon-asterisk">{{ $error }}</p>
                    </div>
                @endforeach
            @endif

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

                <form action="{{ route('admin.calleds.store') }}" method="post" class="app_form"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="nav_tabs_content">
                        <div id="data">
                            <label class="label_g2">
                                <div class="label">
                                    <span class="legend">Cliente:</span>
                                    <select name="client_id" class="select2">
                                        <option value="" selected>Selecione o cliente</option>
                                        @foreach($clients as $client)
                                            <option
                                                value="{{ $client->id }}">{{ $client->social_name }}
                                                ({{ $client->alias_name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="label">
                                    <span class="legend">Usuario:</span>
                                    <select name="user_id" class="select2">
                                        <option value="" selected>Selecione o usuario</option>
                                        @foreach($users as $user)
                                            <option
                                                value="{{ $user->id }}">{{ $user->name }}
                                                ({{ $user->email }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </label>
                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Categoria:</span>
                                    <select name="category" class="select2">
                                        <option value="" selected>Selecione a categoria</option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}">{{ $category->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">Modulos:</span>
                                    <select name="module" class="select2">
                                        <option value="" selected>Selecione o modulo</option>
                                        @foreach($modules as $module)
                                            <option
                                                value="{{ $module->id }}">{{ $module->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Assunto:</span>
                                <input type="text" name="subject" placeholder="Assunto" value="{{ old('subject') }}"/>
                            </label>


                            <div class="app_collapse">
                                <div class="app_collapse_header mt-2 collapse">
                                    <h3>Descrição</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <label class="label">
                                        <span class="legend">Descrição do Chamado:</span>
                                        <textarea name="description" cols="30" rows="10"
                                                  class="mce">{{ old('description') }}</textarea>
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
@endsection
@section('js')
    <script>
        $('select[name="user_id"]').change(function () {
            var user_id = $(this);
            $.post(user_id.data('action'), {user_id: user_id.val()}, function (response) {
                setFieldProperty(response);
            }, 'json');
        });
    </script>
@endsection
