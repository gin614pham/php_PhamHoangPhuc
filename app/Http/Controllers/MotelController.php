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

        Motel::create($request->all());
        return redirect()->route('motels.index');
    }
    
    public function destroy(Request $request)
    {
        $ids = $request->ids;
        Motel::destroy($ids);
        return redirect()->route('motels.index');
    }
}
