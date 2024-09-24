<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="px-5 py-4 container-fluid">
            <div class="mt-1 row">
                <div class="col-12">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <h5 class="">Cadastrar Empresa</h5>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                @if (session('success'))
                                <div class="alert alert-success" role="alert" id="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if (session('error'))
                                <div class="alert alert-danger" role="alert" id="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{ route('companies.store') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="razao_social" class="form-label">Razão Social</label>
                                        <input type="text" name="razao_social" id="razao_social"
                                            class="form-control" required>
                                        @error('razao_social')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nome Fantasia</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control" required>
                                        @error('name')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="atividade_principal" class="form-label">Atividade Principal</label>
                                        <input type="text" name="atividade_principal" id="atividade_principal"
                                            class="form-control" required>
                                        @error('atividade_principal')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cnae" class="form-label">CNAE</label>
                                        <input type="text" name="cnae" id="cnae"
                                            class="form-control" required>
                                        @error('cnae')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="cnpj" class="form-label">CNPJ</label>
                                        <input type="text" name="cnpj" id="cnpj"
                                            class="form-control" required>
                                        @error('cnpj')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="endereco" class="form-label">Endereço</label>
                                        <input type="text" name="endereco" id="endereco"
                                            class="form-control">
                                        @error('endereco')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="bairro" class="form-label">Bairro</label>
                                        <input type="text" name="bairro" id="bairro"
                                            class="form-control">
                                        @error('bairro')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cep" class="form-label">CEP</label>
                                        <input type="text" name="cep" id="cep"
                                            class="form-control" required>
                                        @error('cep')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="cidade" class="form-label">Cidade</label>
                                        <input type="text" name="cidade" id="cidade"
                                            class="form-control">
                                        @error('cidade')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefone" class="form-label">Telefone</label>
                                        <input type="text" name="telefone" id="telefone"
                                            class="form-control" required>
                                        @error('telefone')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="id_manager" class="form-label">Gerente</label>
                                    <select id="id_manager" name="id_manager" class="form-select" required>
                                        <option hidden>Selecione um Gerente!</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_manager')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
