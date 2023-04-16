@section('title', 'Manage Topic Course')
@extends('adminapp.app')
@section('modal')
    @include('topic-course.modales')
@endsection

@section('contenttable')

    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-primary d-flex justify-content-between align-items-center"
                    style="background-color: rgb(106, 4, 141) !important">
                    <h3 class="text-light">@yield('title') - "{{ $courses->title }} - {{ $courses->categories->title }}"
                    </h3>

                </div>
                <div class="card-body">
                    <form action="{{ route('topic.store.course') }}" method="post" id="add_form_register">
                        @csrf
                        <div class="input-group mb-2">
                            <input type="hidden" name="id_topic" id="id_topic">
                            <input type="hidden" name="id_courses" id="id_courses" value="{{ $courses->id }}">
                            <input type="text" required class="form-control" id="search_data" placeholder="Buscar">
                            <br><span class="error badge text-danger errors-id_topic"></span>
                        </div>
                        <div class="row">

                            <div class="col-md-10 text-right">
                                <button type="submit" id="btn_add_topic" class="btn btn-primary">ADD TOPIC</button>
                            </div>
                            <div class="col-md-2">
                                <button type="reset" class="btn btn-secondary">LIMPIAR</button>
                            </div>

                        </div>
                    </form>

                    <hr>
                    <div id="show_all_courses_topic">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    @include('topic-course.script')
@endsection
