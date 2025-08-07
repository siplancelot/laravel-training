<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tambah Data</title>
</head>

<body>

    <h1>Tambah Data</h1>


    <form action="#" id="formAddData">
        <div>
            <label for="">Nama Makanan</label> :
            <input type="text" id="nama" placeholder="masukkan makanan">
        </div>
        <br>
        <div>
            <label for="">Kategori</label> :
            <select name="" id="kategori">
                <option value="">--pilih kategori--</option>
                <option value="Makanan Ringan">Makanan Ringan</option>
                <option value="Makanan Berat">Makanan Berat</option>
            </select>
        </div>
        <br>
        <div>
            <label for="">Harga</label> :
            <input type="number" id="harga" placeholder="masukkan harga">
        </div>
        <br>
        <div>
            <input type="submit" value="Simpan">
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            $("#formAddData").submit(function (e) {
                e.preventDefault();

                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                
                var nama = $(this).find("#nama").val();
                var kategori = $(this).find("#kategori").val();
                var harga = $(this).find("#harga").val();

                $.ajax({
                  url: "{{ route('data-store') }}",
                  type: "POST",
                  data: {
                      '_token': csrfToken,
                      'nama': nama,
                      'kategori': kategori,
                      'harga': harga,
                  },
                  success: function(response) {
                      alert("Data Berhasil Ditambahkan");
                      
                  },
                  error: function(xhr, status, error) {        
                      console.error("Error saving data:", xhr.responseText);
                      alert("Failed to save data. Please try again.");
                  }
              });
            })

        });

    </script>
</body>

</html>
