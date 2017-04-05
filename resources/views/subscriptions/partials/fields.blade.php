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
    <div class="col-xs-12 col-sm-2 col-md-2 form-group">
    	{{ Form::label('num_voucher', 'Nº Documento') }}
    	{{ Form::text('num_voucher', null, ['class' => 'form-control text-center']) }}
    </div>
    {{-- Día Pago date field --}}
    <div class="col-xs-12 col-sm-2 col-md-2 form-group">
        {{ Form::label('payday', 'Día Pago') }}
        {{ Form::text('payday', null, ['class' => 'form-control text-center']) }}
    </div>
    {{-- Actividades select field --}}
    <div class="col-xs-12 col-sm-8 col-md-8 form-group">
        {{ Form::label('activities[]', 'Actividades') }}
        @if (Route::is('subscriptions.create'))
            {{ Form::select('activities[]', $activities, null, ['class' => 'form-control chosen-select', 'multiple', 'data-placeholder' => 'Seleccione Actividades...']) }}
        @else
            <select name="activities[]" class="form-control chosen-select" multiple>
                @foreach($activities as $activity)
                    <option value="{{ $activity->id }}" {{ $subscription->activities->contains($activity) ? 'selected' : '' }}>{{ $activity->name }}</option>
                @endforeach
            </select>
        @endif
    </div>
</div>
