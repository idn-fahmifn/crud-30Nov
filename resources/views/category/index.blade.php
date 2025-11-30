@extends('template.template')

{{-- Judul Halaman --}}
@section('title')
    Halaman Category
@endsection

@section('sub-title')
    Data semua kategori yang terdaftar.
@endsection

@section('button-modal')
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#launchModal">
        Create New Category
    </button>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Judul Category</div>
                    <p class="mt-2">
                        {{ Str::limit('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum, deleniti!', 50, '...') }}
                    </p>
                    <a href="#" class="btn btn-success mt-2"> 🎯 Category </a>
                </div>
            </div>
        </div>
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
