@component('mail::message')
# Bienvenido(a) {{ $user->name }}
Ya tienes acceso a la plataforma de <b>Corner-Studio</b>. Tus credenciales de acceso son las siguientes:
<br />
<br />
@component('mail::panel')
<b>Usuario:</b> {{ $user->email }}
<br />
<b>Contraseña:</b> {{ $password }}
@endcomponent
<br />
<br />
Te sugerimos que cambies la contraseña inmediatamente desde aquí
@component('mail::button', ['url' =>  getenv('APP_URL') . '/users/' . $user->id . '/edit'])
Cambiar password
@endcomponent
<br />
Saludos.
<br>
Equipo Controlqtime.
@component('mail::subcopy')
Si tiene problemas al hacer click en el botón, copie y pegue el siguiente enlace en su navegador
<a url="{{ '/login' }}" target="_blank">{{ getenv('APP_URL') . '/users/' . $user->id . '/edit' }}</a>
@endcomponent

@endcomponent
