<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Display Invoice Form
    public function create()
    {
        return view('invoices.create');
    }

    // Store Invoice in Database
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'invoice_number' => 'required|unique:invoices',
            'invoice_date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
    }

    // List Invoices
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    // Generate PDF
    public function downloadPDF($id)
    {
        $invoice = Invoice::findOrFail($id);

        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));
        return $pdf->download("invoice_{$invoice->invoice_number}.pdf");
    }
}
