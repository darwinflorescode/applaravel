<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use Illuminate\Http\Request;

class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Load Content Course ajax request
    public function index(Request $request)
    {
        $id = $request->get('id');
        $enlace = Enlace::where('topic_id', '=', $id)->get();

        if (count($enlace) > 0) {
            foreach ($enlace as $key => $links) {
                $temp_array = array();
                $temp_array['id'] = $links->id;
                $temp_array['articulo'] = $links->articulo;
                $temp_array['youtube'] = $links->youtube;
                $temp_array['facebook'] = $links->facebook;
                $temp_array['twitter'] = $links->twitter;
                $temp_array['tiktok'] = $links->tiktok;
                $temp_array['github'] = $links->github;
                $temp_array['pdf'] = $links->pdf;
                $temp_array['topic_id'] = $links->topic_id;
                $temp_array['topic_theme'] = $links->link_topics->title;

                $data = $temp_array;
            }
        }

        return response()->json($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arraydata = ['articulo' => $request->article, 'youtube' => $request->youtube, 'facebook' => $request->facebook, 'twitter' => $request->twitter, 'tiktok' => $request->tiktok, 'github' => $request->github, 'pdf' => $request->pdf, 'topic_id' => $request->id_course_topic_];

        if ($request->id_enlaces == 0 || $request->id_enlaces == "") {
            /* GUARDAR DATOS */
            Enlace::create($arraydata);
        } else {
            /* ACTUALIZAR DATOS */
            $enlace = Enlace::find($request->id_enlaces);
            $enlace->update($arraydata);
        }

        return response()->json([
            'status' => 200,
        ]);
    }

    //Cargar los valores del estudiante para mostralos en ajax
    public function fetchAll(Request $request)
    {
        $id = $request->id;
        $enlace = Enlace::where('topic_id', '=', $id)->get();

        $output = '';
        $linkss = '';

        $output .= '<table class="table table-hover table-striped table-sm table-responsive">
            <thead class="text-bg-primary">
            <tr>
            <th>Redes Sociales</th>
            </tr>
            </thead>
            <tbody>';
        if ($enlace->count() > 0) {
            foreach ($enlace as $est) {
                if ($est->youtube != "") {
                    $linkss .= '<a href="' . $est->youtube . '" target="_blank" class="btn btn-danger"><i class="bi bi-youtube"></i></a>';
                }
                if ($est->facebook != "") {
                    $linkss .= '<a href="' . $est->facebook . '" target="_blank" class="btn btn-primary"><i class="bi bi-facebook"></i></a>';
                }
                if ($est->github != "") {
                    $linkss .= '<a href="' . $est->github . '" target="_blank" class="btn btn-dark"><i class="bi bi-github"></i></a>';
                }
                if ($est->twitter != "") {
                    $linkss .= '<a href="' . $est->twitter . '" target="_blank" class="btn btn-info text-white"><i class="bi bi-twitter"></i></a>';
                }
                if ($est->tiktok != "") {
                    $linkss .= '<a href="' . $est->tiktok . '" target="_blank" class="btn btn-dark"><i class="bi bi-tiktok"></i></a>';
                }
                if ($est->pdf != "") {
                    $linkss .= '<a href="' . $est->pdf . '" target="_blank" class="btn btn-danger"><i class="bi bi-file-earmark-pdf-fill"></i></a>';
                }

                $output .= '<tr>

                <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                ' . $linkss . '
                </div>
                 </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {

            $output .= '<tbody><tr><td colspan="2"><div class="alert alert-danger text-center" role="alert">No record present in the database!</div></tr></td></tbody></table>';
            echo $output;
        }
    } //Fin fetchAll

}
