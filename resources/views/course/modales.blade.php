 {{-- MODALES DE REGISTRO Y VISUALIZACION DE DATOS --}}
 {{-- Add new Category --}}
 <div class="modal fade" id="addform" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add New Course</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
             </div>
             <form action="#" method="POST" id="add_form_register" enctype="multipart/form-data"
                 autocomplete="off">
                 @csrf
                 <div class="modal-body p-4 bg-light">
                     <div class="row p-3 my-2 bg-info bg-opacity-10 border border-info rounded-end">
                         <div class="col-md-6">
                             <label for="id_category">Category</label>
                             <select class="form-select" name="id_category" id="id_category">
                                 <option value="">Choose Category...</option>
                                 @foreach ($category as $key => $row)
                                     <option value="{{ $row->id }}">{{ $row->title }}</option>
                                 @endforeach

                             </select>
                             <span class="badge text-danger errors-id_category"></span>
                         </div>
                         <div class="col-md-6">
                             <label for="id_user">User</label>
                             <select class="form-select" name="id_user" id="id_user">
                                 <option value="">Choose User...</option>
                                 @foreach ($users as $key => $datos)
                                     <option selected value="{{ $datos->id }}">{{ $datos->name }}</option>
                                 @endforeach

                             </select>
                             <span class="badge text-danger errors-id_user"></span>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <label for="nombre">Title</label>
                             <input type="text" name="title" class="form-control" placeholder="Title">
                             <span class="badge text-danger errors-title"></span>
                         </div>
                     </div>
                     <div class="mb-3">
                         <label for="contenido" class="form-label">Content</label>
                         <textarea class="form-control" name="contenido" id="contenido" rows="3" placeholder="Content"></textarea>
                         <span class="badge text-danger errors-contenido"></span>
                     </div>
                     <div class="col-md-6">
                         <label for="inlineFormSelectPref">Status</label>
                         <select class="form-select" name="status" id="inlineFormSelectPref">
                             <option value="">Choose...</option>
                             <option value="Activo">Activo</option>
                             <option value="Inactivo">Inactivo</option>
                         </select>
                         <span class="badge text-danger errors-status"></span>
                     </div>
                     <div class="my-2">
                         <label for="foto">Select imagen</label>
                         <input type="file" name="foto" class="form-control">
                         <span class="badge text-danger errors-foto"></span>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                         arialabel="Close">Close</button>
                     <button type="submit" id="add_form_btn" class="btn btn-primary">Add
                         Category</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 {{-- add new Category modal end --}}

 {{-- Edit Category --}}
 <div class="modal fade" id="editform" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
             </div>
             <form action="#" method="POST" id="edit_form_register" enctype="multipart/form-data"
                 autocomplete="off">
                 @csrf
                 <input type="hidden" name="idcategory" id="idcategory">
                 <input type="hidden" name="enlaceimg" id="enlaceimg">
                 <div class="modal-body p-4 bg-light">
                    <div class="row p-3 my-2 bg-info bg-opacity-10 border border-info rounded-end">
                        <div class="col-md-6">
                            <label for="id_categoryedit">Category</label>
                            <select class="form-select" name="id_categoryedit" id="id_categoryedit">
                                <option value="">Choose Category...</option>
                                @foreach ($category as $key => $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                @endforeach

                            </select>
          
                        </div>
                        <div class="col-md-6">
                            <label for="id_useredit">User</label>
                            <select class="form-select" name="id_useredit" id="id_useredit">
                                <option value="">Choose User...</option>
                                @foreach ($users as $key => $datos)
                                    <option selected value="{{ $datos->id }}">{{ $datos->name }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6">
                             <label for="titleedit">Title</label>
                             <input type="text" name="titleedit" id="titleedit" class="form-control"
                                 placeholder="Title" required>
                         </div>
                     </div>
                     <div class="mb-3">
                         <label for="contenidoedit" class="form-label">Content</label>
                         <textarea class="form-control" required name="contenidoedit" id="contenidoedit" rows="3"
                             placeholder="Contenido Edit"></textarea>
                     </div>
                     <div class="col-md-6">
                         <label for="statusedit">Status</label>
                         <select class="form-select" name="statusedit" id="statusedit" required>
                             <option value="">Choose...</option>
                             <option value="Activo">Activo</option>
                             <option value="Inactivo">Inactivo</option>
                         </select>
                     </div>

                     <div class="p-3 my-2 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                         <div class="mt-2" id="fotoeditview">
                         </div>
                         <div class="my-2">
                             <label for="fotoedit">Select nueva imagen</label>
                             <input type="file" name="fotoedit" id="fotoedit" class="form-control">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                         arialabel="Close">Close</button>
                     <button type="submit" id="edit_form_btn" class="btn btn-primary">Update
                         Course</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 {{-- Edit Category modal end --}}

 {{-- View category modal start --}}
 <div class="modal fade" id="loadContentModal" tabindex="-1" arialabelledby="title-view" data-bs-backdrop="static"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title" id="title-view"></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
             </div>
             <div class="modal-body p-4 bg-light">

                 <div id="viewInfo"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                     arialabel="Close">Close</button>

             </div>
         </div>
     </div>
 </div>
 {{-- View Category modal end --}}

 
 {{-- Enlaces --}}
 <div class="modal fade" id="editformenlace" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Update Links</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
             </div>
             <form action="{{ route('enlacess.store') }}" method="POST" id="edit_form_register_enlaces" enctype="multipart/form-data"
                 autocomplete="off">
                 @csrf
                 <input type="hidden" name="id_course_topic_" id="id_course_topic_" value="">
                 <input type="hidden" name="id_enlaces" id="id_enlaces" value="">
        
                 <div class="modal-body p-4 bg-light">

                    <div class="row p-3 my-2 bg-info bg-opacity-10 border border-info rounded-end">
                     
                        <div class="col-md-6">
                            <label for="article">Artículo</label>
                            <input type="text" name="article" id="article" class="form-control"
                                placeholder="article"  readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="link">Link</label>
                            <input type="url" name="link" id="link" class="form-control"
                                placeholder="Link" >
                        </div>
                    </div>
                     <div class="row p-3 my-2 bg-info bg-opacity-10 border border-info rounded-end">
                         <div class="col-md-6">
                             <label for="youtube">Youtube</label>
                             <input type="url" name="youtube" id="youtube" class="form-control"
                                 placeholder="youtube" >
                         </div>
                         <div class="col-md-6">
                            <label for="facebook">Facebook</label>
                            <input type="url" name="facebook" id="facebook" class="form-control"
                                placeholder="facebook" >
                        </div>
                     </div>
                     <div class="row p-3 my-2 bg-info bg-opacity-10 border border-info rounded-end">
                         <div class="col-md-6">
                             <label for="twitter">Twitter</label>
                             <input type="url" name="twitter" id="twitter" class="form-control"
                                 placeholder="twitter" >
                         </div>
                         <div class="col-md-6">
                            <label for="tiktok">Tiktok</label>
                            <input type="url" name="tiktok" id="tiktok" class="form-control"
                                placeholder="tiktok" >
                        </div>
                     </div>
                     <div class="row p-3 my-2 bg-info bg-opacity-10 border border-info rounded-end">
                         <div class="col-md-6">
                             <label for="github">Github</label>
                             <input type="url" name="github" id="github" class="form-control"
                                 placeholder="github" >
                         </div>
                         <div class="col-md-6">
                            <label for="pdf">Pdf</label>
                            <input type="url" name="pdf" id="pdf" class="form-control"
                                placeholder="pdf" >
                        </div>
                     </div>
                 

                     <div id="show_all_enlaces">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                         arialabel="Close">Close</button>
                     <button type="submit" id="edit_form_btn_enlaces" class="btn btn-primary">Update
                         Links</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 {{-- Edit Enlaces modal end --}}