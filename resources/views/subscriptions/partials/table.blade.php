<table class="table">
    <thead>
        <tr>
            <th>Cliente</th>
            <th class="text-center">Rut</th>
            <th class="text-center">Término</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subscriptions as $subscription)
            <tr>
                <td>{{ $subscription->client->male_surname . ' ' . $subscription->client->first_name }}</td>
                <td class="text-center">{{ $subscription->client->rut }}</td>
                <td class="text-center">
                    <span class="badge badge-danger">{{ $subscription->end_date_diff_in_days }}</span>
                </td>
                <td class="text-center">
                    <span class="badge badge-primary">Vigente</span>
                </td>
                <td class="text-center">
                    <a href="{{ route('subscriptions.show', $subscription) }}">
                        <i class="mdi mdi-magnify mdi-18px text-info"></i>
                    </a>
                    <a href="{{ route('subscriptions.edit', $subscription) }}">
                        <i class="mdi mdi-pencil mdi-18px text-warning"></i>
                    </a>
                    <a href="javascript:void(0)" data-id="{{ $subscription->id }}" class="btn-delete" data-url="{{ Request::path() }}" data-token="{{ csrf_token() }}">
                        <i class="mdi mdi-delete mdi-18px text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>