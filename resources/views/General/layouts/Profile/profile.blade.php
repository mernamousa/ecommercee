


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<main id="cart" style="max-width:960px">
  <div class="back"><a href="{{url('/')}}">&#11178;@lang('trans.shop')</a></div>
  <h1>@lang('trans.Profile')</h1>
  <div class="container-fluid">
    <div class="row align-items-start">
      <div class="col-12 col-sm-8 items">
				<span></span>
			
	      <div class="cartItem row align-items-start">
	        <div class="col-3 mb-2">
	          <img class="w-100" src="{{url('uploads/users/'.Auth::user()->image)}}">
	        </div>

	        <div class="col-3 mb-2">
	          <p class="pl-1 mb-0">
	          	<div>@lang('trans.name') :</div> <div>{{Auth::user()->name}}</div>
	          </p>
	        </div>
	        <div class="col-3 mb-2">
	          <p class="pl-1 mb-0">
	          	<div>@lang('trans.email') :</div> <div>{{Auth::user()->email}}</div>
	          </p>
	        </div>

	      </div>

	       <div class="cartItem row align-items-start">
	        <div class="col-3 mb-2">
	          <img class="w-100" >
	        </div>

	        <div class="col-3 mb-2">
	          <p class="pl-1 mb-0">
	          	<div>@lang('trans.phone') :</div> <div>{{Auth::user()->phone}}</div>
	          </p>
	        </div>
	        <div class="col-3 mb-2">
	          <p class="pl-1 mb-0">
	          	<div>@lang('trans.address') :</div> <div>{{Auth::user()->ship_address}}</div>
	          </p>
	        </div>

	      </div>

	      <hr>
      </div>


      <div class="col-12 col-sm-4 p-3 proceed form">
        <form action="{{url('updateProfile')}}" method="post" enctype="multipart/form-data">
        	@csrf
	        <div class="row m-0">
	        	
	        	<div class="form-group">
		          <div class="col-3 mb-2">
			          <img class="w-100" src="{{url('uploads/users/'.Auth::user()->image)}}">
			        </div>
		          <div class="p-0">
		            <input type="file" name="image" class="form-control" placeholder="image">
		          </div>
	        	</div>

	        	<div class="form-group">
		          <div class="p-0">
		            <input type="name" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="Name">
		          </div>
	        	</div>

	        	<div class="form-group">
		          <div class="p-0">
		            <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}" placeholder="phone">
		          </div>
	        	</div>

	        	<div class="form-group">
		          <div class="p-0">
		            <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email">
		          </div>
	        	</div>

	        	<div class="form-group">
		          <div class="p-0">
		            <input type="text" name="ship_address" class="form-control" value="{{Auth::user()->ship_address}}" placeholder="ship_address">
		          </div>
	        	</div>


	        	<hr>
		        <button id="btn-checkout" class="shopnow">
		        	<span>@lang('trans.Update Profile')</span>
		        </button>
		      </div>
	      </form>
    </div>
  </div>
  </div>
</main>
<footer class="container">
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
