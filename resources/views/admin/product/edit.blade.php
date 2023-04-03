@extends('admin.master')

@push('head')
    <style>
        textarea {
            resize: none;
        }
    </style>
@endpush

@section('isi')
    <h1 class="text-center font-weight-bold my-4">Edit Product</h1>
    <div class="card">
        <div class="card-body">
            <form action="/dashboard/product/{{ $product->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <img src="{{ Storage::url('public/images/' . $product->photo) }}" 
                            class="rounded" style="height: 10rem"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo">
                        Foto Product 
                        <span class="text-danger font-weight-bold">
                            *diisi apabila perlu dirubah
                        </span>
                    </label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
                <div class="form-group">
                    <label for="name">Nama Product</label>
                    <input type="text" class="form-control" id="name" 
                        placeholder="Nama Product" name="name" value="{{ old('name') ?? $product->name }}">
                    @error('name')
                        <span class="text-danger ml-3">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="short_desc">Deskripsi Singkat</label>
                    <textarea class="form-control" id="short_desc" rows="3" name="short_desc">{{ old('short_desc') ?? $product->short_desc }}</textarea>
                    @error('short_desc')
                        <span class="text-danger ml-3">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="desc">Deskripsi</label>
                    <textarea class="form-control" id="desc" rows="3" name="desc">{{ old('desc') ?? $product->desc }}</textarea>
                    @error('desc')
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
