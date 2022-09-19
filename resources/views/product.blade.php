<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <!-- Button trigger modal -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Navbar</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Dropdown
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                      </li>
                    </ul>
                    <form class="d-flex" role="search">
                      <input name="search" id="search" type="search" class="form-control me-2"  placeholder="Search" aria-label="Search">
                      {{-- <button class="btn btn-outline-success " type="submit">Search</button> --}}
                    </form>
                  </div>
                </div>
              </nav>
        </div>
        <div class="col-12">
            <div id="alert">

            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Product
               </button>
               
               <!-- Modal -->
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                
                <form method="post" id="productForm" action="">
                    @csrf
                 <div class=" modal-dialog">
                   
                   <div class="modal-content">
                   
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       
                     </div>
                     <div class="modal-body">
                        <div class="m-3" id="msgcontainer">
                    
                        </div>
                         <div class="mb-3">
                             <label for="title" class="form-label">title</label>
                             <textarea class="form-control" id="title" rows="3" name="title"></textarea>
                           </div>
                         <div class="mb-3">
                             <label for="price" class="form-label">Price</label>
                             <input type="text" class="form-control" id="price" placeholder="price" name="price">
                           </div>
                           
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-primary svechange">Save changes</button>
                     </div>
                   </div>
                 </div>
                </form>
               </div>
               <div class="table-data">
                 <table class="table proTable">
                     <thead>
                       <tr>
                         <th scope="col">Sl</th>
                         <th scope="col">Title</th>
                         <th scope="col">Price</th>
                         <th scope="col">Action</th>
                       </tr>
                     </thead>
                     <tbody>
                        
                        @foreach ($products as $product)
                            
                        
                       <tr>
                         <td scope="row">{{$loop->index }}</td>
                         <td>{{$product->title}}</td>
                         <td>{{$product->price}}</td>
                         <td><a class="edit" data-id="{{$product->id}}" data-title="{{$product->title}}" data-price="{{$product->price}}" data-bs-toggle="modal" data-bs-target="#updateProduct" class="btn btn-info" href="">Edit</a> |
                           <span data-id="{{$product->id}}" class="delete">Delete</span></td>
                         
                       </tr>
                       @endforeach
                     </tbody>
                   </table>
                   {{ $products->links() }}
                  </div>
        </div>
    </div>
</div>
    @include('productupdate')
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function(){
    $(document).on('click','.svechange',function(){
        let title = $('#title').val()
        let price = $('#price').val()
    $.ajax({
        url:"{{route('productsave')}}",
        method:'post',
        data:{title:title,price:price},
        success:function (res) {
           if(res.success = 200){
            $('#alert').append("<p>"+res.message+"</p>")
            $(".modal").modal('hide')
            $("#productForm")[0].reset()
            $(".proTable").load(location.href+' .proTable')
           }
        },error:function(err){
            let error = err.responseJSON
            // console.log(error)
            $.each(error.errors,function(index, value){
                $('#msgcontainer').append("<p style='color:red'>"+value+"</p>");
            })
        }
    })
  });

// =================update ================

  $(document).on('click','.edit',function(){
       let id = $(this).data('id')
       let price = $(this).data('price')
       let title = $(this).data('title')
       $('#up_id').val(id)
       $('#up_title').val(title)
       $('#up_price').val(price)
   });
    $(document).on('click','.updatechange',function(){
        let id = $('#up_id').val()
        let title = $('#up_title').val()
        let price = $('#up_price').val()
    $.ajax({
        
        url:"update/"+id,
        method:'put',
        data:{id:id,title:title,price:price},
        success:function (res) {
           if(res.success = 200){
            $('#alert').append("<p>"+res.message+"</p>")
            $(".modal").modal('hide')
            $("#updateProductForm")[0].reset()
            $(".proTable").load(location.href+' .proTable')
           }
        },error:function(err){
            let error = err.responseJSON
            // console.log(error)
            $.each(error.errors,function(index, value){
                $('#upmsgcontainer').append("<p style='color:red'>"+value+"</p>");
            })
        }
    })
  });
  $(document).on('click','.delete',function(e){
    e.preventDefault();
    let id = $(this).data('id')
    if (confirm("Are you sure delete this prouct ??")) {
      $.ajax({
        url:"delete/"+id,
        method:'post',
        data:{id:id},
        success:function(res){
          if(res.success=200){
            $(".proTable").load(location.href+' .proTable');
            $('#alert').append("<p>"+res.message+"</p>")
          }
        }
      })
    }
  })
  // ================paginate=============
  $(document).on('click','.pagination a',function(e){
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1]
    product(page)
  function product(page){
    $.ajax({
      url:"product/pagination/paginate-data?page="+page,
      success:function(res){
       $('.table-data').html(res)
      }
    })
  }
})
// ===================search=================
$(document).on('keyup',function(e){
  e.preventDefault();
  let search = $('#search').val();
  $.ajax({
    url:'product/search',
    method:'get',
    data:{search:search},
    success: function(res){
      $('.table-data').html(res);
      if(res.status == 404){
        $('.table-data').html("<p>Not Found</p>");
      }
    }
  })
})
});



</script>
</body>
</html>