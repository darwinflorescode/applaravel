<?php

namespace App\Http\Controllers;

use App\Models\CategoryTopic;
use App\Models\Enlace;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorytopic = CategoryTopic::orderBy('id', 'desc')->get();

        return view('topic.index', ['categorytopic' => $categorytopic]);
    }

    //Cargar los valores del estudiante para mostralos en ajax
    public function fetchAll()
    {
        $topic = Topic::all();
        $class = '';

        $output = '';

        $output .= '<table class="table table-hover table-striped table-sm table-responsive">
            <thead class="text-bg-primary sticky-top">
            <tr>
            <th width="6%">ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Category Topic</th>
            <th>Content</th>
            <th>View</th>
            <th>Download</th>
            <th>Rating</th>
            <th>Status</th>
            <th width="12%">Acciones</th>
            </tr>
            </thead>
            <tbody>';
        if ($topic->count() > 0) {
            foreach ($topic as $est) {
                if ($est->status == 'Activo') {
                    $class = 'success';
                } else {
                    $class = 'danger';
                }
                $output .= '<tr>
                <td>' . $est->id . '</td>
                <td><img src="' . Storage::url('public/images/') . $est->image . '" width="50" class="img-thumbnail roundedcircle"></td>
                <td>' . $est->title . '</td>
                <td>' . $est->category_topics->title . '</td>
                <td><a href="#" title="Ver contenido" id="' . $est->id . '" class="text-primary mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#loadContentModal"><i class="bi bi-eye-fill h4"></i></a>
                </td>
                <td><span class="badge rounded-pill text-bg-primary">' . $est->view . '</span></td>
                <td><span class="badge rounded-pill text-bg-info">' . $est->download . '</span></td>
                <td><span class="badge rounded-pill text-bg-warning">' . $est->rating . '</span></td>
                <td><span class="badge rounded-pill text-bg-' . $class . '">' . $est->status . '</span></td>
                <td>
                <a href="#" id="' . $est->id . '" class="text-primary mx-1 editeIcon" data-bs-toggle="modal" data-bs-target="#editformenlace"><i class="bi bi-link h4"></i></a>
                <a href="#" id="' . $est->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editform"><i class="bi-pencil-square h4"></i></a>
                <a href="#" id="' . $est->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {

            $output .= '<tbody><tr><td colspan="10"><div class="alert alert-danger text-center" role="alert">No record present in the database!</div></tr></td></tbody></table>';
            echo $output;
        }
    } //Fin fetchAll

    // Load Content Topic ajax request
    public function loadContent(Request $request)
    {
        $id = $request->id;
        $course = Topic::find($id);
        return response()->json($course);
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
            "id_category" => "required",
            "contenido" => "required",
            "status" => "required",
            "foto" => "required",
        ];
        $mensajes = [
            "title.required" => "El titulo es requerido",
            "id_category.required" => "La categoría es requerido",
            "contenido.required" => "El Contenido es requerido",
            "status.required" => "El estado es requerido",
            "foto.required" => "La imagen es requerida",
        ];

        $validator = Validator::make($request->all(), $campos, $mensajes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'title' => $errors->get('title'),
                'id_category' => $errors->get('id_category'),
                'contenido' => $errors->get('contenido'),
                'status' => $errors->get('status'),
                'foto' => $errors->get('foto'),
                'alerta' => 'danger',
            ]);
        } else {
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);

            $valorAleatorio = uniqid();
            $slug = Str::of($request->title)->slug("-")->limit(100 - mb_strlen($valorAleatorio) - 1, "")->trim("-")->append("-", $valorAleatorio);

            $arraydata = ['title' => $request->title, 'slug' => $slug, 'content' => $request->contenido, 'status' => $request->status, 'view' => 0, 'download' => 0, 'rating' => 0, 'image' => $fileName, 'categorytopic_id' => $request->id_category];

            /* RENOMBRAR IMAGEN DE SUMMERNOTE */

            $dom = new \DomDocument();
            $dom->loadHtml(utf8_decode($arraydata['content']), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $image_file = $dom->getElementsByTagName('img');

            if (!File::exists(public_path('uploads'))) {
                File::makeDirectory(public_path('uploads'));
            }
        }
    } //Fin Store

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $Topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /* RECUPERAR Course POR MEDIO DEL ID */
        $topic = Topic::find($request->idcategory);

        /* VERIFICAR SI HA MODIFICADO LA IMAGEN */

        if ($request->hasFile('fotoedit')) {
            $file = $request->file('fotoedit');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if ($topic->image) {
                Storage::delete('public/images/' . $topic->image);
            }
        } else {
            $fileName = $request->enlaceimg;
        }

        $cadena = $topic->slug;

        $splitt = explode("-", $cadena);

        //Aquí simplemente le pasas el número de la palabra que quieras obtener
        $ultimaPlabra = $splitt[count($splitt) - 1];

        $valorAleatorio = $ultimaPlabra;
        $slug = Str::of($request->titleedit)->slug("-")->limit(100 - mb_strlen($valorAleatorio) - 1, "")->trim("-")->append("-", $valorAleatorio);

        $arraydata = ['title' => $request->titleedit, 'slug' => $slug, 'content' => $request->contenidoedit, 'status' => $request->statusedit, 'image' => $fileName, 'categorytopic_id' => $request->id_categoryedit];

        /* RENOMBRAR IMAGEN DE SUMMERNOTE NUEVAS*/
        $dom = new \DomDocument();
        @$dom->loadHtml(utf8_decode($arraydata['content']), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $image_file = $dom->getElementsByTagName('img');

        /* PARA EL CONTENIDO DE LA BASE DE DATOS */
        /* RENOMBRAR IMAGEN DE SUMMERNOTE NUEVAS*/
        $dom1 = new \DomDocument();
        @$dom1->loadHtml(utf8_decode($arraydata['content']), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $image_file1 = $dom1->getElementsByTagName('img');
        $cont = 0;
        $arrayImg = [];
        $arrayImgdb = [];
        foreach ($image_file1 as $key => $image1) {
            $data1 = $image1->getAttribute('src');
            array_push($arrayImgdb, $data1);
            foreach ($image_file as $key => $image) {
                $data = $image->getAttribute('src');
                if (pathinfo($data1, PATHINFO_BASENAME) == pathinfo($data, PATHINFO_BASENAME)) {
                    $cont++;
                    array_push($arrayImg, $data);
                }
            }
        }

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

        $arraydata['content'] = utf8_encode($dom->saveHTML());

        $topic->update($arraydata);

        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $topic = Topic::find($id);
        if (Storage::delete('public/images/' . $topic->image)) {
            $dom = new \DomDocument();
            @$dom->loadHtml(utf8_encode($topic->content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $image_file = $dom->getElementsByTagName('img');
            $url = "";
            foreach ($image_file as $key => $image) {
                $data = $image->getAttribute('src');

                $url = public_path() . $data;

                if (file_exists($url)) {
                    unlink($url);
                }
            }

            Topic::destroy($id);
        }
    }
}
