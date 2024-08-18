<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with("orders")->where("type_id", 2)->get();

        return view(
            "customer",
            compact("customers")
        );
    }

    public function show($id)
    {
        $customer = Customer::with(
            [
                "orders" => [
                    "product",
                    "status",
                ],
            ]
        )->find($id);

        return view(
            "customer-detail",
            compact(
                "customer",
            )
        );
    }
}