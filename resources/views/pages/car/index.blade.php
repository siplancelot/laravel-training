@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cars</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Cars</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cars List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAdd">
                            Add Data
                        </button>
                        <table class="myTable table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Capacity</th>
                                    <th>Price/day</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="carTableBody">
                                 @foreach($cars as $item)
                                    <tr class="item-content">
                                        <td>
                                            {{ $loop->iteration }}
                                            <input type="hidden" class="hdnCarID" value="{{ $item->id }}">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->category_name}}</td>
                                        <td>{{ $item->capacity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td class="text-center">
                                            
                                            <div class="btn btn-success btn-edit" data-toggle="modal"
                                                data-target="#modalEdit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </div>
                                            <div class="btn btn-danger btn-delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


{{-- Modal Tambah Data --}}
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="modalAddLabel">Add Data</h2>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form id="formAddCar" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Car Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Car Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Car Category</label>
                                <select name="car_category_id" id="car_category_id" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Capacity</label>
                                <input type="number" class="form-control" name="capacity" id="capacity"
                                    placeholder="Enter Capacity">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Price/day</label>
                                <input type="number" class="form-control" name="price" id="price"
                                    placeholder="Enter Price/day">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCloseModalAdd" class="btn btn-secondary"
                        data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- Modal Edit Data --}}
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="modalEditLabel">Edit Data</h2>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form id="formEditCar" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cars Name</label>
                                <input type="hidden" id="hdnCarID" value="">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Car Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Car Category</label>
                                <select name="car_category_id" id="car_category_id" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Capacity</label>
                                <input type="number" class="form-control" name="capacity" id="capacity"
                                    placeholder="Enter Capacity">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Price/day</label>
                                <input type="number" class="form-control" name="price" id="price"
                                    placeholder="Enter Price/day">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCloseModalEdit" class="btn btn-secondary"
                        data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $("#formAddCar").submit(function(e) {
            e.preventDefault();
            
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            
            var name = $(this).find("#name").val();
            var categoryID = $(this).find("#car_category_id").val();
            var capacity = $(this).find("#capacity").val();
            var price = $(this).find("#price").val();
            
            
            $.ajax({
                url: "{{ route('car-post') }}",
                type: "POST",
                data: {
                    '_token': csrfToken,
                    'name': name,
                    'car_category_id': categoryID,
                    'capacity': capacity,
                    'price': price
                },
                success: function(response) {
                    alert("Data Berhasil Ditambahkan");
                    location.reload();
                },
                error: function(xhr, status, error) {        
                    console.error("Error saving car:", xhr.responseText);
                    alert("Failed to save car. Please try again.");
                }
            });
        });

        // Edit button click handler
        $(".btn-edit").click(function () {
            var item = $(this).closest('.item-content');
            var id = item.find(".hdnCarID").val(); // Make sure this ID exists in your HTML

            $.ajax({
                url: "{{ route('car-one-data') }}", // Suggested endpoint
                type: "GET",
                data: {
                    'query': id
                },
                success: function (data) {
                    var ID = data.id;
                    var name = data.name;
                    var categoryID = data.car_category_id;
                    var capacity = data.capacity;
                    var price = data.price;

                    var formEditContent = $("#formEditCar");
                    
                    formEditContent.find("#hdnCarID").val(ID);
                    formEditContent.find("#name").val(name);
                    formEditContent.find("#car_category_id").val(categoryID);
                    formEditContent.find("#capacity").val(capacity);
                    formEditContent.find("#price").val(price);
                },
                error: function(xhr) {
                    console.error("Error fetching car data:", xhr.responseText);
                    alert("Failed to load car data.");
                }
            });
        });

        // Edit form submission
        $("#formEditCar").submit(function (e) {
            e.preventDefault();

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).find("#hdnCarID").val();
            var name = $(this).find("#name").val();
            var categoryID = $(this).find("#car_category_id").val();
            var capacity = $(this).find("#capacity").val();
            var price = $(this).find("#price").val();

               
            $.ajax({
                url: "{{ route('car-update', ':id') }}".replace(':id', id),
                type: "POST",
                data: {
                    '_token': csrfToken,
                    '_method': 'PATCH',
                    'name': name,
                    'car_category_id': categoryID,
                    'capacity': capacity,
                    'price': price
                },
                success: function(response) {
                    alert("Data Berhasil Diperbarui");
                    location.reload();
                },
                error: function(xhr) {
                    console.error("Error when sending car data:", xhr.responseText);
                    alert("Failed to edit car data.");
                }
            });
        });

        // Delete button handler
        $(".btn-delete").click(function () {
            if (confirm("Apakah Anda ingin menghapus data ini?")) {
                var item = $(this).closest('.item-content');
                var id = item.find(".hdnCarID").val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{ route('car-destroy', ':id') }}".replace(':id', id),
                    type: "POST",
                    data: {
                        '_token': csrfToken,
                        '_method': 'DELETE',
                    },
                    success: function (data) {
                        alert("Data Berhasil Dihapus");
                        location.reload();
                    },
                    error: function(xhr) {
                        console.error("Error when deleting car data:", xhr.responseText);
                        alert("Failed to delete car data.");
                    }
                });
            }
        });
    });

</script>
@endsection
