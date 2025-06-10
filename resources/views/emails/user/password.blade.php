@component('mail::message')
# Bem-vindo {{ $user->name }}!

A sua conta foi criada com sucesso.

Aqui está a sua palavra-passe de acesso:

@component('mail::panel')
{{ $password }}
@endcomponent

Por favor, faça login e altere a senha logo que possível.

@endcomponent