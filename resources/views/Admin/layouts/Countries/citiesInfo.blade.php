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
				              	<h3 class="box-title">
					              	@lang('trans.citiesInfo')
				              	</h3>
			              	</div>
			              	@if(!empty(Request('country_id')))
					      	<a href="{{url('admin/viewCreateCity/'.Request('country_id'))}}" class="btn btn-primary col-xs-6">
					      		<i class="fa fa-plus"></i>
					      		@lang('trans.add')
					      	</a>
					      	@endif
			            </div>

			            <div class="box-body table-responsive no-padding">
			              	<table class="table table-hover">
				                <tr>
				                  	<th>#</th>
				                  	<th>@lang('trans.cityName')</th>
				                  	<th>@lang('trans.cityNameAr')</th>
				                  	<th>@lang('trans.operations')</th>
				                </tr>
							@if(!empty($cities))
								@foreach($cities as $key=>$city)
									<tr>
							          	<td>{{$key+1}}</td>
							          	<td>{{$city->cityName}}</td>
							          	<td>{{$city->cityNameAr}}</td>
							          	
							          	<td>
								          	<div class="btn-group">
												<a class="btn btn-success" href="{{url('admin/viewCreateCity/'.Request('country_id').'/'.$city->id)}}">
													<i class="fa fa-edit"></i>
												</a>
								          	
							          	 		<a class="btn btn-danger" href="{{url('admin/deleteCity/'.$city->id)}}" onclick="return confirm('Are you sure?');" >
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