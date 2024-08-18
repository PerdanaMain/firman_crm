@extends('layouts.app')

@section('title', 'Order | CRM')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Data Pemesanan Produk</h3>
                        <h6 class="font-weight-normal mb-0">
                            Data Pemesanan Produk dari Calon Customers
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
                                Ajukan Pemesanan
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('order.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <label for="exampleFormControlInput1">Nama Product</label>
                                                    <div class="form-group">
                                                        <select name="product" id="product" class="form-control select2">
                                                            <option selected hidden>=== Pilih Product ===</option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->product_id }}">
                                                                    {{ $product->product_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <label for="exampleFormControlInput1">Nama Customer</label>
                                                    <div class="form-group">
                                                        <select name="customer" id="customer" class="form-control select2">
                                                            <option selected hidden>=== Pilih Customer ===</option>
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->customer_id }}">
                                                                    {{ $customer->customer_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
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
                                        <th>Nama Produk</th>
                                        <th>Nama Customer</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->product->product_name }}</td>
                                            <td>{{ $order->customer->customer_name }}</td>
                                            <td>
                                                @if ($order->status_id == 1)
                                                    <label
                                                        class="badge badge-warning">{{ $order->status->status_name }}</label>
                                                @elseif ($order->status_id == 2)
                                                    <label
                                                        class="badge badge-success">{{ $order->status->status_name }}</label>
                                                @else
                                                    <label
                                                        class="badge badge-danger">{{ $order->status->status_name }}</label>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        id="dropdownMenuIconButton7" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i
                                                            class="ti ti-dots-vertical"></i></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                                        @if (!in_array(Auth::user()->role_id, [3]))
                                                            @if ($order->status_id == 1)
                                                                <button class="dropdown-item" data-toggle="modal"
                                                                    data-target="#updateModal{{ $order->order_id }}"><i
                                                                        class="ti ti-pencil mr-2"></i>Edit</button>
                                                                <button class="dropdown-item" id="delete-btn"
                                                                    data-id="{{ $order->order_id }}"><i
                                                                        class="ti ti-trash mr-2"></i>Delete</button>
                                                                <button class="dropdown-item" id="approve-btn"
                                                                    data-id="{{ $order->order_id }}"><i
                                                                        class="ti ti-location-arrow mr-2"></i>Approve</button>
                                                                <button class="dropdown-item" id="reject-btn"
                                                                    data-id="{{ $order->order_id }}"><i
                                                                        class="ti ti-close mr-2"></i>Reject</button>
                                                            @elseif ($order->status_id == 3)
                                                                <button class="dropdown-item" data-toggle="modal"
                                                                    data-target="#updateModal{{ $order->order_id }}"><i
                                                                        class="ti ti-pencil mr-2"></i>Edit</button>
                                                                <button class="dropdown-item" id="delete-btn"
                                                                    data-id="{{ $order->order_id }}"><i
                                                                        class="ti ti-trash mr-2"></i>Delete</button>
                                                                <button class="dropdown-item" id="message-btn"
                                                                    data-message="{{ $order->reject_message ?? 'Tidak ada reject message' }}"><i
                                                                        class="ti ti-location-arrow mr-2"></i>Reject
                                                                    Message</button>
                                                            @endif
                                                        @else
                                                            <button class="dropdown-item" data-toggle="modal"
                                                                data-target="#updateModal{{ $order->order_id }}"><i
                                                                    class="ti ti-pencil mr-2"></i>Edit</button>
                                                            <button class="dropdown-item" id="delete-btn"
                                                                data-id="{{ $order->order_id }}"><i
                                                                    class="ti ti-trash mr-2"></i>Delete</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="updateModal{{ $order->order_id }}" tabindex="-1"
                                            aria-labelledby="updateModal{{ $order->order_id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('order.update', ['id' => $order->order_id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="updateModal{{ $order->order_id }}Label">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <label for="exampleFormControlInput1">Nama
                                                                        Product</label>
                                                                    <div class="form-group">
                                                                        <select name="product"
                                                                            id="product-{{ $key }}"
                                                                            class="form-control select2">
                                                                            <option selected hidden
                                                                                value="{{ $order->product_id }}">
                                                                                {{ $order->product->product_name }}
                                                                            </option>
                                                                            @foreach ($products as $product)
                                                                                <option
                                                                                    value="{{ $product->product_id }}">
                                                                                    {{ $product->product_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <label for="exampleFormControlInput1">Nama
                                                                        Customer</label>
                                                                    <div class="form-group">
                                                                        <select name="customer"
                                                                            id="customer-{{ $key }}"
                                                                            class="form-control select2">
                                                                            <option selected hidden
                                                                                value="{{ $order->customer_id }}">
                                                                                {{ $order->customer->customer_name }}
                                                                            </option>
                                                                            @foreach ($customers as $customer)
                                                                                <option
                                                                                    value="{{ $customer->customer_id }}">
                                                                                    {{ $customer->customer_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
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
        $(document).ready(function() {
            $(".select2").select2();
        });

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
                        url: "/order/" + id,
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

        $(document).on("click", "#message-btn", function() {
            var message = $(this).data('message');
            Swal.fire({
                title: 'Alasan Penolakan',
                text: message,
                icon: 'info',
            })
        });

        $(document).on("click", "#approve-btn", function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data akan diapprove!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Approve!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'PUT',
                        url: "/order/approve/" + id,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            Swal.fire(
                                'Approved!',
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

        $(document).on("click", "#reject-btn", function() {
            var id = $(this).data('id');

            Swal.fire({
                title: "Alasan Penolakan",
                input: "text",
                inputAttributes: {
                    autocapitalize: "off"
                },
                showCancelButton: true,
                confirmButtonText: "Submit",
                showLoaderOnConfirm: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'PUT',
                        url: "/order/reject/" + id,
                        data: {
                            _token: "{{ csrf_token() }}",
                            reject_message: result.value
                        },
                        success: function(res) {
                            Swal.fire(
                                'Rejected!',
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
            });
        });
    </script>
@endpush
