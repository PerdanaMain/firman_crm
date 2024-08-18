@extends('layouts.app')

@section('title', 'Customers | CRM')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Data Cusctomer</h3>
                        <h6 class="font-weight-normal mb-0">
                            Data Customer yang terdaftar di sistem
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telpon</th>
                                        <th>Alamat</th>
                                        <th>Jumlah Produk</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $key => $customer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $customer->customer_name }}</td>
                                            <td>{{ $customer->customer_email }}</td>
                                            <td>{{ $customer->customer_phone }}</td>
                                            <td>{{ $customer->customer_address }}</td>
                                            <td class="text-center">{{ $customer->orders->count() }}</td>
                                            <td>
                                                <a href="{{ route('customer.show', ['id' => $customer->customer_id]) }}"
                                                    class="btn btn-primary btn-sm">Detail</a>
                                            </td>
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
