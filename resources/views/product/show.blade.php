@extends('template.template')

{{-- Judul Halaman --}}
@section('title')
    {{ $data->product_name }}
@endsection

@section('sub-title')
    Detail about {{ $data->product_name }}
@endsection

@section('button-modal')
    <form action="{{ route('category.destroy', $data->id) }}" method="post">
        @csrf
        @method('delete')

        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#launchModal">
            ✏️
        </button>
        <button type="submit" onclick="return confirm('Yakin mau dihapus?')" class="btn btn-outline-danger">
            🗑️
        </button>
    </form>
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
    <div class="card">
        <div class="card-body">
            <div class="card-title h5">Product Detail</div>

            <div class="table-responsive mt-4">
                <table class="table table-bordered">
                    <tr>
                        <td>Product Name</td>
                        <td>{{ $data->product_name }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{ $data->price }}</td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td>{{ $data->stock }}</td>
                    </tr>
                    <tr>
                        <td>
                            {{ $data->desc }}
                        </td>
                        <td class="text-center">
                            <img src="{{ asset('storage/images/products/' . $data->image) }}" width="200" alt=""
                                class="img-fluid">
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

    <div class="modal fade" id="launchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                 <form action="{{ route('product.update', $data->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="">Product Name</label>
                            <input type="text" value="{{ $data->product_name }}" required class="form-control my-2" name="prod_name">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Category Product</label>
                            <select name="category" class="form-control" required>
                                <option value="{{ $data->category_id }}">- {{ $data->category->category_name }} -</option>

                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"> {{ $item->category_name }} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Price</label>
                            <input type="number" value="{{ $data->price }}" required class="form-control my-2" name="price_product">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Stock</label>
                            <input type="number" value="{{ $data->stok }}" required class="form-control my-2" name="stock_product">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Image Product</label>
                            <input type="file" class="form-control my-2" name="image_product">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Description</label>
                            <textarea name="desc" class="form-control my-2">{{ $data->desc }}</textarea>
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
