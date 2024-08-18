@extends('layouts.app')

@section('title', 'Products | CRM')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Data Product</h3>
                        <h6 class="font-weight-normal mb-0">
                            Data Product yang tersedia
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-block mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                                Tambah Data
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('product.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nama Product</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="masukkan nama" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Stock</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="masukkan email" name="stock">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Harga Produk</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="masukkan no telpon" name="price">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Deskripsi Produk</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="masukkan alamat"
                                                    name="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="type" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Stock</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $p)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $p->product_name }}</td>
                                            <td>{{ $p->product_description }}</td>
                                            <td>{{ $p->product_price }}</td>
                                            <td>{{ $p->product_stock }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        id="dropdownMenuIconButton7" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i
                                                            class="ti ti-dots-vertical"></i></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                                        <button class="dropdown-item" data-toggle="modal"
                                                            data-target="#updateModal{{ $p->product_id }}"><i
                                                                class="ti ti-pencil mr-2"></i>Edit</button>
                                                        <button class="dropdown-item" id="delete-btn"
                                                            data-id="{{ $p->product_id }}"><i
                                                                class="ti ti-trash mr-2"></i>Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="updateModal{{ $p->product_id }}" tabindex="-1"
                                            aria-labelledby="updateModal{{ $p->product_id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('product.update', ['id' => $p->product_id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="updateModal{{ $p->product_id }}Label">Update Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Nama Product</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="masukkan nama produk" name="name"
                                                                    value="{{ $p->product_name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Stock</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="masukkan stock" name="stock"
                                                                    value="{{ $p->product_stock }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Harga Produk</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="masukkan harga produk" name="price"
                                                                    value="{{ $p->product_price }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">Deskripsi
                                                                    Produk</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="masukkan alamat"
                                                                    name="description">
                                                                {{ $p->product_description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="type" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '#delete-btn', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: "/product/" + id,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            Swal.fire(
                                'Terhapus!',
                                res.message,
                                'success'
                            ).then((result) => {
                                location.reload();
                            })
                        },
                        error: function(err) {
                            Swal.fire(
                                'Error!',
                                err.responseJSON.message,
                                'error'
                            )
                        }
                    })
                }
            })
        });
    </script>
@endpush
