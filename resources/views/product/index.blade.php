@extends('template.template')

{{-- Judul Halaman --}}
@section('title')
    Halaman Product
@endsection

@section('sub-title')
    Data semua produk yang terdaftar.
@endsection

@section('button-modal')
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#launchModal">
        Create New Product
    </button>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>⚠️ Gagal menyimpan data</strong> Silakan periksa kembali.
            <ol>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ol>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> ✅ Berhasil </strong> {{ session('success') }}.
            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse ($data as $item)
            <div class="col-md-3">
                <div class="card" style="min-height: 350px">
                    <div class="card-body">
                        
                        <img src="https://www.shutterstock.com/image-photo/on-white-background-buttons-used-260nw-2048122016.jpg" alt="" class="img-fluid" style="width: 100%" height="200px">

                        <h5 class="mt-3">Nama Produk</h5>
                        
                        <div class="row mt-2">
                            <div class="col-6">
                                <div class="text-danger fw-bold">Rp. 300.000</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted">Stok : 30</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="#" class="btn btn-success mt-2 d-flex justify-content-center"> 🎯 Category </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center py-4">
                        <p>⚠️ Data tidak ditemukan</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <div class="modal fade" id="launchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="">Category Name</label>
                            <input type="text" required class="form-control my-2" name="cat_name">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Description</label>
                            <textarea name="desc" class="form-control my-2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
