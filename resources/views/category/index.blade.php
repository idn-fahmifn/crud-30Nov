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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
