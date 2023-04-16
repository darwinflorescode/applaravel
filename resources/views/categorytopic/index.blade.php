@section('title', 'Manage Category Topic')
@extends('adminapp.app')
@section('modal')
    @include('categorytopic.modales')
@endsection

@section('contenttable')

    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-success d-flex justify-content-between align-items-center">
                    <h3 class="text-light">@yield('title')</h3>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addcategory"><i
                            class="bi-plus-circle me-2"></i>Add New Category Topic</button>
                </div>
                <div class="card-body" id="show_all_categories">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    @include('categorytopic.script')

@endsection
