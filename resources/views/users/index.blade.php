<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="px-5 py-4 container-fluid">
            <div class="mt-1 row">
                <div class="col-12">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="">Gestão de Usuários</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('users.create') }}" class="btn btn-dark btn-primary">
                                        <i class="fas fa-user-plus me-2"></i>Adicionar
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
                                            class="text-left text-uppercase  font-weight-bold bg-transparent border-bottom text-secondary">
                                        </th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            ID</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Name</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Telefone</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Tipo</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Ativo</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="align-middle bg-transparent border-bottom">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="../assets/img/marie.jpg" class="rounded-circle mr-2"
                                                    alt="user5" style="height: 36px; width: 36px;">
                                            </div>
                                        </td>
                                        <td class="align-middle bg-transparent border-bottom">{{ $user->id }}</td>
                                        <td class="align-middle bg-transparent border-bottom">{{ $user->name }}</td>
                                        <td class="align-middle bg-transparent border-bottom">{{ $user->email }}</td>
                                        <td class="text-center align-middle bg-transparent border-bottom">
                                            {{ $user->phone }}</td>
                                        <td class="text-center align-middle bg-transparent border-bottom">
                                            {{ $user->user_type }}</td>

                                        <td class="text-center align-middle bg-transparent border-bottom">
                                            @if($user->active)
                                                Ativo
                                            @else
                                                Inativo
                                            @endif
                                        </td>

                                        <td class="text-center align-middle bg-transparent border-bottom">
                                            <a href="#"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fas fa-trash" aria-hidden="true"></i></a>
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