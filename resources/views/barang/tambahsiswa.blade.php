@extends('layouts.main')
<title> E-Inventaris | Asset</title>
@section('content')
    <h1 class="h3 mb-4 text-gray-800" style="text-align: center">Data barang</h1>

<div>
    <livewire:siswaliv>
</div>

@endsection
@section('script')
<script>
     window.addEventListener('close-modal', event => {

        $('#studentModal').modal('hide');
        $('#updateStudentModal').modal('hide');
        $('#deleteStudentModal').modal('hide')
        $('.modal-backdrop').hide();
        })
    </script>