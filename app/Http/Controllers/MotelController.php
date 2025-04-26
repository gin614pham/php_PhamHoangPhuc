<?php

namespace App\Http\Controllers;

use App\Models\Motel;
use App\Models\PaymentMethod;

use Illuminate\Http\Request;

class MotelController extends Controller
{
    public function index()
    {
        $motels = Motel::all();
        $paymentMethods = PaymentMethod::all();
        return view('motels.index', compact('motels', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name_of_persion' => ['required', 'min:5', 'max:50', 'regex:/^([a-zA-Z\s]+)$/'],
        //     'phone_number' => ['required', 'min:10', 'max:10', 'regex:/^\d{10}$/'],
        //     'check_in' => ['required', 'date', 'after_or_equal:today'],
        //     'payment_method_id' => ['required', 'exists:payment_methods,id'],
        //     'note' => ['nullable', 'string'],
        // ]);

        Motel::create($request->all());
        return redirect()->route('motels.index');
    }
}
