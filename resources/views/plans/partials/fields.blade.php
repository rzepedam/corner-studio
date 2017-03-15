<div class="row">
    {{-- Nombre text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('name', 'Nombre') }}
    	{{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    {{-- Monto text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('amount', 'Monto') }}
    	{{ Form::text('amount', null, ['class' => 'form-control']) }}
    </div>
</div>