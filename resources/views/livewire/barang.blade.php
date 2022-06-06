<div>
    @include('livewire.modalbarang')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
                            <br>
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#barangModal">
                                Tambah   barang
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Kategori</th>
                                    <th>kode barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $NO ="1";
                                ?>
                                @forelse ($barangs as $barangsx)
                                    <tr>
                                        <td>{{  $NO++; }}</td>
                                        <td>{{ $barangsx->nama }}</td>
                                        <td>{{ $barangsx->stok }}</td>
                                        <td>{{ $barangsx->merk }}</td>
                                        <td>{{ $barangsx->kodebarang }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateBarangModal" wire:click="editBarangs({{$barangsx->id}})" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteBarangModal" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{   $barangs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>