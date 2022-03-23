<body>
    <b>test mail</b><br/>
    <b>user name: {{ $user->name }}</b><br/>
    <b>email to: {{ $user->email }}</b><br/>
    <img src="{{ $message->embed($user->url_avatar) }}">
{{--    <img src="{{ $message->embedData($image64, 'test_image.jpeg') }}">--}}
</body>
