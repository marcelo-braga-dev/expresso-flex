@component('mail::message')

    <p>Olá, {{ $nomeUsuario }}.</p>
    <p>Sua conta na plataforma Expresso Flex App foi criada com sucesso.</p>
    <p>A partir de agora, você pode aproveitar todos os benefícios e agilidade para realizar suas as
        entregas das suas encomendas.</p>
    <p>Clique no link para criar sua senha: <a href="{{ $link }}">https://expressoflex.com</a></p>
    <p>Caso você tenha alguma dúvida, entre em contato com o suporte.</p>
    <p>Att. Expresso Flex.</p>

@endcomponent
