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
        <h2 class="text-center text-secondary p-4">No post found in the database!</h2>
    @endforelse
</div>
