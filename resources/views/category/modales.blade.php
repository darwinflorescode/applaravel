 {{-- MODALES DE REGISTRO Y VISUALIZACION DE DATOS --}}
 {{-- Add new Category --}}
 <div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
             </div>
             <form action="#" method="POST" id="add_category_form" enctype="multipart/form-data" autocomplete="off">
                 @csrf
                 <div class="modal-body p-4 bg-light">
                     <div class="row">
                         <div class="col-md-6">
                             <label for="nombre">Title</label>
                             <input type="text" name="title" class="form-control" placeholder="Title">
                             <span class="badge text-danger errors-title"></span>
                         </div>
                     </div>
                     <div class="mb-3">
                         <label for="contenido" class="form-label">Content</label>
                         <textarea class="form-control" name="contenido" id="contenido" rows="3"
                             placeholder="Content"></textarea>
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
                     <button type="submit" id="add_category_btn" class="btn btn-primary">Add
                         Category</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 {{-- add new Category modal end --}}

 {{-- Edit Category --}}
 <div class="modal fade" id="editcategory" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
             </div>
             <form action="#" method="POST" id="edit_category_form" enctype="multipart/form-data" autocomplete="off">
                 @csrf
                 <input type="hidden" name="idcategory" id="idcategory">
                 <input type="hidden" name="enlaceimg" id="enlaceimg">
                 <div class="modal-body p-4 bg-light">
                     <div class="row">
                         <div class="col-md-6">
                             <label for="titleedit">Title</label>
                             <input type="text" name="titleedit" id="titleedit" class="form-control" placeholder="Title"
                                 required>
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
                     <button type="submit" id="edit_category_btn" class="btn btn-primary">Update
                         Category</button>
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