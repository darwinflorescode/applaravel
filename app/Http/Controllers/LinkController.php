<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->get('id');
        $enlace = Link::where('course_id', '=', $id)->get();

        if (count($enlace) > 0) {
            foreach ($enlace as $key => $links) {
                $temp_array = array();
                $temp_array['id'] = $links->id;
                $temp_array['youtube'] = $links->youtube;
                $temp_array['facebook'] = $links->facebook;
                $temp_array['twitter'] = $links->twitter;
                $temp_array['tiktok'] = $links->tiktok;
                $temp_array['github'] = $links->github;
                $temp_array['pdf'] = $links->pdf;
                $temp_array['link'] = $links->link;
                $temp_array['course_id'] = $links->course_id;
                $temp_array['topic_theme'] = $links->links_courses->title;

                $data = $temp_array;
            }
        }

        return response()->json($data);

    }

    public function store(Request $request)
    {
        $arraydata = ['youtube' => $request->youtube, 'facebook' => $request->facebook, 'twitter' => $request->twitter, 'tiktok' => $request->tiktok, 'github' => $request->github, 'pdf' => $request->pdf, 'link' => $request->link, 'course_id' => $request->id_course_topic_];

        if ($request->id_enlaces == 0 || $request->id_enlaces == "") {
            /* GUARDAR DATOS */
            Link::create($arraydata);
        } else {
            /* ACTUALIZAR DATOS */
            $enlace = Link::find($request->id_enlaces);
            $enlace->update($arraydata);
        }

        return response()->json([
            'status' => 200,
        ]);
    }

    public function fetchAll(Request $request)
    {
        $id = $request->id;
        $enlace = Link::where('course_id', '=', $id)->get();

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
                if ($est->link != "") {
                    $linkss .= '<a href="' . $est->link . '" target="_blank" class="btn btn-info"><i class="bi bi-link"></i></a>';
                }

                $output .= '<tr>

                <td>
                <div class="btn-group" role="group" aria-label="Example Links">
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
