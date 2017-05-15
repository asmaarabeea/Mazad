@extends('product/index')



@section('content')

		<div class="row">
            <article class="articlestyle">
                <h3>{{$products->productName}}</h3>
                <p>{{$products->product_desc}}</p>
                <h3>Owner</h3>
                <label for="ownername">Name:</label>
                <p name="ownername">{{$products->user->name}}</p>
                <label for="ownerloc">Location:</label>
                <p name="ownerloc">{{$products->user->location}}</p>
            </article>
            <aside class="articlestyle">
                <img src="{{asset($products->product_img) }}" alt="">
            </aside>
        </div>
        <div class="row">
            <div class="col-md-4">
                <form method="post" action="{{URL('product')}}/{{$products->pid}}" class="form-inline">
                {{csrf_field()}}
                    <div class="col-md-5">
                        <input type="hidden" name="id" value="{{$products->pid}}">
                        <button  type="submit" 
                        class="btn btn-primary btn-lg">Bid</button>
                    </div>
                    <div class="col-md-5">
                        <input type="number" name="bidEdit" value="{{$products->price}}" class="form-control input-lg" placeholder="Price">
                    </div>                            
                </form>
            </div>
        </div>
@endsection	