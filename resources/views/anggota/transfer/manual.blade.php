<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name', 'Kopkar JIM') }}
            </a>
            <a href="{{ route('logout') }}">
                <i class="bi bi-person-circle"></i>
            </a>

        </div>
    </nav>

    <div class="container">
        <div class="element-heading mt-3">
            <h6 class="text-center">
                <label class="text-info">Transfer Saldo Manual</label>
            </h6>
            <h6 class="text-center">
                Your Balance <label class="text-primary">@rupiah(Auth::user()->saldo)</label>
            </h6>
        </div>


        <div class="card">
            <div class="card-body">
                <h6>Silahkan isi sesuai kebutuhan!</h6>
                <form action="{{ route('anggota.transfer.simpanManualTransfer') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <input class="typeahead form-control" id="search" type="text" name="nama_penerima" placeholder="Cari Anggota..." required>
                    </div>
                    <div class="input-group mb-3">
                        <input class="typeahead form-control" id="no_anggota" type="text" name="no_anggota" placeholder="No Anggota" readonly>
                        <input class="typeahead form-control" id="saldo" type="text" name="saldoPenerima" placeholder="Saldo" readonly>
                    </div>
                    <input id="anggotaID" type="hidden" name="anggota_id">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="nominal_transfer" min="1000" max="{{Auth::user()->saldo}}" placeholder="Masukan Nominal Transfer" required>
                    </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-sm btn-primary" type="submit">Top Up Sekarang
            </button>
            <a class="btn btn-sm btn-warning" href="{{route('home')}}" role="button">Batal</a>
        </div>
    </div>

    <script type="text/javascript">
        var path = "{{ route('anggota.transfer.fetch') }}";

        $("#search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#search').val(ui.item.label);
                $('#anggotaID').val(ui.item.id);
                $('#no_anggota').val(ui.item.no_anggota);
                $('#saldo').val(ui.item.saldo);
                console.log(ui.item);
                return false;
            }
        });
    </script>
</body>

</html>