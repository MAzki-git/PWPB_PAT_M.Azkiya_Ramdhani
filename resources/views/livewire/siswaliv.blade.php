<div>

    @include('livewire.modalsiswa')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" /><br>
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModal">
                                Tambah siswa baru
                            </button>
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>level</th>
                                    <th>Email</th>
                                    <th>password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
                                $NO ="1";
                                ?>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $NO++; }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->level }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->password }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateStudentModal" wire:click="editStudent({{$student->id}})" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteStudentModal" wire:click="deleteStudent({{$student->id}})" class="btn btn-danger">Delete</button>
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
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>