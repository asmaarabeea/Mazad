@extends('product/index')

@section("style")
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
@endsection

@section('content')
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Heighest Bid</th>
                        <th>No. of Bid</th>
                        <th>Owner</th>
                        <th>Location</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                      <tr>
                        @if(Auth::guest())
                            <td>
                                <a href="{{URL('product')}}/{{$product->pid}}">{{$product->productName}}</a></td>
                        @else
                        <td>{{$product->productName}}</td>
                        @endif
                        <td>{{$product->price}}</td>
                        <td>{{$product->highest_bid}}</td>
                        <td>{{$product->no_of_bid}}</td>
                        <td>{{$product->user->name}}</td>
                        <td>{{$product->user->location}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
@endsection


@section("script")
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
@endsection     