<!--CREATE--> 
<div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="viewSingleItem" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Item</h5>
                </div>
                <div class="modal-body">
                    <div class="conteiner">    
                        <input id="Title" class="form-control" type='text' name="title" placeholder="Name of the new thing"/>
                        <input id="Description" class="form-control" type='textarea' name="description" placeholder="Description of the new thing"/>
                        <input id="Price"  class="form-control" type='text' name="price" placeholder="Price"/>
                    </div>
                </div>   
                <div class="modal-footer">
                    <button id="AddAjax" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
<!--EDIT-->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="viewSingleItem" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                    </div>
                    <div class="modal-body">
                        <div class="conteiner">
                            <input type="hidden" id="EditID" name="item_id" />     
                            <input id="EditTitle" class="form-control" type='text' name="title" placeholder=""/>
                            <input id="EditDescription" class="form-control" type='textarea' name="description" placeholder=""/>
                            <input id="EditPrice"  class="form-control" type='text' name="price"  placeholder=""/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="UpdateAjax" class="btn btn-secondary">Update</button>
                    </div>
                </div>
            </div>
    </div>
<!--VIEW-->
<div class="modal fade" id="showmodal" tabindex="-1" aria-labelledby="viewSingleItem" aria-hidden="true">
    <div class="modal-dialog"style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;" > 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><div class="ViewTitle"></div></h5>
            </div>
            <div class="modal-body">
            <div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item ViewTitle"></li>
    <li class="list-group-item ViewDescription"></li>
    <li class="list-group-item ViewPrice">  €</li>
  </ul>
</div>

            </div>

            <div class="modal-footer"></div>
        </div>
    </div>
</div>


