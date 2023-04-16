<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseTopic;
use App\Models\Enlace;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppiController extends Controller
{


    public static function consultarTemas($limite, $campoOrden, $condicion)
    {
        //Consulta para validar si los cursos tienen temas asginados
        $Topic = Enlace::select(
            "topics.*",
            "enlaces.*",
        )->join('topics', 'enlaces.topic_id', '=', 'topics.id')->groupBy('topics.id')->having('topics.status', 'Activo')->limit($limite)->orderBy($campoOrden, 'desc')->get();

        /* VERIFICAR SI EL PARAMETRO CONDICIÓN TRAE VALOR PORA REALIZAR LA CONSULTA DE ACUERDO A LA CONDICION */
        if (is_numeric($condicion) && $condicion > 0) {

            $Topic = CourseTopic::select(
                "course_topics.*",
                "topics.*",
                "enlaces.*",
            )->join('topics', 'course_topics.topic_id', '=', 'topics.id')->join('enlaces', 'enlaces.topic_id', '=', 'topics.id')->where('topics.status', 'Activo')->where('course_topics.course_id', $condicion)->limit($limite)->orderBy($campoOrden, 'desc')->get();
        }

        //CONDICION PARA VERIFICAR EL CAMPO DE YOUTUBE ES MAYOR A
        if ($condicion == 'youtube') {
            $Topic = Enlace::select(
                "topics.*",
                "enlaces.*",
            )->join('topics', 'enlaces.topic_id', '=', 'topics.id')->groupBy('topics.id')->having('topics.status', 'Activo')->having('enlaces.youtube', '>', '')->limit($limite)->orderBy($campoOrden, 'desc')->get();
        }

        return $Topic;
    }

    public static function consultarTema($limite, $campoOrden, $condicion)
    {
        //Consulta para validar si los cursos tienen temas asginados
        $Topic = Enlace::select(
            "topics.*",
            "enlaces.*",
        )->join('topics', 'enlaces.topic_id', '=', 'topics.id')->where('topics.status', 'Activo')->where('topics.id', '=', $condicion)->limit($limite)->orderBy($campoOrden, 'desc')->get();

        return $Topic;
    }

    public function index()
    {

        try {

            $Course = $this::consultarCursos(8, 'courses.id', 'j'); //Mostrar los 8 cursos activos que tengas temas agregados

            /* Últimos 3 cursos añadidos - consulta ordenada por las vistas */
            $Course_ult = $this::consultarCursos(3, 'courses.view', 'j'); //Mostrar los 3 cursos activos que tengas temas agregados

            //Consulta para los temas o artículos
            $Topic = $this::consultarTemas(5, 'topics.id', '');

            /* Consultar temas destacados por las vistas */
            $Topic_article = $this::consultarTemas(3, 'topics.view', '');

            $Enlace = $this::consultarTemas(1, 'topics.id', 'youtube');

            /* ARREGLOS DE DATOS ENCONTRADOS */
            $data = ['enlaces' => $Enlace, 'courses' => $Course, 'topics' => $Topic, 'topics_article' => $Topic_article, 'courses_ult' => $Course_ult];
            return view('web.home')->with($data);
        } catch (\Throwable$th) {
            return view('web.error');
        }
    }

    public function cursos()
    {

        try {
            $Course = $this::consultarCursos(8, 'courses.id', 'j'); //Mostrar los 8 cursos activos que tengas temas agregados

            /* Últimos 3 cursos añadidos - consulta ordenada por las vistas */
            $Course_ult = $this::consultarCursos(3, 'courses.view', 'j'); //Mostrar los 3 cursos activos que tengas temas agregados

            $cursos = $this::consultarCursos(20, 'courses.id', 'j'); //Mostrar los 8 cursos activos que tengas temas agregados

            //Consulta para los temas o artículos
            $Topic = $this::consultarTemas(5, 'topics.id', '');

            /* Consultar temas destacados por las vistas */
            $Topic_article = $this::consultarTemas(3, 'topics.view', '');

            $Enlace = $this::consultarTemas(1, 'topics.id', 'youtube');

            $data = ['cursos' => $cursos, 'enlaces' => $Enlace, 'courses' => $Course, 'topics' => $Topic, 'topics_article' => $Topic_article, 'courses_ult' => $Course_ult];

            return view('web.cursos', $data);

        } catch (\Throwable$th) {
            return view('web.error');
        }
    }
    public function temas()
    {
        try {
            $Course = $this::consultarCursos(8, 'courses.id', 'j'); //Mostrar los 8 cursos activos que tengas temas agregados

            /* Últimos 3 cursos añadidos - consulta ordenada por las vistas */
            $Course_ult = $this::consultarCursos(3, 'courses.view', 'j'); //Mostrar los 3 cursos activos que tengas temas agregados

            //Consulta para los temas o artículos
            $Topic = $this::consultarTemas(5, 'topics.id', '');

            $Temas = $this::consultarTemas(20, 'topics.id', '');

            /* Consultar temas destacados por las vistas */
            $Topic_article = $this::consultarTemas(3, 'topics.view', '');

            $Enlace = $this::consultarTemas(1, 'topics.id', 'youtube');

            $data = ['temas' => $Temas, 'enlaces' => $Enlace, 'courses' => $Course, 'topics' => $Topic, 'topics_article' => $Topic_article, 'courses_ult' => $Course_ult];

            return view('web.temas', $data);
        } catch (\Throwable$th) {
            return view('web.error');
        }
    }

    public function buscarCursos($id)
    {

        try {
            //Descincriptar el id de la base de datos

            $cadena = $id;

            $splitt = explode("-", $cadena);

            //Aquí simplemente le pasas el número de la palabra que quieras obtener
            $ultimaPlabra = $splitt[count($splitt) - 1];

            $id_course = $ultimaPlabra;

            /* Actualizar la vista del tema en DB */
            $course_update = Course::find($id_course);
            $arrayCourse = ['view' => $course_update->view + 1];
            $course_update->update($arrayCourse);
            /* ------------------------------------------------------- */

            //Consulta para validar si los cursos tienen temas asginados
            $Course = $this::consultarCursos(8, 'courses.id', 'j'); //Mostrar los 8 cursos activos que tengas temas agregados

            /* Últimos 3 cursos añadidos - consulta ordenada por las vistas */
            $Course_ult = $this::consultarCursos(3, 'courses.view', 'j'); //Mostrar los 3 cursos activos que tengas temas agregados

            $cursoactivo = $this::consultarCursos(1, 'courses.id', $id_course);

            //Consulta para los temas o artículos
            $Topic = $this::consultarTemas(5, 'topics.id', '');

            $TemasCurso = $this::consultarTemas(200, 'topics.id', $id_course);

            /* Consultar temas destacados por las vistas */
            $Topic_article = $this::consultarTemas(3, 'topics.view', '');

            $Enlace = $this::consultarTemas(1, 'topics.id', 'youtube');

            $data = ['temascurso' => $TemasCurso, 'cursoactivo' => $cursoactivo, 'enlaces' => $Enlace, 'courses' => $Course, 'topics' => $Topic, 'topics_article' => $Topic_article, 'courses_ult' => $Course_ult];

            return view('web.buscarcurso', $data);
        } catch (\Throwable$th) {
            return view('web.error');
        }
    }

    public function buscarTemas($id)
    {
        try {
            //Desincriptar ID

            $cadena = $id;

            $splitt = explode("-", $cadena);

            //Aquí simplemente le pasas el número de la palabra que quieras obtener
            $ultimaPlabra = $splitt[count($splitt) - 1];

            $id_topic = $ultimaPlabra;

            //Buscar el tema de acuerdo al id
            $topic_update = Topic::find($id_topic);

            /* Actualizar la vista del tema en DB */
            $arrayTopic = ['view' => $topic_update->view + 1];
            $topic_update->update($arrayTopic);

            //Consulta para validar si los cursos tienen temas asginados
            $Course = $this::consultarCursos(8, 'courses.id', 'j'); //Mostrar los 8 cursos activos que tengas temas agregados

            /* Últimos 3 cursos añadidos - consulta ordenada por las vistas */
            $Course_ult = $this::consultarCursos(3, 'courses.view', 'j'); //Mostrar los 3 cursos activos que tengas temas agregados

            $temaactivo = $this::consultarTema(1, 'topics.id', $id_topic);

            //Consulta para los temas o artículos
            $Topic = $this::consultarTemas(5, 'topics.id', '');

            $TemasCurso = $this::consultarTemas(200, 'topics.id', $id_topic);

            /* Consultar temas destacados por las vistas */
            $Topic_article = $this::consultarTemas(3, 'topics.view', '');

            /* Consultar los enlaces de youtube */
            $Enlace = $this::consultarTemas(1, 'topics.id', 'youtube');

            $data = ['temascurso' => $TemasCurso, 'temaactivo' => $temaactivo, 'enlaces' => $Enlace, 'courses' => $Course, 'topics' => $Topic, 'topics_article' => $Topic_article, 'courses_ult' => $Course_ult];

            return view('web.buscartema', $data);

        } catch (\Throwable$th) {
            return view('web.error');

        } // fin del trycatch
    } // Fin función -  buscar temas

    /* BUSCAR POR MEDIO DE JQUERY UI */
    public function buscarCursosInput(Request $request)
    {

        $term = $request->get('term');

        //Consulta para validar si los cursos tienen temas asginados
        $topic = CourseTopic::select(
            "topics.*",
            "courses.*",
            "links.*",
        )->join('topics', 'course_topics.topic_id', '=', 'topics.id')->join('courses', 'course_topics.course_id', '=', 'courses.id')->join('links', 'links.course_id', '=', 'courses.id')->groupBy('course_topics.course_id')->having('courses.status', 'Activo')->having('topics.status', 'Activo')->where('courses.title', 'LIKE', '%' . $term . '%')->orderBy('courses.id', 'desc')->get();

        /*  $output['label'] = 'Registros no encontrados'; */

        $data = [];
        $info = "";
        if (count($topic) > 0) {
            foreach ($topic as $key => $row) {
                $temp_array = array();
                $temp_array['value'] = $row->courses_views->title;
                $temp_array['idcurso'] = $row->courses_views->id;
                $temp_array['slug'] = $row->courses_views->slug;
                $temp_array['label'] = '<img src="' . Storage::url('public/images/') . $row->courses_views->image . '" width="60" heigth="60" class="change" />&nbsp;' . $row->courses_views->title;
                $data[] = $temp_array;
            }
        } else {
            /*  $data['idcurso'] = ''; */
            $data['label'] = 'Registros no encontrados';
        }

        return json_encode($data);
    } //end buscar Coursos

    /* BUSCAR POR MEDIO DE JQUERY UI */
    public function buscarTopicsInput(Request $request)
    {

        $term = $request->get('term');

        //Consulta para validar si los cursos tienen temas asginados
        $topic = Topic::where('status', 'Activo')->where('title', 'LIKE', '%' . $term . '%')->orderBy('id', 'desc')->get();

        /*  $output['label'] = 'Registros no encontrados'; */

        $data = [];
        $info = "";
        if (count($topic) > 0) {
            foreach ($topic as $key => $row) {
                $temp_array = array();
                $temp_array['value'] = $row->title;
                $temp_array['idcurso'] = $row->id;
                $temp_array['slug'] = $row->slug;
                $temp_array['label'] = '<img src="' . Storage::url('public/images/') . $row->image . '" width="60" heigth="60" class="change" />&nbsp;' . $row->title;
                $data[] = $temp_array;
            }
        } else {
            /*  $data['idcurso'] = ''; */
            $data['label'] = 'Registros no encontrados';
        }

        return json_encode($data);
    }
}
