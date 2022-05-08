


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<main id="cart" style="max-width:960px">
  <div class="back"><a href="{{url('/')}}">&#11178;@lang('trans.shop') </a></div>
  <h1>@lang('trans.Your Cart')</h1>
  <div class="container-fluid">
    <div class="row align-items-start">
      <div class="col-12 col-sm-8 items">
				@if(!empty($order))
						<span>@lang('trans.status') : {{$order->status}}</span>
						
					@if(!empty($items))
						@foreach($items as $item)
				      <div class="cartItem row align-items-start">
				        <div class="col-4 mb-2">
				          <img class="w-100" src="{{url('Admin_uploads/items/'.$item->itemImage)}}">
				        </div>
				        <div class="col-2 mb-2">
				          <h6 class="">{{$item->itemName}}</h6>
				          <p class="pl-1 mb-0">{{$item->s_propertyName}}</p>
				        </div>
				        <div class="col-4">
				          <p class="cartItemQuantity p-1 text-center">@lang('trans.quantity') : 
										<label class="col-2">
											<button onclick="return itemChangeCount('{{$item->id}}','plus')">
												<i class="fa fa-plus"></i>
											</button>
										</label>
										<input type="number" value="{{$item->quantity}}" class="col-4" id="{{$item->id}}">
										<label class="col-2">
											<button  onclick="return itemChangeCount('{{$item->id}}','minus')">
												<i class="fa fa-minus"></i>
											</button>
										</label>
				          </p>
				        </div>

				        <div class="col-2">
				          <p id="cartItem1Price">@lang('trans.discount') : {{$item->itemDiscount}}</p>
				        </div>
				        <div class="col-2">
				          <p id="cartItem1Price">@lang('trans.price') : {{$item->itemPrice}}</p>
				        </div>

				        <div class="col-2">
				          <p class="cartItemQuantity p-1 text-center"> 
										<a href="{{url('deleteItem/'.$item->id)}}">
											<i class="fa fa-trash" style="color:red"></i>
										</a>
				          </p>
				        </div>
				      </div>
				      <hr>
				    @endforeach
					@endif
      </div>
      <div class="col-12 col-sm-4 p-3 proceed form">
        
        <div class="row mx-0 mb-2" style="height:150px">
          <div class="col-sm-8 p-0 d-inline">
            <h5>@lang('trans.Total')</h5>
          </div>
          <div class="col-sm-4 p-0">
            <p id="total" style="font-weight: bold;">{{$order->total_price}}</p>
          </div>
        </div>
        <a href='{{url("confirm_order/".$order->id)}}'><button id="btn-checkout" class="shopnow"><span>@lang('trans.Checkout')</span></button></a>
      </div>
    </div>
  </div>
  </div>
</main>
@endif
<footer class="container">
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
	
	function itemChangeCount(itemId,status){
		
		//jquery
		var quantity = $("#"+itemId);
		if (status == 'plus') {
			newQ = parseInt(quantity.val()) + 1;
		}else{
			newQ = parseInt(quantity.val()) - 1;	
		}

		if(newQ > 0) {
			quantity.val(newQ);

			var url = "{{url('changeQuantityPlusMinus')}}/"+itemId+"/"+status;
			$.ajax({
			    url : url,
			    type : 'GET',
			    dataType:'json',
			    success : function(res) {              
			        if(res.status == true){
			        	alert('qty add');
			        }
			    }
			});
		}
	}


</script>