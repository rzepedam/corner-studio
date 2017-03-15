<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Plan</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subscriptions as $subscription)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subscription->client->rut }}</td>
                <td>{{ $subscription->plan->name }}</td>
                <td class="text-center">
                    <span class="badge badge-primary">Vigente</span>
                </td>
                <td class="text-center">
                    <a href="javascript:void(0)">
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