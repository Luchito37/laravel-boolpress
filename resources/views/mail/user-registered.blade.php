@component('mail::message')
gentile <strong>{{$user->name}}</strong>

Siamo lieti di darle il benvenuto

Per acceere al suo account, può cliccare sul link sottostante :


@component('mail::button', ['url' => route("login")])
Accedi
@endcomponent

CORDIALI SALUTI <br>
BOOLIST
@endcomponent
