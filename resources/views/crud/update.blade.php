<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Update Data</title>
</head>

<body>

    <h1>Ubah Data</h1>

    <form action="#" id="formUpdateData">
        <input type="hidden" id="hdnMakananID" value="{{$data->id}}">
        <div>
            <label for="">Nama Makanan</label> :
            <input type="text" id="nama" placeholder="masukkan makanan" value="{{$data->nama}}">
        </div>
        <br>
        <div>
            <label for="">Kategori</label> :
            <select name="" id="kategori">
                <option value="">--pilih kategori--</option>
                <option value="Makanan Ringan" @if ($data->kategori == "Makanan Ringan")
                    selected
                @endif  >Makanan Ringan</option>
                <option value="Makanan Berat" @if ($data->kategori == "Makanan Berat")
                    selected
                @endif  >Makanan Berat</option>
            </select>
        </div>
        <br>
        <div>
            <label for="">Harga</label> :
            <input type="number" id="harga" placeholder="masukkan harga" value="{{$data->harga}}">
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

            $("#formUpdateData").submit(function (e) {
                e.preventDefault();

                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                
                var id = $(this).find("#hdnMakananID").val();
                var nama = $(this).find("#nama").val();
                var kategori = $(this).find("#kategori").val();
                var harga = $(this).find("#harga").val();

                
                $.ajax({
                  url: "{{ route('data-edit') }}",
                  type: "POST",
                  data: {
                      '_method': "PATCH",
                      '_token': csrfToken,
                      'id': id,
                      'nama': nama,
                      'kategori': kategori,
                      'harga': harga,
                  },
                  success: function(response) {
                      alert("Data Berhasil Diubah");
                      
                  },
                  error: function(xhr, status, error) {        
                      console.error("Error saving data:", xhr.responseText);
                      alert("Failed to update data. Please try again.");
                  }
              });
            })

        });

    </script>
</body>

</html>
