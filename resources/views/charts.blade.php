<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <div class="d-flex justify-content-center gap-6 flex-wrap"> 
                        <a href="{{ route('linechart') }}" class="btn btn-primary btn-lg px-6 py-4 text-white">Linechart</a>
                        <a href="{{ route('piechart') }}" class="btn btn-success btn-lg px-6 py-4 text-white">Piechart</a>
                        <a href="{{ route('graphchart') }}" class="btn btn-warning btn-lg px-6 py-4 text-white">Graphchart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
