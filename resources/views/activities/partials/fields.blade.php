<div class="row">
    {{-- Profesional select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('professional_id', 'Profesional') }}
    	{{ Form::select('professional_id', $professionals, null, ['class' => 'form-control']) }}
    </div>
    {{-- Nombre text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('name', 'Nombre') }}
    	{{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    {{-- Valor text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('amount', 'Valor') }}
    	{{ Form::text('amount', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    {{-- Desde date field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label("start_date", "Desde", ["class" => "control-label"]) }}
        <div id="startDate" class="input-group date">
            {{ Form::text("start_date", null, ["class" => "form-control text-center", "readonly"]) }}
            <div class="input-group-addon">
                <i class="mdi mdi-calendar"></i>
            </div>
        </div>
    </div>
    {{-- Hasta date field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label("end_date", "Hasta", ["class" => "control-label"]) }}
        <div id="endDate" class="input-group date">
            {{ Form::text("end_date", null, ["class" => "form-control text-center", "readonly"]) }}
            <div class="input-group-addon">
                <i class="mdi mdi-calendar"></i>
            </div>
        </div>
    </div>
</div>