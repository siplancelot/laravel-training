<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data CRUD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <h1>Tampilan Data Dummy CRUD</h1>

    <br>
    <a href="{{ route('add-data') }}">Tambah Data</a>
    <br>
    <br>
    <table border="1px">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Makanan</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataDummy as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->kategori }}</td>
                    <td>Rp {{ $a->harga }}</td>
                    <td>
                        <a href="{{ route("update-data", $a->id) }}">Ubah</a> | 
                        <a class="btn-delete" href="#">
                          <input type="hidden" class="hdnMakananID" value="{{ $a->id }}">
                          Hapus</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).on("click", ".btn-delete", function () {
            if (confirm("Apakah Anda ingin menghapus data ini?")) {
                
                var ID = $(this).find(".hdnMakananID").val();

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{ route('data-delete') }}",
                    type: "POST",
                    data: {
                        '_method': "DELETE",
                        '_token': csrfToken,
                        'id' : ID
                    },
                    success: function (data) {
                        alert("Data Berhasil Dihapus");
                        location.reload();
                    },
                    error: function (data) {
                        console.log("Gagal menghapus data");
                    }
                });
            }

        });

    </script>

</body>

</html>
