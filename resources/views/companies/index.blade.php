<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="px-5 py-4 container-fluid">
            <div class="mt-1 row">
                <div class="col-12">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="">Gestão de Empresas</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('companies.create') }}" class="btn btn-dark btn-primary">
                                        <i class="fas fa-building me-2"></i>Adicionar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="">
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
                        <div class="table-responsive">
                            <table class="table text-secondary text-center text-xs">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                        </th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            ID</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Razão Social</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Nome</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            CNPJ</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Telefone</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Ativo</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                    <tr>
                                        <td class="align-middle bg-transparent border-bottom">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{ $company->photo_path }}" class="rounded-circle mr-2"
                                                    alt="{{ $company->name }}" style="height: 36px; width: 36px;">
                                            </div>
                                        </td>
                                        <td class="align-middle bg-transparent border-bottom">{{ $company->id }}</td>
                                        <td class="align-middle bg-transparent border-bottom">
                                            {{ $company->razao_social }}</td>
                                        <td class="align-middle bg-transparent border-bottom">{{ $company->name }}</td>
                                        <td class="align-middle bg-transparent border-bottom">{{ $company->cnpj }}</td>
                                        <td class="text-center align-middle bg-transparent border-bottom">
                                            {{ $company->telefone }}</td>
                                        <td class="text-center align-middle bg-transparent border-bottom">
                                            @if($company->ativo)
                                            Ativo
                                            @else
                                            Inativo
                                            @endif
                                        </td>
                                        <td class="text-center align-middle bg-transparent border-bottom">
                                            <a href="{{ route('companies.edit', $company) }}">
                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Tem certeza que deseja excluir esta empresa?');">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>

<script src="/assets/js/plugins/datatables.js"></script>
<script>
const dataTableBasic = new simpleDatatables.DataTable("#datatable-search", {
    searchable: true,
    fixedHeight: true,
    columns: [{
        select: [2, 6],
        sortable: false
    }]
});
</script>