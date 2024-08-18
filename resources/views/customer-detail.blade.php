@extends('layouts.app')

@section('title', 'Customers | CRM')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Data Cusctomer</h3>
                        <h6 class="font-weight-normal mb-2">
                            <b>Nama : </b> {{ $customer->customer_name }}
                        </h6>
                        <h6 class="font-weight-normal mb-2">
                            <b>Email : </b> {{ $customer->customer_email }}
                        </h6>
                        <h6 class="font-weight-normal mb-2">
                            <b>No Telpon : </b> {{ $customer->customer_phone }}
                        </h6>
                        <h6 class="font-weight-normal mb-2">
                            <b>Alamat : </b> {{ $customer->customer_address }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer->orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->product->product_name }}</td>
                                            <td>{{ $order->product->product_description }}</td>
                                            <td>{{ $order->product->product_price }}</td>
                                        </tr>
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
    <script></script>
@endpush
