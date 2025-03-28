<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <div class="d-flex justify-content-center gap-6 flex-wrap"> 
                        <a href="{{ route('ajaxproducts.index') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Ajax Yajra</a>
                        <a href="{{ route('locations.index') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Ajax Dropdown</a>
                        <a href="{{ route('loads.index') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Ajax Scroll</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <div class="d-flex justify-content-center gap-6 flex-wrap"> 
                        <a href="{{ route('send-mail') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Email Send</a>
                        <a href="{{ route('user-notify') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Email Notification</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <div class="d-flex justify-content-center gap-6 flex-wrap"> 
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Users Event</a>
                        <a href="{{ route('image.index') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Images Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <div class="d-flex justify-content-center gap-6 flex-wrap"> 
                        <a href="{{ route('address.index') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">IP Address</a>
                        <a href="{{ route('generatePDF') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Generate PDF</a>
                        <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Invoice PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>