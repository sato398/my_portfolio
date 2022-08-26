<!DOCTYPE html>
<html lang="ja">
<head>
    {{ $meta ?? '' }}

    @livewireStyles
</head>
<body id="page-top">
    {{ $header ?? '' }}

    {{ $content ?? '' }}

    {{ $footer ?? '' }}

    @livewireScripts

    {{ $bottom ?? '' }}

</body>
</html>
