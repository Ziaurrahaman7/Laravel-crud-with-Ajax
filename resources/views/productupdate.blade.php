<div class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="updateProductLabel" aria-hidden="true">
              
    <form method="post" id="updateProductForm" action="">
       
        @csrf
        @method('put')
        <input type="hidden" id="up_id" name="id">
     <div class=" modal-dialog">
       
       <div class="modal-content">
        <div class="m-3" id="upmsgcontainer">
            
        </div> 
         <div class="modal-header">
            <h5 class="modal-title" id="updateProductLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           
         </div>
         <div class="modal-body">
            <div class="m-3" id="msgcontainer">
        
            </div>
             <div class="mb-3">
                 <label for="title" class="form-label">title</label>
                 <textarea class="form-control" id="up_title" rows="3" name="title"></textarea>
               </div>
             <div class="mb-3">
                 <label for="price" class="form-label">Price</label>
                 <input type="text" class="form-control" id="up_price" placeholder="up_price" name="price">
               </div>
               
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary updatechange">Save changes</button>
         </div>
       </div>
     </div>
    </form>
   </div>