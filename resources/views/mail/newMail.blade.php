@component('mail::message')
    <p>Gentile : {{ $user->name }},</p>
    <p>Sono strafelice di informarla che il suo post "<strong>{{ $post->title }}</strong>" è stato creato correttamente</p>

    <p>per visualizzare il suo post e compiere eventuali modifche, clicche sul link sottastante: </p>

    <img src="{{ Storage::url($post->cover_img) }}" alt="">
    @component('mail::button', ['url' => route('admin.posts.show', $post->slug)])
        Vai al mio post!!
    @endcomponent

    Thanks,<br>
    BOOLPOST

    <h1>Il tuo post è stato creto con successo!!</h1>
@endcomponent