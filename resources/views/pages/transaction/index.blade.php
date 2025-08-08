@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Transactions</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transactions</li>
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
                        <h3 class="card-title">Transactions List</h3>
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
                                    <th>Customer Name</th>
                                    <th>Car</th>
                                    <th>For Days</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody id="carTableBody">
                                @foreach($transactions as $item)
                                <tr class="item-content">
                                    <td>
                                        {{ $loop->iteration }}
                                        <input type="hidden" class="hdnTransactionID" value="{{$item->id}}">
                                    </td>
                                    <td>{{ $item->customer_name}}</td>
                                    <td>{{ $item->car->name}}</td>
                                    <td>{{ $item->days}}</td>
                                    <td>{{ $item->total_price }}</td>
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
            <form id="formAddTransaction" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" name="customer_name" id="customer_name"
                                    placeholder="Enter Customer Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Car</label>
                                <select name="car_id" id="car_id" class="form-control">
                                    <option value="">--Select Car--</option>
                                    @foreach ($cars as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>For Day</label>
                                <input type="number" class="form-control" name="days" id="days"
                                    placeholder="Enter For Days">
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
            <form id="formEditTransaction" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" name="customer_name" id="customer_name"
                                    placeholder="Enter Customer Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Car</label>
                                <select name="car_category_id" id="car_category_id" class="form-control">
                                    <option value="">--Select Car--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>For Day</label>
                                <input type="number" class="form-control" name="days" id="days"
                                    placeholder="Enter For Days">
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
        $("#formAddTransaction").submit(function (e) {
            e.preventDefault();

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var customerName = $(this).find("#customer_name").val();
            var carID = $(this).find("#car_id").val();
            var days = $(this).find("#days").val();

            
            $.ajax({
                url: "{{ route('transaction-store') }}",
                type: "POST",
                data: {
                    '_token': csrfToken,
                    'customer_name': customerName,
                    'car_id': carID,
                    'days': days
                },
                success: function (response) {
                    alert("Data Berhasil Ditambahkan");
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error("Error saving transaction:", xhr.responseText);
                    alert("Failed to save transaction. Please try again.");
                }
            });
        });
    });

</script>
@endsection
