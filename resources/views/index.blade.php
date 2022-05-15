<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nefy.dev">
    <title>Simple Text Tool</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>

<body>
    <section class="nf-simpletext-section">
        <div class="container">
            <div class="row align-items-center justify-content-around pb-5">
                <div class="col-lg-9 text-center">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Image">
                    <p class="description">Text converter built with Laravel Livewire</p>
                    <p class="category"><span class="badge rounded-pill bg-info">Laravel</span></p>
                </div>
            </div>
            @livewire('tool')
        </div>
        <div class="nf-simpletext-copy-alert position-fixed p-3">
            <div class="toast bg-info" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2500" id="copyAlert">
                <div class="toast-body">
                    <strong class="me-auto text-white"><i class="fa-solid fa-circle-check me-2"></i> Text copied to clipboard</strong>
                </div>
            </div>
        </div>
    </section>

    <footer class="nf-simpletext-footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="links">
                        <p>Made with ❤️ by <a class="p-0" href="https://nefy.dev" target="_blank">nefy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
    <script>
        function copyToClipboard(id) {
            let text = document.getElementById(id).innerHTML;
            if (navigator.clipboard) {
                navigator.clipboard
                    .writeText(text)
                    .then(function() {
                        $("#copyAlert").toast("show");
                    });
            }
        }

    </script>
</body>
</html>

