<div class="row">
    {{-- Apellido Paterno text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno') }}
        {{ Form::text('male_surname', null, ['class' => 'form-control']) }}
    </div>
    {{-- Apellido Materno text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('female_surname', 'Apellido Materno') }}
        {{ Form::text('female_surname', null, ['class' => 'form-control']) }}
    </div>
    {{-- Primer Nombre text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('first_name', 'Primer Nombre') }}
        {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    {{-- Segundo Nombre text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('second_name', 'Segundo Nombre') }}
        {{ Form::text('second_name', null, ['class' => 'form-control']) }}
    </div>
    {{-- Rut text field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('rut', 'Rut') }}
        {{ Form::text('rut', null, ['class' => 'form-control']) }}
    </div>
    {{-- Fecha Nacimiento date field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label("birthday", "Fecha Nacimiento", ["class" => "control-label"]) }}
        <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date("d-m-Y") }}">
            {{ Form::text("birthday", null, ["class" => "form-control text-center", "readonly"]) }}
            <div class="input-group-addon">
                <i class="mdi mdi-calendar"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    {{-- Estado Civil select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
        {{ Form::label('marital_status_id', 'Estado Civil') }}
        {{ Form::select('marital_status_id', $maritalStatuses, null, ['class' => 'form-control']) }}
    </div>
    {{-- Sexo radio field --}}
    <div class="col-xs-12 col-sm-4 col-md-3 form-group margin-0">
    	{{ Form::label('is_male', 'Sexo') }}
    	<ul class="list-unstyled list-inline text-center">
    	    <li>
    	        <div class="radio-custom radio-primary">
    	        	<input type="radio" id="male" name="is_male" value="0" />
    	            <label for="male">Masculino</label>
    	        </div>
    	    </li>
    	    <li></li>
    	    <li>
    	        <div class="radio-custom radio-primary">
    	            <input type="radio" id="female" name="is_male" value="1" />
    	            <label for="female">Femenino</label>
    	        </div>
    	    </li>
    	</ul>
    </div>
</div>
<div class="row">
    {{-- Dirección text field --}}
    <div class="col-xs-12 col-sm-6 col-md-6 form-group">
    	{{ Form::label('address', 'Dirección') }}
    	{{ Form::text('address', null, ['class' => 'form-control']) }}
    </div>
    {{-- Depto text field --}}
    <div class="col-xs-12 col-sm-3 col-md-3 form-group">
    	{{ Form::label('depto', 'Depto') }}
    	{{ Form::text('depto', null, ['class' => 'form-control']) }}
    </div>
    {{-- Block text field --}}
    <div class="col-xs-12 col-sm-3 col-md-3 form-group">
    	{{ Form::label('block', 'Block') }}
    	{{ Form::text('block', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    {{-- Región select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('region_id', 'Región') }}
    	{{ Form::select('region_id', $regions, null, ['class' => 'form-control']) }}
    </div>
    {{-- Provincia select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('province_id', 'Provincia') }}
    	{{ Form::select('province_id', [0 => 'Seleccione Provincia...'], null, ['class' => 'form-control']) }}
    </div>
    {{-- Comuna select field --}}
    <div class="col-xs-12 col-sm-4 col-md-4 form-group">
    	{{ Form::label('commune_id', 'Comuna') }}
    	{{ Form::select('commune_id', [0 => 'Seleccione Comuna...'], null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    {{-- Email text field --}}
    <div class="col-xs-12 col-sm-6 col-md-6 form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>
    {{-- Teléfono 1 text field --}}
    <div class="col-xs-12 col-sm-3 col-md-3 form-group">
    	{{ Form::label('phone1', 'Teléfono 1') }}
    	{{ Form::text('phone1', null, ['class' => 'form-control']) }}
    </div>
    {{-- Teléfono 2 text field --}}
    <div class="col-xs-12 col-sm-3 col-md-3 form-group">
    	{{ Form::label('phone2', 'Teléfono 2') }}
    	{{ Form::text('phone2', null, ['class' => 'form-control']) }}
    </div>
</div>