@extends('template.template')

{{-- Judul Halaman --}}
@section('title')
    Halaman Category
@endsection

@section('sub-title')
    Data semua kategori yang terdaftar.
@endsection

@section('button-modal')
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
@endsection
