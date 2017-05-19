<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Hora</th>
            </tr>
        </thead>
        <tbody>
        @foreach($assistances as $assistance)
            <tr>
                <td>{{ $assistance->client->full_name }}</td>
                <td class="text-center">{{ $assistance->date }}</td>
                <td class="text-center">{{ $assistance->hour }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>