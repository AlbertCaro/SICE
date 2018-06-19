<h5 class="info-title">{{ "Se ha(n) obtenido {$users->total()} resultado(s)." }}</h5>
<table class="table">
    <thead>
    <tr>
        <th class="text-center">Nombre</th>
        <th>Correo electrónico</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @forelse($users as $user)
        <tr>
            @php
                setlocale(LC_TIME,'Spanish');
                \Carbon\Carbon::setUtf8(true);
            @endphp
            <td class="text-center">{{$user->name}}</td>
            <td class="text-center">{{$user->email}}</td>
            <td>
                <a href="{{ route('user.show', $user->id) }}">
                    <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-info btn-fab" title="Detalles del usuario">
                        <i class="material-icons">more_vert</i>
                    </button>
                </a>
                <a href="{{ route('user.edit', $user->id) }}">
                    <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-fab" title="Editar">
                        <i class="material-icons">edit</i>
                    </button>
                </a>
                <a href="#" onclick="confirmDelete(event, '{{ $user->name }}', '{{ route('user.destroy', $user->id) }}')">
                    <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-fab" title="Eliminar">
                        <i class="material-icons">delete_forever</i>
                    </button>
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">
                No se ha(n) obtenido resultados de la búsqueda
            </td>
        </tr>
    @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                {{ $users->links('layouts.pagination') }}
            </td>
        </tr>
    </tfoot>
</table>