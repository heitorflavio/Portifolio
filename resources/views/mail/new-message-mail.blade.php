<x-mail::message>
# Nova mensagem recebida

Você recebeu uma nova mensagem de {{ $data->name }} ({{ $data->email }}).

<x-mail::button :url="route('messages.index')">
Ver Mensagem
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
