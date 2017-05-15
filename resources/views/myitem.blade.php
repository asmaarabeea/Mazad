@extends('product.index')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-4" class="editprofilestyle">
            <h4>{{Auth::user()->name}}</h4>
        </div>
        <div class="col-md-4" class="editprofilestyle">
            <h4><a href="{{URL('profile')}}/{{Auth::id()}}">edit Profile</a></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-6">
            <h4>My Item List:</h4>
        </div>
        <div class="col-md-5">
            
                <div class="col-md-6">
                    <a href="{{URL('product')}}" class="btn btn-primary">Add One</a>
                </div>
            
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Online</th>
                <th>Heighest Bid</th>
                <th>No. of Bid</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($items))
            @foreach($items as $item)
            <tr>
                <td>{{$item->productName}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->online}}</td>
                <td>{{$item->highest_bid}}</td>
                <td>{{$item->no_of_bid}}</td>                      
                <td>
                    <form class="" method="POST">
                        <input type="hidden" name="method" value="delete">
                        {{ csrf_field() }}
                        <a href="{{ URL('delete') }}/{{ $item->pid }}" onclick="return confirm('Are you sure to delete this item');" name="name" value="delete"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                        <a href="{{ URL('edit') }}/{{ $item->pid }}"><i class="glyphicon glyphicon-edit"></i></a>
                    </form>
                </td>                       
            </tr>
        </tbody>
        @endforeach
    @endif
    </table>
</div>
</div>
@endsection