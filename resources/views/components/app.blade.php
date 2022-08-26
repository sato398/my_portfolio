<!DOCTYPE html>
<html lang="ja">
<head>
    {{ $meta ?? '' }}

    @livewireStyles
</head>
<body>
    {{ $header ?? '' }}

    {{ $content ?? '' }}

    {{ $footer ?? '' }}

    @livewireScripts

    {{ $bottom ?? '' }}

</body>
</html>
