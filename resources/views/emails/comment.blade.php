@component('mail::message')

Olá, {{ $post->user->name }} o usuário {{ $user->name}} comentou em seu post <b>{{ $post->title }}</b>

@component('mail::button', ['url' => $url])
    Visitar post
@endcomponent

@endcomponent
