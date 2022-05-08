<div class="content-wrapper">
	<section class="content">
		<div class="row">
	        <div class="col-xs-12">
	            @if(session()->has('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
	            @endif
	            @if(session()->has('warning'))
	            	<div class="alert alert-warning">{{session('warning')}}</div>
	            @endif
	          	<div class="box">
		            <div class="box-header">
		              	<div class="col-xs-6">
			              	<h3 class="box-title">@lang('trans.category Info')</h3>
		              	</div>
				      	<a href="{{url('admin/viewCreateItem')}}" class="btn btn-primary col-xs-6">
				      		<i class="fa fa-plus"></i>
				      		@lang('trans.add')
				      	</a>
		            </div>

		            <div class="box-body table-responsive no-padding">
		              	<table class="table table-hover">
			                <tr>
			                  	<th>#</th>
			                  	<th>@lang('trans.itemName')</th>
			                  	<th>@lang('trans.itemNameAr')</th>
			                  	<th>@lang('trans.itemDesc')</th>
			                  	<th>@lang('trans.itemDescAr')</th>
			                  	<th>@lang('trans.itemPrice')</th>
			                  	<th>@lang('trans.itemDiscount')</th>
			                  	<th>@lang('trans.itemAvailable')</th>
			                  	<th>@lang('trans.itemImage')</th>
			                  	<th>@lang('trans.operations')</th>
			                </tr>
						@if(!empty($items))
							@foreach($items as $key=>$item)
								<tr>
						          	<td>{{$key+1}}</td>
						          	<td>{{$item->itemName}}</td>
						          	<td>{{$item->itemNameAr}}</td>
						          	<td>{{$item->itemDesc}}</td>
						          	<td>{{$item->itemDescAr}}</td>
						          	<td>{{$item->itemPrice}}</td>
						          	<td>{{$item->itemDiscount}}</td>
						          	<td>{{$item->itemAvailable}}</td>
						          	<td>
						          		<img src="{{url('Admin_uploads/items/'.$item->itemImage)}}" class="table-image">
						          	</td>
						          	<td>
							          	<div class="btn-group">
							          		<a class="btn btn-success" href="{{url('admin/viewCreateItem/'.$item->id)}}">
							          			<i class="fa fa-edit"></i>
							          		</a>
							          	
						          	 		<a class="btn btn-danger" href="{{url('admin/deleteItem/'.$item->id)}}" onclick="return confirm('Are you sure?');" >
						          	 			<i class="fa fa-trash"></i>
						          	 		</a>
					          	 		</div>
						          	</td>
						      	</tr>
							@endforeach
						@endif
		              	</table>
		            </div>
         	 	</div>
	        </div>
	     </div>
	</section>	
</div>