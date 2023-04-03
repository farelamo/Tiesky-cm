@extends('admin.master')

@push('head')
    <style>
        textarea {
            resize: none;
        }
    </style>
@endpush

@section('isi')
    <h1 class="text-center font-weight-bold my-4">Edit Brand</h1>
    <div class="card">
        <div class="card-body">
            <form action="/dashboard/brand/{{ $brand->id }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Brand</label>
                    <input type="text" class="form-control" id="name" 
                        placeholder="Nama Brand" name="name" value="{{ old('name') ?? $brand->name }}">
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
