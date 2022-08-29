
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Gentilo : {{$user->name}},</p>
    <p>Sono strafelice di informarla che il suo post "<strong>{{$post->title}}</strong>"  è stato creato correttamente</p>

    <p>per visualizzare il suo post e compiere eventuali modifche, clicche sul link sottastante: </p>
    <div><a href="{{route('admin.posts.show', $post->slug)}}">Vai al mio post!!</a></div>
    <h1>Il tuo post è stato creto con successo!!</h1>
</body>
</html>
