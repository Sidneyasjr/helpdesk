@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Editar Usuario</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{route('admin.users.index')}}">Usuarios</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.create') }}" class="text-blue">Novo Usuario</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="dash_content_app_box">

            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="message message-red">
                        <p class="icon-asterisk">{{ $error }}</p>
                    </div>
                @endforeach
            @endif

            @if(session()->exists('message'))
                <div class="message message-green">
                    <p class="icon-asterisk">{{ session()->get('message') }}</p>
                </div>
            @endif

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

                <form class="app_form" action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="nav_tabs_content">
                        <div id="data">
                            <label class="label">
                                <span class="legend">*Nome:</span>
                                <input type="text" name="name" placeholder="Nome Completo"
                                       value="{{ old('name') ?? $user->name }}"/>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Genero:</span>
                                    <select name="genre">
                                        <option
                                            value="male" {{ (old('genre') == 'male' ? 'selected' : ($user->genre == 'male' ? 'selected' : '')) }}>
                                            Masculino
                                        </option>
                                        <option
                                            value="female" {{ (old('genre') == 'female' ? 'selected' : ($user->genre == 'female' ? 'selected' : '')) }}>
                                            Feminino
                                        </option>
                                        <option
                                            value="other" {{ (old('genre') == 'other' ? 'selected' : ($user->genre == 'other' ? 'selected' : '')) }}>
                                            Outros
                                        </option>
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">*CPF:</span>
                                    <input type="tel" class="mask-doc" name="document" placeholder="CPF do Cliente"
                                           value="{{ old('document') ?? $user->document }}"/>
                                </label>
                            </div>


                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Data de Nascimento:</span>
                                    <input type="tel" name="date_of_birth" class="mask-date"
                                           placeholder="Data de Nascimento"
                                           value="{{ old('date_of_birth') ?? $user->date_of_birth }}"/>
                                </label>

                                <label class="label">
                                    <span class="legend">Foto</span>
                                    <input type="file" name="cover">
                                </label>
                            </div>


                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Endereço</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*CEP:</span>
                                            <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                                   placeholder="Digite o CEP"
                                                   value="{{ old('zipcode') ?? $user->zipcode }}"/>
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Endereço:</span>
                                        <input type="text" name="street" class="street"
                                               placeholder="Endereço Completo"
                                               value="{{ old('street') ?? $user->street }}"/>
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Número:</span>
                                            <input type="text" name="number" placeholder="Número do Endereço"
                                                   value="{{ old('number') ?? $user->number }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Complemento:</span>
                                            <input type="text" name="complement" placeholder="Completo (Opcional)"
                                                   value="{{ old('complement') ?? $user->complement }}"/>
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood"
                                               placeholder="Bairro"
                                               value="{{ old('neighborhood') ?? $user->neighborhood }}"/>
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Estado:</span>
                                            <input type="text" name="state" class="state" placeholder="Estado"
                                                   value="{{ old('state') ?? $user->state }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">*Cidade:</span>
                                            <input type="text" name="city" class="city" placeholder="Cidade"
                                                   value="{{ old('city') ?? $user->city }}"/>
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
                                            <span class="legend">*Corporativo:</span>
                                            <input type="tel" name="telephone" class="mask-phone"
                                                   placeholder="Número do Telefonce com DDD"
                                                   value="{{ old('telephone') ?? $user->telephone }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Celular:</span>
                                            <input type="tel" name="cell" class="mask-cell"
                                                   placeholder="Número do Telefonce com DDD"
                                                   value="{{ old('cell') ?? $user->cell }}"/>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Acesso</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*E-mail:</span>
                                            <input type="email" name="email" placeholder="Melhor e-mail"
                                                   value="{{ old('email') ?? $user->email }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Senha:</span>
                                            <input type="password" name="password" placeholder="Senha de acesso"
                                                   value=""/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="complementary" class="d-none">
                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Empresa</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <label class="label">
                                        <span class="legend">Empresa:</span>
                                        <select name="costumer" class="select2">
                                            <option value="" selected>Selecione a empresa</option>
                                            @foreach($costumers as $costumer)
                                                <option
                                                    value="{{ $costumer->id }}" {{ ($costumer->id == $user->costumer ? 'selected' : '') }}>{{ $costumer->social_name }}
                                                    ({{ $costumer->alias_name }})
                                                </option>
                                            @endforeach
                                        </select>

                                    </label>
                                    <div class="companies_list">
                                        @if($user->costumer)

                                            @foreach($user->costumer()->get() as $costumer)
                                                <div class="companies_list_item mb-2">
                                                    <p><b>Razão Social:</b> {{ $costumer->social_name }}</p>
                                                    <p><b>Nome Fantasia:</b> {{ $costumer->alias_name }}</p>
                                                    <p><b>CNPJ:</b> {{ $costumer->document_company }} -
                                                        <b>Inscrição
                                                            Estadual:</b> {{ $costumer->document_company_secondary }}
                                                    </p>
                                                    <p><b>Endereço:</b> {{ $costumer->street }}, {{ $user->number }}</p>
                                                    <p><b>CEP:</b> {{ $costumer->zipcode }}
                                                        <b>Bairro:</b> {{ $costumer->neighborhood }}
                                                        <b>Cidade/Estado:</b>
                                                        {{ $costumer->city }}/{{ $costumer->state }}</p>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="no-content mb-2">Não foram encontrados registros!</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="realties" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Abertos</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <div id="realties">
                                        <div class="realty_list">
                                            <div class="realty_list_item mb-1">

                                            </div>
                                        </div>
                                        <div class="no-content">Não foram encontrados registros!</div>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse mt-3">
                                <div class="app_collapse_header collapse">
                                    <h3>Encerrados</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <div id="realties">
                                        <div class="no-content">Não foram encontrados registros!</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="management" class="d-none">
                            <div class="label_gc gradient-green-v transition">
                                <span class="legend">Conceder:</span>
                                <label class="label">
                                    <input type="checkbox" name="master"
                                        {{ (old('master') == 'on' || old('master') == true ? 'checked' : ($user->admin == true ? 'checked' : '')) }}>
                                    <span>Master</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox" name="admin"
                                        {{ (old('admin') == 'on' || old('admin') == true ? 'checked' : ($user->client == true ? 'checked' : '')) }}>
                                    <span>Administrador</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green-v icon-check-square-o" type="submit">Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
