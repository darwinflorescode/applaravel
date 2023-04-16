@extends('webapp.app')
@section('tituloprincipal', 'Cursos')
@section('tituloarticle', '👩‍💻💻 Darwinflocode 🖥👨‍💻 | Cursos')
@section('imgog', asset('assets/img/logofin.png'))
@section('titulocenter', 'Todos los Cursos Gratis')

@section('contenidocentralsuperior')

    @forelse ($cursos as $key => $row)
        <div class="single-stories">
            <label><img src="{{ Storage::url('public/images/') . $row->courses_views->categories->image }}"
                    alt="{{ $row->courses_views->categories->title }}"></label>
            <div>
                <a href="{{ route('web.buscarcursos', $row->slug . '-' . $row->course_id) }}"
                    title="{{ $row->courses_views->title }}"> <img
                        src="{{ Storage::url('public/images/') . $row->courses_views->image }}"
                        alt="{{ $row->courses_views->title }}"></a>

                <b>{{ $row->courses_views->title }}</b>

            </div>

        </div>

    @empty
        <h2 class="text-center text-secondary p-4">No post found in the database!</h2>
    @endforelse
@endsection

@section('sectioncourseright')
    @include('web.cdestacado')
@endsection
