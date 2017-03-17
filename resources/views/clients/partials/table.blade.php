<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Rut</th>
            <th class="text-center">Email</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $client->male_surname . ' ' . $client->first_name }}</td>
                <td>{{ $client->rut }}</td>
                <td class="text-center">{{ $client->email }}</td>
                <td class="text-center">
                    <a href="{{ route('clients.show', $client) }}">
                        <i class="mdi mdi-magnify mdi-18px text-info"></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="mdi mdi-pencil mdi-18px text-warning"></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="mdi mdi-delete mdi-18px text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>