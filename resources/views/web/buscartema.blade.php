@extends('webapp.app')

@foreach ($temaactivo as $key => $row)
    @section('tituloprincipal', $row->link_topics->title)
    @section('tituloarticle', '👩‍💻💻 Darwinflocode 🖥👨‍💻 | ' . $row->link_topics->title)
    @section('imgog', Storage::url('public/images/') . $row->link_topics->image)
@endforeach

@section('contenidocentralsuperior')

    @forelse ($temaactivo as $key => $row)
        @section('titulocenter', 'Artículo: ' . $row->link_topics->title)
        <div class="cursoview">
            <div class="fb-post1">
                <div class="fb-post1-container">
                    <div class="fb-post1-header">
                        <ul>
                            <li class="active"><a
                                    href="{{ route('web.buscartemas', $row->link_topics->slug . '-' . $row->link_topics->id) }}"
                                    title="{{ $row->link_topics->title }}">{{ $row->link_topics->title }}</a></li>
                        </ul>
                    </div>
                    <div class="fb-p1-main">
                        <div class="post-title">
                            <img src="{{ Storage::url('public/images/') . $row->link_topics->image }}" alt="user picture">
                            <ul>
                                <li>
                                    <h3>Categoría: {{ $row->link_topics->category_topics->title }} <span> .
                                            {{ $row->link_topics->created_at->diffForHumans() }}</span></h3>
                                </li>
                                <li><span>
                                        {{ $row->link_topics->created_at->formatLocalized('%A %d %B %Y') }}</span>
                                </li>
                            </ul>
                            <p>
                                {!! $row->link_topics->content !!}
                            </p>
                        </div>

                        <div class="post-images">
                            <div class="post-images1">
                                <img src="{{ Storage::url('public/images/') . $row->link_topics->image }}"
                                    alt="{{ $row->link_topics->title }}">

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
        </div>
        @empty
            <h2 class="text-center text-secondary p-4">No post found in the database!</h2>
        @endforelse
    @endsection

    @section('sectioncourseright')
        @include('web.cdestacado')
    @endsection
