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
                <div class="card" style="min-height: 400px">
                    <div class="card-body">

                        <img src="{{ asset('storage/images/products/'.$item->image) }}"
                            alt="" class="img-fluid" style="width: 100%" height="200px">

                        <h5 class="mt-3">{{ $item->product_name }}</h5>

                        <div class="row mt-2">
                            <div class="col-6">
                                <div class="text-danger fw-bold">Rp. {{ number_format($item->price) }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted">Stok : {{ $item->stock }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{{ route('product.show', $item->slug) }}" class="btn btn-success mt-2 d-flex justify-content-center"> 🎯 Detail </a>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="">Product Name</label>
                            <input type="text" required class="form-control my-2" name="prod_name">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Category Product</label>
                            <select name="category" class="form-control" required>
                                <option value="">- choose category -</option>

                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"> {{ $item->category_name }} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Price</label>
                            <input type="number" required class="form-control my-2" name="price_product">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Stock</label>
                            <input type="number" required class="form-control my-2" name="stock_product">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Image Product</label>
                            <input type="file" required class="form-control my-2" name="image_product">
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
