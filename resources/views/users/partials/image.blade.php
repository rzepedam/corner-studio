<div class="col-sm-offset-1 col-md-offset-2 col-xs-12 col-sm-10 col-md-8 form-group">
    <div class="image-crop">
        <img src="{{ asset($user->avatar) }}" style="width: 100%">
    </div>
</div>
<div class="col-sm-offset-1 col-md-offset-2 col-xs-12 col-sm-10 col-md-8 text-center form-group">
    <div class="btn-group">
        <label title="Upload image file" for="inputImage" class="btn btn-outline btn-primary">
            <input type="file" accept="image/*" name="file" id="inputImage" class="hide"> Seleccionar imagen
        </label>
    </div>
    <button type="submit" class="btn btn-success "><i class="fa fa-check-circle-o" aria-hidden="true"></i> Listo</button>
</div>
<div class="col-xs-offset-3 col-sm-offset-2 col-md-offset-4 col-xs-6 col-sm-8 col-md-4 text-center form-group">
    <div class="img-preview img-preview-sm"></div>
</div>
{{ Form::hidden('x', '', ['id' => 'x']) }}
{{ Form::hidden('y', '', ['id' => 'y']) }}
{{ Form::hidden('w', '', ['id' => 'w']) }}
{{ Form::hidden('h', '', ['id' => 'h']) }}