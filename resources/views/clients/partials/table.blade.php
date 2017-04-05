<table class="table">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Rut</th>
            <th class="text-center">Email</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->male_surname . ' ' . $client->first_name }}</td>
                <td>{{ $client->rut }}</td>
                <td class="text-center">{{ $client->email }}</td>
                <td class="text-center">
                    <a href="{{ route('clients.show', $client) }}">
                        <i class="mdi mdi-magnify mdi-18px text-info"></i>
                    </a>
                    <a href="{{ route('clients.edit', $client->id) }}">
                        <i class="mdi mdi-pencil mdi-18px text-warning"></i>
                    </a>
                    <a href="javascript:void(0)" data-id="{{ $client->id }}" class="btn-delete" data-url="{{ Request::path() }}" data-token="{{ csrf_token() }}">
                        <i class="mdi mdi-delete mdi-18px text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>