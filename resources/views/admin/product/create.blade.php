@extends('admin.master')

@push('head')
    <style>
        textarea {
            resize: none;
        }
    </style>
@endpush

@section('isi')
    <h1 class="text-center font-weight-bold my-4">Tambah Product</h1>
    <div class="card">
        <div class="card-body">
            <form action="/dashboard/product" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="photo">Foto Product</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    @error('photo')
                        <span class="text-danger ml-3">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nama Product</label>
                    <input type="text" class="form-control" id="name" placeholder="Nama Product" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger ml-3">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="brand">Brand</label>
                        <select name="brand_id" class="form-control" id="brand">
                            <option value="">-- Pilih Brand --</option>
                            @foreach ($brands as $brand)
                                @if (old('brand_id') == $brand->id)
                                    <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                @else
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('brand_id')
                            <span class="text-danger ml-3">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="kategori">Kategori</label>
                        <select name="category_id" class="form-control" id="kategori">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                @if (old('category_id') == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger ml-3">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="short_desc">Deskripsi Singkat</label>
                    <textarea class="form-control" id="short_desc" rows="3" name="short_desc">{{ old('short_desc') }}</textarea>
                    @error('short_desc')
                        <span class="text-danger ml-3">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="desc">Deskripsi</label>
                    <textarea class="form-control" id="desc" rows="3" name="desc">{{ old('desc') }}</textarea>
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
