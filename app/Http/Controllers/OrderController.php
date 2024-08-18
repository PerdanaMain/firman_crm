<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $statuses = Status::all();
        $customers = Customer::with([
            'type',
        ])->get();

        $orders = Order::with([
            'product',
            'customer',
            'status',
        ])
            ->orderBy('order_id', 'desc')
            ->get();

        return view(
            'order',
            compact(
                'products',
                'statuses',
                'customers',
                'orders'
            )
        );
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'product' => 'required',
                'customer' => 'required',
            ]);

            $checkOrder = Order::where('product_id', (int) $request->product)
                ->where('customer_id', (int) $request->customer)
                ->first();

            if ($checkOrder) {
                return back()->withErrors('Order already exists');
            }

            Order::create([
                'product_id' => (int) $request->product,
                'customer_id' => (int) $request->customer,
                'status_id' => 1,
            ]);

            return back()->with('success', 'Order created successfully');
        } catch (\Throwable $th) {
            return back()->withErrors('error', $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'product' => 'required',
                'customer' => 'required',
            ]);

            $order = Order::findOrfail($id);

            $order->update([
                'product_id' => (int) $request->product,
                'customer_id' => (int) $request->customer,
                "status_id" => 1,
                "reject_message" => null,
            ]);

            return back()->with('success', 'Order updated successfully');
        } catch (\Throwable $th) {
            return back()->withErrors('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrfail($id);
            $order->delete();

            return response()->json([
                'message' => 'Order deleted successfully',
            ])->setStatusCode(200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ])->setStatusCode(500);
        }
    }

    public function approve($id)
    {
        try {
            $order = Order::with([
                'product',
                'customer',
                'status',
            ])->where('order_id', $id)->first();

            $order->update([
                'status_id' => 2,
            ]);

            $order->customer->update([
                'type_id' => 2,
            ]);

            return response()->json([
                'message' => 'Order approved successfully',
            ])->setStatusCode(200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ])->setStatusCode(500);
        }
    }

    public function reject(Request $request, $id)
    {
        try {
            $request->validate([
                'reject_message' => 'required',
            ]);

            $order = Order::findOrfail($id);

            $order->update([
                'status_id' => 3,
                'reject_message' => $request->reject_message,
            ]);

            return response()->json([
                'message' => 'Order rejected successfully',
            ])->setStatusCode(200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ])->setStatusCode(500);
        }
    }

}