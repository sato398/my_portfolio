<!DOCTYPE html>
<html lang="ja">
<head>
    {{ $meta ?? '' }}

    @livewireStyles
</head>
<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
    {{ $header ?? '' }}

    {{ $content ?? '' }}

    {{ $footer ?? '' }}

    @livewireScripts

    {{ $bottom ?? '' }}

</body>
</html>
