<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="barangModal" tabindex="-1" aria-labelledby="goodsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="goodsModalLabel">Tambah data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                  wire:click="closeModal"  ></button>
            </div>
            <form wire:submit.prevent="saveBarangs">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" wire:model="nama" class="form-control">
                        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>  
                    <div class="mb-3">
                        <label>Jumlah</label>
                        <input type="text" wire:model="stok" class="form-control">
                        @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Merk</label>
                        <input type="text" wire:model="merk" class="form-control">
                        @error('merk') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                      <label>Kode Barang</label>
                      <input type="text" wire:model="kodebarang" class="form-control">
                      @error('kodebarang') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Goods Modal -->
<div wire:ignore.self class="modal fade" id="updateBarangModal" tabindex="-1" aria-labelledby="updatebarang"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateGoodsModalLabel">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateBarangs">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" wire:model="nama" class="form-control">
                        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Jumlah</label>
                        <input type="text" wire:model="stok" class="form-control">
                        @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Merk</label>
                        <input type="text" wire:model="merk" class="form-control">
                        @error('merk') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Kode Barang</label>
                        <input type="text" wire:model="kodebarang" class="form-control">
                        @error('kodebarang') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Goods Modal -->
<div wire:ignore.self class="modal fade" id="deleteBarangModal" tabindex="-1" aria-labelledby="deleteGoodsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteGoodsModalLabel">Hapus Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
                @foreach ($barangs as $barangsx)
            <form wire:submit.prevent="destroyBarangs">
                <div class="modal-body">
                    <h5>Apa kamu ingin menghapus ini ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Tutup</button>
                    {{-- <button type="submit" wire:click="/deleteBarangs/{{$barangsx->id}}" class="btn btn-primary" >Yes! Delete</button> --}}
                    <a href="/deleteBarangs/{{$barangsx->id}}" class="btn btn-primary">Ya! Hapus </a>
                </div>
            </form>
             @endforeach
        </div>
    </div>
</div>

<!-- View Goods Modal -->
<div wire:ignore.self class="modal fade" id="viewBarangsModal" tabindex="-1" aria-labelledby="viewGoodsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateGoodsModalLabel">Item Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateBarangs">
                <div class="modal-body">
                   <table class="table table-bordered">
                       <tbody>
                           <tr>
                               <th>ID</th>
                               <th>{{$barang_id }}</th> 
                           </tr>

                           <tr>
                            <th>Nama Barang</th>
                            <th>{{ $nama }}</th>
                        </tr>

                        <tr>
                            <th>Jumlah</th>
                            <th>{{ $stok }}</th>
                        </tr>

                        <tr>
                            <th>Merk</th>
                            <th>{{ $merk }}</th>
                        </tr>

                        <tr>
                            <th>Kode Barang</th>
                            <th>{{ $kodebarang }}</th>
                        </tr>

                       </tbody>

                   </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Tutup</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>