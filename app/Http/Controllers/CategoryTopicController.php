<?php

namespace App\Http\Controllers;

use App\Models\CategoryTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryTopicController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categorytopic.index');
    }

    //Cargar los valores del estudiante para mostralos en ajax
    public function fetchAll()
    {
        $category = CategoryTopic::all();
        $class = '';

        $output = '';

        $output .= '<table class="table table-hover table-striped table-sm table-responsive">
            <thead class="text-bg-primary sticky-top">
            <tr>
            <th width="6%">ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Content</th>
            <th>Status</th>
            <th width="5%">Acciones</th>
            </tr>
            </thead>
            <tbody>';
        if ($category->count() > 0) {
            foreach ($category as $est) {
                if ($est->status == 'Activo') {
                    $class = 'success';
                } else {
                    $class = 'danger';
                }
                $output .= '<tr>
                <td>' . $est->id . '</td>
                <td><img src="' . Storage::url('public/images/') . $est->image . '" width="50" class="img-thumbnail roundedcircle"></td>
                <td>' . $est->title . '</td>
                <td><a href="#" title="Ver contenido" id="' . $est->id . '" class="text-primary mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#loadContentModal"><i class="bi bi-eye-fill h4"></i></a>
                </td>
                <td><span class="badge rounded-pill text-bg-' . $class . '">' . $est->status . '</span></td>
                <td>
                <a href="#" id="' . $est->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editcategory"><i class="bi-pencil-square h4"></i></a>
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

    // Load Content Category ajax request
    public function loadContent(Request $request)
    {
        $id = $request->id;
        $category = CategoryTopic::find($id);
        return response()->json($category);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "title" => "required",
            "contenido" => "required",
            "status" => "required",
            "foto" => "required",
        ];
        $mensajes = [
            "title.required" => "El titulo es requerido",
            "contenido.required" => "El Contenido es requerido",
            "status.required" => "El estado es requerido",
            "foto.required" => "La imagen es requerida",
        ];

        $validator = Validator::make($request->all(), $campos, $mensajes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'title' => $errors->get('title'),
                'contenido' => $errors->get('contenido'),
                'status' => $errors->get('status'),
                'foto' => $errors->get('foto'),
                'alerta' => 'danger',
            ]);
        } else {
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $arrayCategory = ['title' => $request->title, 'content' => $request->contenido, 'status' => $request->status, 'image' => $fileName];

            /* RENOMBRAR IMAGEN DE SUMMERNOTE */

            $dom = new \DomDocument();
            $dom->loadHtml(utf8_decode($arrayCategory['content']), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $image_file = $dom->getElementsByTagName('img');

            if (!File::exists(public_path('uploads'))) {
                File::makeDirectory(public_path('uploads'));
            }

            foreach ($image_file as $key => $image) {
                $data = $image->getAttribute('src');

                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                /*    echo $data; */

                $img_data = base64_decode($data);
                $image_name = "/uploads/" . time() . $key . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $img_data);

                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }
            $arrayCategory['content'] = utf8_encode($dom->saveHTML());

            CategoryTopic::create($arrayCategory);
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryTopic  $category
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryTopic $categorytopic)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryTopic  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryTopic $categorytopic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryTopic  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /* RECUPERAR CATEGORÍA POR MEDIO DEL ID */
        $category = CategoryTopic::find($request->idcategory);


        /* VERIFICAR RESULTADOS EN PANTALLA */
        /*  echo $cont;
        echo "<br>-------------------------------<br>";
        echo "<pre>";
        var_dump($arrayImg);
        echo "</pre>";

        echo "<pre>";
        var_dump($arrayImgdb);
        echo "</pre>";
        echo "<pre>";
        var_dump(array_diff($arrayImg,$arrayImgdb));
        echo "</pre>"; */

        $eliminar = false;
        for ($i = 0; $i < count($arrayImgdb); $i++) {
            $eliminar = false;
            /*  echo "<br><br>".$arrayImgdb[$i]."<br><br>"; */

            for ($j = 0; $j < count($arrayImg); $j++) {
                if ($arrayImgdb[$i] == $arrayImg[$j]) {
                    $eliminar = true;
                }
                /*  echo $arrayImg[$j]."<br>"; */
            }

            if (!$eliminar) {
                $url = public_path() . $arrayImgdb[$i];
                /* echo $url; */
                if (file_exists($url)) {
                    unlink($url);

                }
                /*   echo "Eliminado"; */
            }
        }

        foreach ($image_file as $key => $image) {
            $data = $image->getAttribute('src');
            if (!file_exists(public_path() . $data)) {
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                $img_data = base64_decode($data);
                $image_name = "/uploads/" . time() . $key . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $img_data);

                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
                /*  echo $data; */
            }

        }

        $arrayCategory['content'] = utf8_encode($dom->saveHTML());

        $category->update($arrayCategory);

        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryTopic  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = CategoryTopic::find($id);
        if (Storage::delete('public/images/' . $category->image)) {
            $dom = new \DomDocument();
            @$dom->loadHtml(utf8_encode($category->content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $image_file = $dom->getElementsByTagName('img');
            $url = "";
            foreach ($image_file as $key => $image) {
                $data = $image->getAttribute('src');

                $url = public_path() . $data;

                if (file_exists($url)) {
                    unlink($url);

                }
            }

            CategoryTopic::destroy($id);
        }
    }
}
