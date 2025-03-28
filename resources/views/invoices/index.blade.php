<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Invoices
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 text-white">
                <table class="table-auto w-full border-collapse border border-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-4 py-2">Customer Name</th>
                            <th class="px-4 py-2">Invoice Number</th>
                            <th class="px-4 py-2">Invoice Date</th>
                            <th class="px-4 py-2">Total Amount</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                        <tr class="border-t border-gray-600 text-center">
                            <td class="px-4 py-2">{{ $invoice->customer_name }}</td>
                            <td class="px-4 py-2">{{ $invoice->invoice_number }}</td>
                            <td class="px-4 py-2">{{ $invoice->invoice_date }}</td>
                            <td class="px-4 py-2">${{ $invoice->total_amount }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('invoices.downloadPDF', $invoice->id) }}" 
                                   class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600 transition">
                                    Download PDF
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
