<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>

<!-- CSS + JAVASCRIPT + CALLER -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Oswald&family=Ovo&display=swap" rel="stylesheet" />
<!-- Styles -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- Bootstrap Font Icon CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<!-- Scripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<style>
    body {
        font-family: "Ovo", serif;
        font-size: 14px;
        color: #171717;
        background: #e8eaec;
    }

    .font-atas {
        color: #dcdcdc;
        font-size: 18px;
        position: relative;
        top: 20px;
        margin-left: 15px;
    }

    .navi {
        background-color: white;
        border-radius: 10px;
        align-content: center;
        width: 90%;
        height: 120px;
        text-align: center;
        padding-top: 10px;
        margin-top: 20px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 8px 18px;
    }

    .warna {
        background-color: white;
        height: 210px;
        width: 90%;
    }

    .backnavi {
        background-color: #4527a0;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        height: 130px;
        width: 100%;
    }

    .image-icons {
        width: 40px;
        height: 40px;
    }

    .text-atas {
        font-size: 14px;
        color: grey;
    }

    .verif {
        background-color: #00CC66;
        border-inline: none;
        border-block: none;
        height: 40px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        width: 100%;
        text-align: left;
        font-weight: bold;
        font-size: 13px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name', 'Kopkar JIM') }}
            </a>
            <a href="{{ route('profil.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </a>

        </div>
    </nav>

    <main>
        @yield('content')
    </main>


    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>