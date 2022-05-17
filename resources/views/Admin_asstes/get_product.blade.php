<option value="null">Select Product</option>

@forelse ( $products as $product )
<option value="{{$product->id}}">{{$product->name}}</option>
@empty
<option value="null">No product Found</option>
@endforelse

