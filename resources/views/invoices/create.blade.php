<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Invoice
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('invoices.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="text-white">Customer Name</label>
                        <input type="text" name="customer_name" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="text-white">Invoice Number</label>
                        <input type="text" name="invoice_number" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="text-white">Invoice Date</label>
                        <input type="date" name="invoice_date" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="text-white">Total Amount</label>
                        <input type="number" name="total_amount" class="form-input mt-1 block w-full" step="0.01" required>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Invoice</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
