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