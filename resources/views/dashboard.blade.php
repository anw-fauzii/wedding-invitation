<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row">
                        <!-- Jumlah Undangan Hadir Card -->
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Undangan Hadir</h5>
                                    <p class="card-text">{{$undangan->where('keterangan','attend')->count()}} undangan</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Ragu-ragu Card -->
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Ragu-ragu</h5>
                                    <p class="card-text">{{$undangan->where('keterangan','maybe')->count()}} undangan</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Tidak Hadir Card -->
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tidak Hadir</h5>
                                    <p class="card-text">{{$undangan->where('keterangan','absent')->count()}} undangan</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Belum Menjawab Card -->
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Belum Menjawab</h5>
                                    <p class="card-text">{{$undangan->where('keterangan',NULL)->count()}} undangan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
