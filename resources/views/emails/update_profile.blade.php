@component('mail::message')
# {{ $user->name }}
Te informamos que tu perfil ha sido actualizado satisfactoriamente.
<br />
<br />
Saludos.
<br>
Equipo Controlqtime.
@component('mail::subcopy')
Si no ha hecho esta modificación, le sugerimos informarnos de esta situación.
@endcomponent

@endcomponent