<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('undangan.store')}}" method="POST">
                        @csrf
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Tamu</label>
                                <div class="col-sm-10">
                                <input type="text" name="undangan" class="form-control-plaintext" id="undangan" placeholder="Masukan Nama Tamu" value="" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Whatsapp</label>
                                <div class="col-sm-10">
                                <input type="text" name="whatsapp" class="form-control-plaintext" id="whatsapp" placeholder="Masukan No Whatsapp" value="" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
