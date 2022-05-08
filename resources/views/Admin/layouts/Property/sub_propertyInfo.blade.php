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
					              	@lang('trans.subProperties')
				              	</h3>
			              	</div>
			              	@if(!empty(Request('prop_id')))
					      	<a href="{{url('admin/sub_viewCreateProperty/'.Request('prop_id'))}}" class="btn btn-primary col-xs-6">
					      		<i class="fa fa-plus"></i>
					      		@lang('trans.add')
					      	</a>
					      	@endif
			            </div>

			            <div class="box-body table-responsive no-padding">
			              	<table class="table table-hover">
				                <tr>
				                  	<th>#</th>
				                  	<th>@lang('trans.s_propertyName')</th>
				                  	<th>@lang('trans.s_propertyNameAr')</th>
				                  	<th>@lang('trans.s_propertyImage')</th>
				                  	<th>@lang('trans.operations')</th>
				                </tr>
							@if(!empty($sub_properties))
								@foreach($sub_properties as $key=>$sub_property)
									<tr>
							          	<td>{{$key+1}}</td>
							          	<td>{{$sub_property->s_propertyName}}</td>
							          	<td>{{$sub_property->s_propertyNameAr}}</td>
							          	<td>
							          		<img src="{{url('Admin_uploads/properties/subProperty/'.$sub_property->s_propertyImage)}}" style="height: 100px;width:100px">
							          	</td>
							          	<td>
								          	<div class="btn-group">
								          		<a class="btn btn-success" href="{{url('admin/sub_viewCreateProperty/'.Request('prop_id').'/'.$sub_property->id)}}">
								          			<i class="fa fa-edit"></i>
								          		</a>
								          	
							          	 		<a class="btn btn-danger" href="{{url('admin/sub_deleteProperty/'.$sub_property->id)}}" onclick="return confirm('Are you sure?');" >
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