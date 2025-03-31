<?php

namespace App\Http\Controllers;

use App\Models\QrProduct;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrProductController extends Controller
{
    public function index()
    {
        $qrProducts = QrProduct::all();
        return view('qr_products.index', compact('qrProducts'));
    }

    public function create()
    {
        return view('qr_products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'qr_code' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        QrProduct::create($request->all());
        return redirect()->route('qr_products.index')->with('success', 'QR Product created successfully!');
    }

    public function show($id)
    {
        $qrProduct = QrProduct::findOrFail($id);
        $qrCode = QrCode::size(200)->generate($qrProduct->qr_code);

        return view('qr_products.show', compact('qrProduct', 'qrCode'));
    }
}
