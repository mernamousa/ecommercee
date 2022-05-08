
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
			              	<h3 class="box-title">@lang('trans.orders Info')</h3>
		              	</div>
		            </div>

		            <div class="box-body table-responsive no-padding">
		              	<table class="table table-hover">
			                <tr>
			                  	<th>#</th>
			                  	<th>@lang('trans.total_price')</th>
			                  	<th>@lang('trans.ship_address')</th>
			                  	<th>@lang('trans.user_name')</th>
			                  	<th>@lang('trans.status')</th>
			                  	<th>@lang('trans.operations')</th>
			                </tr>
						@if(!empty($orders))
							@foreach($orders as $key=>$order)
								<tr>
						          	<td>{{$key+1}}</td>
						          	<td>{{$order->total_price}}</td>

						          	<?php $user = App\Models\User::where('id',$order->user_id)->first();?>

						          	<td>{{$user->ship_address}}</td>
						          	
						          	<td>{{$user->name}}</td>
						          	<td>

									<div class="btn-group">
									    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="width:100px">
									        @lang('trans.'.$order->status)
									      <span class="caret"></span>
									    </button>
<ul class="dropdown-menu">
    <li class="label label-default col-sm-12">
        <a href="{{url('admin/changeOrderStatus/'.$order->id.'/accepted')}}">@lang('trans.accepted')</a>
    </li>
    <li class="label label-info col-sm-12">
        <a href="{{url('admin/changeOrderStatus/'.$order->id.'/inOperation')}}">
            @lang('trans.inOperation')
        </a>
    </li>
    <li class="label label-warning col-sm-12">
        <a href="{{url('admin/changeOrderStatus/'.$order->id.'/operationDone')}}">
            @lang('trans.operationDone')
        </a>
    </li>
    
    <li class="label label-success col-sm-12">
        <a href="{{url('admin/changeOrderStatus/'.$order->id.'/delivered')}}">
            @lang('trans.delivered')
        </a>
    </li>
    <li class="label label-danger col-sm-12">
        <a href="{{url('admin/changeOrderStatus/'.$order->id.'/canceled')}}">
            @lang('trans.canceled')
        </a>
    </li>
    <li class="label label-light col-sm-12">
        <a href="{{url('admin/changeOrderStatus/'.$order->id.'/delayed')}}">
            @lang('trans.delayed')
        </a>
    </li>
</ul>
									   

									</div>

						          	</td>
						          	<td>      	
					          	 		<a class="btn btn-danger" href="{{url('admin/deleteOrder/'.$order->id)}}" onclick="return confirm('Are you sure?');" >
					          	 			<i class="fa fa-trash"></i>
					          	 		</a>
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
