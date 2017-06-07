<table class="table">
    <thead>
        <tr>
            <th>Actividad</th>
            <th>Profesional</th>
            <th class="text-center">Término</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
            <tr>
                <td>{{ $activity->name }}</td>
                <td>{{ $activity->professional->male_surname . ' ' . $activity->professional->first_name }}</td>
                <td class="text-center">
                    <span class="badge badge-success">{{ $activity->diff_end_date }}</span>
                </td>
                <td class="text-center">
                    <a href="{{ route('activities.show', $activity) }}">
                        <i class="mdi mdi-magnify mdi-18px text-info"></i>
                    </a>
                    <a href="{{ route('activities.edit', $activity) }}">
                        <i class="mdi mdi-pencil mdi-18px text-warning"></i>
                    </a>
                    <a href="javascript:void(0)" data-id="{{ $activity->id }}" class="btn-delete" data-url="{{ Request::path() }}" data-token="{{ csrf_token() }}">
                        <i class="mdi mdi-delete-empty mdi-18px text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>