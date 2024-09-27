@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-md-12 bg-white rounded-3">
        <div class="container-fluid">
            <h3 class="mt-4">Kategori</h3>
            <hr>                          
        </div>
        <div class="container">
            <div class="table-responsive  mt-4">
                @if (session()->has('success'))
                    <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                    </div>
                @endif
                <a href="/dashboard/categories/create" class="btn btn-primary mb-3"><i class="fas fa-plus text-white mr-2"></i> Tambah Kategori</a>
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)  
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-center">
                                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning my-2"><i class="fas fa-user-edit text-white text-center"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
                
            
@endsection