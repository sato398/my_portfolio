@php
    $title = App\Seo\Title::get($key);
    $description = App\Seo\Description::get($key);
    $canonical = App\Seo\Canonical::get($key);
    $ogp = App\Seo\Ogp::get($key);
    $icons = \App\Seo\Icons::get();
@endphp


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>{{ $title['title'] ?? '' }}</title>
@if ($description)
    <meta name="description" content="{{ $description }}">
@endif

@if ($canonical)
    <link rel="canonical" href="{{ $canonical }}">
@endif

@if ($icons)
    {!! $icons !!}
@endif

<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic&amp;display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
<link rel="stylesheet" href="/assets/css/Navbar-Right-Links-icons.css">
<link rel="stylesheet" href="https://use.typekit.net/czf3wxx.css">
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

{!! $ogp !!}
