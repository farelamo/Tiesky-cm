@extends('admin.master')

@push('head')
    <style>
        textarea {
            resize: none;
        }
    </style>
@endpush

@section('isi')
    <h1 class="text-center font-weight-bold my-4">Edit Client</h1>
    <div class="card">
        <div class="card-body">
            <form action="/dashboard/client/{{ $client->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <img src="{{ Storage::url('public/client/' . $client->photo) }}" 
                            class="rounded" style="height: 10rem"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo">
                        Foto Client 
                        <span class="text-danger font-weight-bold">
                            *diisi apabila perlu dirubah
                        </span>
                    </label>
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
                        placeholder="Nama Client" name="name" value="{{ old('name') ?? $client->name }}">
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
