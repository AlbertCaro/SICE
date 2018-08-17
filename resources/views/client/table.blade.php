<h4 class="info-title">{{ "Se ha(n) obtenido {$clients->total()} resultado(s)." }}</h4>
<table class="table">
    <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th>Clave secreta</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @forelse($clients as $client)
        <tr>
            @php
                setlocale(LC_TIME,'Spanish');
                \Carbon\Carbon::setUtf8(true);
            @endphp
            <td class="text-center">{{$client->id}}</td>
            <td class="text-center">{{$client->name}}</td>
            <td class="text-center">{{$client->secret }}</td>
            <td>
                <a href="{{ route('client.show', $client) }}">
                    <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-info btn-fab" title="Detalles del usuario">
                        <i class="material-icons">more_vert</i>
                    </button>
                </a>
                <a href="{{ route('client.edit', $client) }}">
                    <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-fab" title="Editar">
                        <i class="material-icons">edit</i>
                    </button>
                </a>
                <a href="#" onclick="confirmDelete(event, '{{ $client->name }}', '{{ route('client.destroy', $client) }}')">
                    <button type="button" class="btn btn-danger btn-fab" title="Eliminar">
                        <i class="material-icons">delete_forever</i>
                    </button>
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">
                No se han obtenido resultados de la búsqueda
            </td>
        </tr>
    @endforelse
    </tbody>
    <tfoot>
    <tr>
        <td class="text-center" colspan="3">
            {{ $clients->render('layouts.pagination') }}
        </td>
    </tr>
    </tfoot>
</table>