@extends('admin.master')

@push('head')
    <style>
        textarea {
            resize: none;
        }
    </style>
@endpush

@section('isi')
    <h1 class="text-center font-weight-bold my-4">Tambah Client</h1>
    <div class="card">
        <div class="card-body">
            <form action="/dashboard/client" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="photo">Foto Client</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    @error('photo')
                        <span class="text-danger ml-3">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nama Client</label>
                    <input type="text" class="form-control" id="name" 
                        placeholder="Nama Client" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger ml-3">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
