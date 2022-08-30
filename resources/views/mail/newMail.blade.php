@component('mail::message')
    <p>Gentile : {{ $user->name }},</p>
    Sono strafelice di informarla che il suo post <strong>{{$post->title}}</strong>, è stato creato correttamente!!

    <img src="{{ Storage::url($post->cover_img) }}" alt="">

    Per acedere al suo post premere il tasto qui sotto:
    @component('mail::button', ['url' => route('admin.posts.show', $post->slug)])
        Vai al mio post!!
    @endcomponent
    Thanks,<br>
    BOOLPOST
@endcomponent