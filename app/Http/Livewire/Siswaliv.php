<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\User;
use Livewire\Component;

class Siswaliv extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $email, $level, $password, $siswa_id;
    public $search = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'level' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required|min:8',

        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveStudent()
    {
        $validatedData = $this->validate();

        User::create($validatedData);
        session()->flash('message', 'Student Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editStudent(int $siswa_id)
    {
        $siswa = user::find($siswa_id);
        if ($siswa) {

            $this->siswa_id = $siswa->id;
            $this->name = $siswa->name;
            $this->level = $siswa->level;
            $this->email = $siswa->email;
            $this->password = $siswa->password;
        } else {
            return redirect()->to('/siswa');
        }
    }
    public function updateStudent()
    {
        $validatedData = $this->validate();

        User::where('id', $this->siswa_id)->update([
            'name' => $validatedData['name'],
            'level' => $validatedData['level'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);
        session()->flash('message', 'Student Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function deleteStudent(int $siswa_id)
    {
        $this->siswa_id = $siswa_id;
    }
    public function destroyStudent()
    {
        User::find($this->siswa_id)->delete();
        session()->flash('message', 'Student Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->name = '';
        $this->level = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        $students = User::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(6);
        return view('livewire.siswaliv', ['students' => $students]);
    }
}
