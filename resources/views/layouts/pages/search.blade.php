{{ Form::open(['url' => $url, 'method' => 'GET', 'role' => 'search']) }}
    <div class="col-sm-6 col-md-4 input-group pull-right">
        {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search...']) }}
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><i class="mdi mdi-magnify"></i></button>
        </span>
    </div>
{{ Form::close() }}
<a href="{{ route($url . '.create') }}" class="btn btn-primary">
    <i class="fa fa-plus-circle"></i> Crear @lang('messages.' . str_singular($url))
</a>