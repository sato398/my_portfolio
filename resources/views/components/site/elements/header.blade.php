@php
    // $isWhite = $key === 'site.skil';
@endphp

<header>
    <nav class="navbar navbar-light navbar-expand-md py-3 fixed-top">
        <div class="container justify-content-center navber-inner">
            <a class="navbar-brand d-flex align-items-center hover-action" href="{{ route('top') }}">
                <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg> --}}
                    <svg version="1.1" id="レイヤー_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve">
                        <g>
                            <path class="st0" d="M81.78,57.74c-3.29,20.55-23.15,46.44-40.69,46.44c-9.18,0-14.79-5.48-14.79-14.93
                                c0-19.32,26.03-38.36,48.91-38.63c-0.14-4.38-1.1-6.3-1.78-7.53c-0.55-0.82-0.82-1.64-0.82-2.19c0-1.64,1.51-3.01,3.29-3.01
                                c3.15,0,6.3,4.66,6.44,13.7c9.18,2.47,15.21,10.41,15.21,20.41c0,6.44-1.37,12.74-2.88,17.26c12.47-15.89,34.52-38.91,53.56-38.91
                                c11.23,0,17.81,6.99,17.81,17.26c0,23.97-35.07,54.66-35.07,76.85c0,7.53,4.11,11.78,9.59,11.78c8.63,0,19.32-12.19,28.08-25.75
                                c0.68-1.1,1.51-1.51,2.33-1.51c1.51,0,2.74,1.23,2.74,2.74c0,0.55-0.14,1.23-0.55,1.92c-9.45,14.66-20.82,28.36-33.7,28.36
                                c-9.32,0-16.44-6.3-16.44-17.67c0-24.11,35.21-54.93,35.21-77.13c0-7.12-3.97-10.82-10.69-10.82c-13.56,0-33.02,18.77-47.4,36.3
                                c-7.4,9.04-11.78,15.48-17.26,26.71c-5.89,11.92-13.7,29.32-17.4,37.95c-1.37,3.01-3.15,4.79-4.93,4.79
                                c-2.47,0-3.97-1.64-3.97-3.97c0-4.79,4.25-13.56,12.33-26.58c2.05-3.97,8.77-17.81,13.15-29.32C87.53,88.01,90,78.42,90,71.85
                                C90,64.72,86.99,59.79,81.78,57.74z M74.79,56.5c-19.45,0.27-41.23,16.58-41.23,33.29c0,5.34,2.88,8.49,7.67,8.49
                                C55.61,98.29,72.05,74.31,74.79,56.5z"
                            />
                        </g>
                    </svg>
                </span>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav">
                    <li class="nav-item"><a @class([
                        "nav-link",
                        ]) href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a @class([
                        "nav-link",
                        ]) href="{{ route('skil') }}">Skils</a></li>
                    <li class="nav-item"><a @class([
                        "nav-link",
                        ]) href="{{ route('work') }}">Works</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
