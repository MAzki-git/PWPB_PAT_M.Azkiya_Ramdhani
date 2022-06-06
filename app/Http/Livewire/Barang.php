<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Barangs;
use Livewire\WithPagination;

class Barang extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $barang_id, $nama, $stok, $merk, $kodebarang;
    public $search = '';


    protected function rules()
    {
        return [
            'nama' => 'required|string|min:2',
            'stok' => 'required',
            'merk' => 'required',
            'kodebarang' => 'required|min:4|unique:barangs',
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function saveBarangs()
    {
        $validatedData = $this->validate();

        Barangs::create($validatedData);
        session()->flash('message', 'barang Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editBarangs(int $id)
    {
        $barang = Barangs::find($id);
        if ($id) {

            $this->id = $barang->id;
            $this->nama = $barang->nama;
            $this->stok = $barang->stok;
            $this->merk = $barang->merk;
            $this->kodebarang = $barang->kodebarang;
        } else {
            return redirect()->to('/tambah');
        }
    }

    public function updateBarangs()
    {
        // $validatedData = $this->validate();

        Barangs::where('id', $this->barang_id)->update([
            'nama' => $this->nama,
            'stok' => $this->stok,
            'merk' => $this->merk,
            'kodebarang' => $this->kodebarang
        ]);
        session()->flash('message', 'Barang Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function destroyBarangs(int $id)
    {
        Barangs::destroy($id);
        session()->flash('message', 'barang Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteBarangs($id)
    {
        $barangs = Barangs::find($id)->delete();
        // Barangs::destroy($id);
        session()->flash('message', 'barang Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('tambah');
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nama = '';
        $this->stok = '';
        $this->merk = '';
        $this->kodebarang = '';

        // $this->resetInput();
    }

    public function render()
    {
        $barangs = Barangs::where('nama', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(6);
        return view('livewire.barang', ['barangs' => $barangs]);
    }
}
