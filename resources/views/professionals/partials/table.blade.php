<table class="table">
    <thead>
        <tr>
            <th>Profesional</th>
            <th class="text-center">Rut</th>
            <th class="text-center">Email</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($professionals as $professional)
            <tr>
                <td>{{ $professional->male_surname . ' ' . $professional->first_name }}</td>
                <td class="text-center">{{ $professional->rut }}</td>
                <td class="text-center">{{ $professional->email }}</td>
                <td class="text-center">
                    <a href="{{ route('professionals.show', $professional) }}">
                        <i class="mdi mdi-magnify mdi-18px text-info"></i>
                    </a>
                    <a href="{{ route('professionals.edit', $professional) }}">
                        <i class="mdi mdi-pencil mdi-18px text-warning"></i>
                    </a>
                    <a href="javascript:void(0)" data-id="{{ $professional->id }}" class="btn-delete" data-url="{{ Request::path() }}" data-token="{{ csrf_token() }}">
                        <i class="mdi mdi-delete-empty mdi-18px text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>