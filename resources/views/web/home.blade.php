@extends('webapp.app')
@section('titulocenter', 'Últimos Artículos')
@section('tituloprincipal', '¡Bienvenidos!')
@section('contenidocentralsuperior')

    @forelse ($topics as $key => $row)
        <div class="single-stories">
            <label><img src="{{ Storage::url('public/images/') . $row->link_topics->category_topics->image }}"
                    alt="{{ $row->link_topics->category_topics->title }}"></label>
            <div>
                <a href="{{ route('web.buscartemas', $row->slug . '-' . $row->id) }}" title="{{ $row->link_topics->title }}">
                    <img src="{{ Storage::url('public/images/') . $row->link_topics->image }}"
                        alt="{{ $row->link_topics->title }}"></a>

                <b>{{ $row->link_topics->title }}</b>
            </div>
        </div>

    @empty
        <h2 class="text-center text-secondary p-4">¡No se encontraron artículos agregados!</h2>
    @endforelse
@endsection

@section('contenidotopicorcourse')
    @forelse ($courses as $key => $row)
        <div class="fb-post1">
            <div class="fb-post1-container">
                <div class="fb-post1-header">
                    <ul>
                        <li class="active"><a
                                href="{{ route('web.buscarcursos', $row->courses_views->slug . '-' . $row->courses_views->id) }}"
                                title="{{ $row->courses_views->title }}">{{ $row->courses_views->title }}</a></li>
                    </ul>
                </div>
                <div class="fb-p1-main">
                    <div class="post-title">
                        <img src="{{ Storage::url('public/images/') . $row->courses_views->image }}" alt="user picture">
                        <ul>
                            <li>
                                <h3>Categoría: {{ $row->courses_views->categories->title }} <span> .
                                        {{ $row->courses_views->updated_at->diffForHumans() }}</span></h3>
                            </li>
                            <li><span>
                                    {{ $row->courses_views->updated_at->formatLocalized('%A %d %B %Y') }}</span>
                            </li>
                        </ul>
                        <p>
                            {!! $row->courses_views->content !!}
                        </p>

                    </div>

                    <div class="post-images">
                        <div class="post-images1">
                            <img src="{{ Storage::url('public/images/') . $row->courses_views->image }}"
                                alt="{{ $row->courses_views->title }}">

                        </div>

                    </div>

                    <div class="post-icon">

                        {{-- EJEMPLO DE DESPLIEGUE --}}
                        @if ($row->link != '')
                            <a href="{{ $row->link }}" target="_blank">
                                <i class="fa-solid fa-globe" data-title="Ver Ejemplo."></i>
                            </a>
                        @endif

                        {{-- YOUTUBE --}}
                        @if ($row->youtube != '')
                            <a href="{{ $row->youtube }}" target="_blank">
                                <i class="fa-brands fa-youtube" data-title="Ver video en Youtube"></i>
                            </a>
                        @endif


                        {{-- GITHUB --}}
                        @if ($row->github != '')
                            <a href="{{ $row->github }}" target="_blank">
                                <i class="fa-brands fa-github" data-title="Código Fuente"></i>
                            </a>
                        @endif
                        {{-- Facebook --}}
                        @if ($row->facebook != '')
                            <a href="{{ $row->facebook }}" target="_blank">
                                <i class="fa-brands fa-facebook" data-title="Ver artículo en facebook"></i>
                            </a>
                        @endif

                        {{-- Twitter --}}
                        @if ($row->twitter != '')
                            <a href="{{ $row->twitter }}" target="_blank">
                                <i class="fa-brands fa-twitter" data-title="Ver artículo en Twitter"></i>
                            </a>
                        @endif
                        {{-- TikTok --}}
                        @if ($row->tiktok != '')
                            <a href="{{ $row->tiktok }}" target="_blank">
                                <i class="fa-brands fa-tiktok" data-title="Ver artículo en Tiktok"></i>
                            </a>
                        @endif
                        {{-- PDF --}}
                        @if ($row->pdf != '')
                            <a href="{{ $row->pdf }}" target="_blank">
                                <i class="fa-solid fa-file-pdf" data-title="Ver Documento PDF"></i>
                            </a>
                        @endif



                        <div class="like-comment">
                            <ul>
                                <li><i class="fa-regular fa-eye"></i> <span>{{ $row->view }}
                                        Views</span> </li>
                                <li><i class="fa-solid fa-download"></i>
                                    <span>{{ $row->download }} Download</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    @empty
        <h2 class="text-center text-secondary p-4">¡No se encontraron cursos agregados!</h2>
    @endforelse
@endsection


@section('sectioncourseright')
    <hr>

    <div class="friend">
        <h3 class="heading">Últimos Cursos Destacados</h3>
        @forelse ($courses_ult as $key => $row)
            <ul>
                <li>
                    <a href="{{ route('web.buscarcursos', $row->courses_views->slug . '-' . $row->courses_views->id) }}"
                        title="{{ $row->courses_views->title }}"><img
                            src="{{ Storage::url('public/images/') . $row->courses_views->image }}"
                            alt="{{ $row->courses_views->title }}"></a>
                </li>
                <li>
                    <b><a href="{{ route('web.buscarcursos', $row->courses_views->slug . '-' . $row->courses_views->id) }}"
                            title="{{ $row->courses_views->title }}">{{ $row->courses_views->title }}</a></b>
                    <p>{{ $row->courses_views->categories->title }} - {{ $row->courses_views->view }} views</p>
                </li>
            </ul>
        @empty
            <h2 class="text-center text-secondary p-4">¡No se encontraron cursos destacados!</h2>
        @endforelse
    </div>
@endsection
