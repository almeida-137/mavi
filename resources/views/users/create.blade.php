<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="px-5 py-4 container-fluid">
            <div class="mt-1 row">
                <div class="col-12">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <h5 class="">Adicionar Usuário</h5>
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
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Telefone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" 
                                            pattern="\(\d{2}\)\d{5}-\d{4}" maxlength="14" oninput="formatPhone(this)" 
                                            placeholder="(99)99999-9999" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Endereço</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-label">Tipo de Usuário</label>
                                        <select class="form-select" id="user_type" name="user_type" required>
                                            <option value="customer">Cliente</option>
                                            <option value="admin">Administrador</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="active" class="form-label">Ativo</label>
                                        <select class="form-select" id="active" name="active">
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="company_id" class="form-label">Empresa</label>
                                    <input type="number" class="form-control" id="company_id" name="company_id">
                                </div>

                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>

<script>
function formatPhone(input) {
    input.value = input.value.replace(/\D/g, '')
                              .replace(/^(\d{2})(\d)/g, '($1)$2')
                              .replace(/(\d{5})(\d)/g, '$1-$2');
}
</script>
