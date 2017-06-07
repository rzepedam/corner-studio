<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th class="text-center">Email</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @php ($i = 0)
        @foreach($users as $user)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td class="text-center">{{ $user->email }}</td>
                <td class="text-center">
                    <a href="javascript:void(0)" data-id="{{ $user->id }}" class="btn-delete waves" data-url="{{ Request::path() }}" data-token="{{ csrf_token() }}">
                        <i class="mdi mdi-delete-empty mdi-18px text-danger"></i>
                    </a>
                </td>
            </tr>
            @php ($i ++)
        @endforeach
        </tbody>
    </table>
</div>