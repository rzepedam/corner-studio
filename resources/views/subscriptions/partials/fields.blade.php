<div class="row">
    {{-- Cliente select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('client_id', 'Cliente') }}
    	{{ Form::select('client_id', $clients, null, ['class' => 'form-control']) }}
    </div>
    {{-- Método Pago select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('payment_id', 'Método Pago') }}
    	{{ Form::select('payment_id', $payments, null, ['class' => 'form-control']) }}
    </div>
    {{-- Término date field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label("end_date", "Término", ["class" => "control-label"]) }}
        <div class="input-group date">
            {{ Form::text("end_date", null, ["class" => "form-control text-center", "readonly" ]) }}
            <div class="input-group-addon">
                <i class="mdi mdi-calendar"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    {{-- Nº Documento text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('num_voucher', 'Nº Documento') }}
    	{{ Form::text('num_voucher', null, ['class' => 'form-control']) }}
    </div>
    {{-- Día Pago date field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('payday', 'Día Pago') }}
        {{ Form::text('payday', null, ['class' => 'form-control text-center']) }}
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="row">
    {{-- Actividades select field --}}
    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
    	{{ Form::label('activities[]', 'Actividades') }}
    	{{ Form::select('activities[]', $activities, null, ['class' => 'form-control chosen-select', 'multiple', 'data-placeholder' => 'Seleccione Actividades...']) }}
    </div>
</div>
