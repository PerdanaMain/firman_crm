<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Symfony\Component\HttpFoundation\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guest = Customer::with("type")
            ->where("type_id", "!=", 2)
            ->orderBy("customer_id", "desc")
            ->get();

        return view(
            'guest',
            compact('guest')
        );
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);

            Customer::create([
                'customer_name' => $request->name,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'customer_address' => $request->address,
                'type_id' => 1,
            ]);

            return back()->with('success', 'Guest has been added');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);

            $guest = Customer::findOrFail($id);
            $guest->update([
                'customer_name' => $request->name,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'customer_address' => $request->address,
            ]);

            return back()->with('success', 'Guest has been updated');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $guest = Customer::findOrFail($id);
            $guest->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Guest has been deleted',
            ])->setStatusCode(200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ])->setStatusCode(500);
        }
    }
}