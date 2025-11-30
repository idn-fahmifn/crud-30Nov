@extends('template.template')

{{-- Judul Halaman --}}
@section('title')
    {{ $data->category_name }}
@endsection

@section('sub-title')
    Detail about {{ $data->category_name }}
@endsection

@section('button-modal')
    <form action="" method="post">
        @csrf
        @method('delete')

        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#launchModal">
            ✏️
        </button>
        <button type="submit" onclick="confirm('Yakin mau dihapus?')" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#launchModal">
            🗑️
        </button>
    </form>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title h5">Category Detail</div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td>Category Product</td>
                        <td>{{ $data->category_name }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            {{ $data->desc }}
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <div class="card-title h5">List Product</div>
        </div>
    </div>

    <div class="modal fade" id="launchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('category.update', $data->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="">Category Name</label>
                            <input type="text" required value="{{ $data->category_name }}" class="form-control my-2"
                                name="cat_name">
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
