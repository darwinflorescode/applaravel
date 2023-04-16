@extends('webapp.app')
@section('tituloprincipal', 'Artículos')
@section('tituloarticle', '👩‍💻💻 Darwinflocode 🖥👨‍💻 | Artículos')
@section('imgog', asset('assets/img/logofin.png'))

@section('titulocenter', 'Todos los Artículos')

@section('contenidocentralsuperior')

    @forelse ($temas as $key => $row)
        <div class="single-stories">
            <label><img src="{{ Storage::url('public/images/') . $row->link_topics->category_topics->image }}"
                    alt="{{ $row->link_topics->category_topics->title }}"></label>
            <div>
                <a href="{{ route('web.buscartemas', $row->slug . '-' . $row->id) }}" title="{{ $row->title }}"> <img
                        src="{{ Storage::url('public/images/') . $row->image }}" alt="{{ $row->title }}"></a>

                <b>{{ $row->title }}</b>


            </div>
        </div>

    @empty
        <h2 class="text-center text-secondary p-4">No post found in the database!</h2>
    @endforelse
@endsection

@section('sectioncourseright')
    @include('web.cdestacado')
@endsection
