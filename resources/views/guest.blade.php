@extends('layouts.app')

@section('title', 'Guest | CRM')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Data Calon Customer</h3>
                        <h6 class="font-weight-normal mb-0">
                            Data Calon Customer yang akan menjadi Customer
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
                                <form action="{{ route('guest.store') }}" method="POST">
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
                                                <label for="exampleFormControlInput1">Nama</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="masukkan nama" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Email</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="masukkan email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">No Telpon</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="masukkan no telpon" name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Alamat</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="masukkan alamat"
                                                    name="address"></textarea>
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
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Tipe</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guest as $key => $g)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $g->customer_name }}</td>
                                            <td>{{ $g->customer_email }}</td>
                                            <td>{{ $g->customer_phone }}</td>
                                            <td>{{ $g->customer_address }}</td>
                                            <td><label class="badge badge-warning">Calon Customer</label></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        id="dropdownMenuIconButton7" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i
                                                            class="ti ti-dots-vertical"></i></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                                        <button class="dropdown-item" data-toggle="modal"
                                                            data-target="#updateModal{{ $g->customer_id }}"><i
                                                                class="ti ti-pencil mr-2"></i>Edit</button>
                                                        <button class="dropdown-item" id="delete-btn"
                                                            data-id="{{ $g->customer_id }}"><i
                                                                class="ti ti-trash mr-2"></i>Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="updateModal{{ $g->customer_id }}" tabindex="-1"
                                            aria-labelledby="updateModal{{ $g->customer_id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('guest.update', ['id' => $g->customer_id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Nama</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="masukkan nama" name="name"
                                                                    value="{{ $g->customer_name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Email</label>
                                                                <input type="email" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="masukkan email" name="email"
                                                                    value="{{ $g->customer_email }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">No Telpon</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="masukkan no telpon" name="phone"
                                                                    value="{{ $g->customer_phone }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">Alamat</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="masukkan alamat"
                                                                    name="address">{{ $g->customer_address }}</textarea>
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
                        url: "/guest/" + id,
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
