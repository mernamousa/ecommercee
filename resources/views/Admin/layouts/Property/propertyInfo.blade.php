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
			              	<h3 class="box-title">@lang('trans.propertyInfo')</h3>
		              	</div>
				      	<a href="{{url('admin/viewCreateProperty')}}" class="btn btn-primary col-xs-6">
				      		<i class="fa fa-plus"></i>
				      		@lang('trans.add')
				      	</a>
		            </div>

		            <div class="box-body table-responsive no-padding">
		              	<table class="table table-hover">
			                <tr>
			                  	<th>#</th>
			                  	<th>@lang('trans.propertyName')</th>
			                  	<th>@lang('trans.propertyNameAr')</th>
			                  	<th>@lang('trans.subProperty')</th>
			                  	<th>@lang('trans.propertyImage')</th>
			                  	<th>@lang('trans.operations')</th>
			                </tr>
						@if(!empty($properties))
							@foreach($properties as $key=>$prop)
								<tr>
						          	<td>{{$key+1}}</td>
						          	<td>{{$prop->propertyName}}</td>
						          	<td>{{$prop->propertyNameAr}}</td>
						          	<td>
						          	
							      	<a href="{{url('admin/sub_propertyInfo/'.$prop->id)}}" class="btn btn-info btn-sm">
							      		@lang('trans.subProperties')
							      	</a>
							      
							      	</td>
						          	<td>
						          		<img src="{{url('Admin_uploads/properties/'.$prop->propertyImage)}}" class="table-image">
						          	</td>
						          	<td>
							          	<div class="btn-group">
							          		<a class="btn btn-success" href="{{url('admin/viewCreateProperty/'.$prop->id)}}">
							          			<i class="fa fa-edit"></i>
							          		</a>
							          	
						          	 		<a class="btn btn-danger" href="{{url('admin/deleteProperty/'.$prop->id)}}" onclick="return confirm('Are you sure?');" >
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