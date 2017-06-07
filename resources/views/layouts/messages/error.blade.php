<div class="clearfix">
	<div class="col-xs-12 col-sm-12 col-md-12 alert alert-danger hide" role="alert" id="js"></div>
</div>

@if (Session::has('error'))
	<div class="clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 alert alert-danger" role="alert">{!! Session::get('error') !!}</div>
	</div>
@endif