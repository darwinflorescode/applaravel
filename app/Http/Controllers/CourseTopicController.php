<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseTopic;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course)
    {
        $cursos = Course::findOrFail($course);
        return view('topic-course.index', ['courses' => $cursos]);
    }

    //Cargar los valores del estudiante para mostralos en ajax
    public function fetchAll(Request $request)
    {
        $id = $request->id;
        $Course = CourseTopic::where('course_id', '=', $id)->get();

        $class = '';

        $output = '';
        $tuta = '';

        $output .= '<table class="table table-hover table-striped table-sm table-responsive">
             <thead class="text-bg-primary">
             <tr>
             <th width="6%">ID</th>
             <th>IMAGE</th>
             <th>TEMA</th>
             <th width="12%">Acciones</th>
             </tr>
             </thead>
             <tbody>';
        if ($Course->count() > 0) {
            foreach ($Course as $est) {

                $ruta = route('topic-course.view', $est->id);
                $output .= '<tr>
                 <td>' . $est->id . '</td>
                 <td><img src="' . Storage::url('public/images/') . $est->topics_views->image . '" width="50" class="img-thumbnail roundedcircle"></td>
                 <td>' . $est->topics_views->title . '</td>
                 <td>
                 <a href="' . $ruta . '"  class="text-primary mx-1"><i class="bi bi-globe h4"></i></a>

                 <a href="#" id="' . $est->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                 </td>
                 </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {

            $output .= '<tbody><tr><td colspan="6"><div class="alert alert-danger text-center" role="alert">No record present in the database!</div></tr></td></tbody></table>';
            echo $output;
        }
    }

    public function searchCourse(Request $request)
    {

        $term = $request->get('term');
        $topic = Topic::where('title', 'LIKE', '%' . $term . '%')->get();

        /*  $output['label'] = 'Registros no encontrados'; */

        $data = [];
        if (count($topic) > 0) {
            foreach ($topic as $key => $tema) {
                $temp_array = array();
                $temp_array['value'] = $tema->title;
                $temp_array['idcurso'] = $tema->id;
                $temp_array['label'] = '<img src="' . Storage::url('public/images/') . $tema->image . '" width="60" />&nbsp;' . $tema->title . ' - ' . $tema->category_topics->title;
                $data[] = $temp_array;
            }
        } else {
            /*  $data['idcurso'] = ''; */
            $data['label'] = 'Registros no encontrados';
        }

        return json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos = [
            "id_topic" => "required",
        ];
        $mensajes = [
            "id_topic.required" => "El tema es requerido",
        ];

        $validator = Validator::make($request->all(), $campos, $mensajes);
  
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseTopic  $courseTopic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        CourseTopic::destroy($id);

    }
}
