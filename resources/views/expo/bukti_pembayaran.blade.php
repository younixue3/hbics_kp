<html>
<head>
<title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
@if($user->bukti_pembayaran != null)
    <div class="card mb-5" style="width: 500px;margin: auto; top: 10%;">
        <div class="card-body" action="{{route('post_pembayaran')}}" method="POST" enctype="multipart/form-data">
            Akun anda masih dalam tahap Validasi pembayaran oleh Admin kami, Mohon cek kembali nanti, Terima kasih.
            <div style="margin-top: 10px">
                <a class="btn btn-primary" href="{{ url()->previous() }}">Kembali</a>
            </div>
        </div>
    </div>
@endif
<div class="card" style="width: 500px;margin: auto; top: 10%;">
    <form class="card-body" action="{{route('post_pembayaran')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Masukkan bukti pembayaran</label>
            <div class="my-5">
                <h3 class="text-center">Struk pembayaran</h3>
                <table class="table" style="background-color: #e0e0e0">
                    <thead>
                    <tr>
                        <th>Jumlah peserta</th>
                        <th></th>
                        <th>Harga satuan</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{ $user->anggota->count() }}
                        </td>
                        <td> x </td>
                        <td>Rp. 300,000</td>
                        <td>Rp. {{ $total_harga  }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <input class="form-control" type="file" name="bukti_pembayaran" />
        </div>
        <img id="myImg" src="{{$user->bukti_pembayaran != null ? asset('Upload/paidbill/'. $user->bukti_pembayaran) : '#'}}" alt="your image" style="height: 500px;width: 400px; object-fit: cover;">
        <input type="submit" class="btn btn-success" style="margin-top: 10px">
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
        window.addEventListener('load', function() {
            document.querySelector('input[type="file"]').addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    var img = document.getElementById('myImg');
                    img.onload = () => {
                        URL.revokeObjectURL(img.src);  // no longer needed, free memory
                    }

                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                }
            });
        });
</script>
</body>
</html>
