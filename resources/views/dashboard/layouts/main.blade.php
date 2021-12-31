<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>RITE | {{ $title }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/admin/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/admin/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="/admin/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="/admin/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="/admin/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/admin/modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="/admin/modules/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="/admin/modules/jquery-selectric/selectric.css">

    {{-- icons --}}
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Template CSS -->
    <link rel="stylesheet" href="/admin/css/style.css">
    <link rel="stylesheet" href="/admin/css/components.css">
    <link rel="stylesheet" href="/admin/css/custom.css">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('dashboard.partials.header')

            @include('dashboard.partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('container')
            </div>

            @include('dashboard.partials.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="/admin/modules/jquery.min.js"></script>
    <script src="/admin/modules/popper.js"></script>
    <script src="/admin/modules/tooltip.js"></script>
    <script src="/admin/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/admin/modules/moment.min.js"></script>
    <script src="/admin/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="/admin/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="/admin/modules/chart.min.js"></script>
    <script src="/admin/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/admin/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/admin/modules/summernote/summernote-bs4.js"></script>
    <script src="/admin/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="/admin/modules/codemirror/lib/codemirror.js"></script>
    <script src="/admin/modules/codemirror/mode/javascript/javascript.js"></script>
    <script src="/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="/admin/js/page/index-0.js"></script>

    <!-- Template JS File -->
    <script src="/admin/js/scripts.js"></script>
    <script src="/admin/js/custom.js"></script>

    <script>
        // handling auto slug
        const title = document.querySelector('#title'),
            slug = document.querySelector('#slug');

        title.addEventListener('keyup', () => {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        // showing added image file name
        const inputFile = document.querySelector('.custom-file-input');

        inputFile.addEventListener('change', () => {
            const img = inputFile.files[0].name;
            const imgName = inputFile.nextElementSibling;
            imgName.textContent = img;
        })

        // handling preview image
        function previewImage() {
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            // get file data
            const oFReader = new FileReader();
            oFReader.readAsDataURL(inputFile.files[0]);

            oFReader.onload = function(oFReader) {
                imgPreview.src = oFReader.target.result;
            }
        }
    </script>
</body>

</html>
