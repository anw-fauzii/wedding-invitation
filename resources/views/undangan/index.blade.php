<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Undangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('undangan.create')}}" class="btn btn-primary mb-3">Tambah Undangan</a>
                    <button type="button" class="btn btn-success  mb-3" data-toggle="modal" data-target="#importModal">
                        Import Excel
                      </button>
                    <div class="table-responsive">
                        <table id="user-table" class="table table-hover table-stiped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>WA</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($undangan as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->whatsapp}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('undangan.edit', $item->id)}}" class="btn btn-sm btn-warning mr-2">E</a>
                                        <form action="{{ route('undangan.destroy', $item->id) }}" method="POST" class="delete-form" onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mr-2">H</button>
                                        </form>
                                        @php
    $message = "Bismillahirrahmanirrahim...

Assalamualaikum Warahmatullahi Wabarakatuh.

Kepada Yth:
".$item->nama."

Tanpa mengurangi rasa hormat, kami mohon do'a dan restu Bapak/Ibu/Saudara(i) pada acara akad & resepsi pernikahan kami :

*Reni & Ikbal*

Detail prosesi akad & resepsi pernikahan dapat diakses melalui : 
https://denna-eki.site/u/" . $item->kode . "

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara(i) dapat hadir serta memberikan do'a dan restu untuk mengiringi niat tulus kami, sehingga pernikahan kami senantiasa dalam ridha & rahmat Allah Swt. 
Aamiin Yaa Rabbal Aalamin.

Terimakasih, 
Wassalamualaikum Warahmatullahi Wabarakatuh.";
@endphp

<a target="_blank" href="https://wa.me/{{ $item->whatsapp }}?text={{ urlencode($message) }}" class="btn btn-sm btn-success">WA</a>
                                    </td>
                                </tr>
                                
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="importModalLabel">Import Undangan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form to upload file -->
              <form action="{{ route('import.undangan') }}" method="POST" enctype="multipart/form-data" id="importForm">
                @csrf
                <div class="form-group">
                  <label for="file">Choose Excel File</label>
                  <input type="file" name="file" class="form-control" accept=".xlsx, .csv, .ods" required>
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#user-table').DataTable();
        });
        </script>
        <script>
            function confirmDelete(event) {
                var result = confirm("Apakah Anda yakin ingin menghapus data ini?");
                if (result) {
                    return true;  // Form will be submitted
                } else {
                    event.preventDefault();  // Form will not be submitted
                    return false;
                }
            }
        </script>


</x-app-layout>