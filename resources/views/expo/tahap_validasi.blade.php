<html>
<head>
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="card" style="width: 500px;margin: auto; top: 10%;">
    <div class="card-body" action="{{route('post_pembayaran')}}" method="POST" enctype="multipart/form-data">
        Akun anda masih dalam tahap Validasi pembayaran oleh Admin kami, Mohon cek kembali nanti, Terima kasih.
        <div style="margin-top: 10px">
            <a class="btn btn-primary" href="{{ url()->previous() }}">Kembali</a>
        </div>
    </div>
</div>
</body>
</html>
