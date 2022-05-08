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
			              	<h3 class="box-title">@lang('trans.countriesInfo')</h3>
		              	</div>
				      	<a href="{{url('admin/viewCreateCountry')}}" class="btn btn-primary col-xs-6">
				      		<i class="fa fa-plus"></i>
				      		@lang('trans.add')
				      	</a>
		            </div>

		            <div class="box-body table-responsive no-padding">
		              	<table class="table table-hover">
			                <tr>
			                  	<th>#</th>
			                  	<th>@lang('trans.countryName')</th>
			                  	<th>@lang('trans.countryNameAr')</th>
			                  	<th>@lang('trans.city')</th>
			                  	<th>@lang('trans.countryImage')</th>
			                  	<th>@lang('trans.phoneKey')</th>

			                  	<th>@lang('trans.operations')</th>
			                </tr>
						@if(!empty($countries))
							@foreach($countries as $key=>$country)
								<tr>
						          	<td>{{$key+1}}</td>
						          	<td>{{$country->countryName}}</td>
						          	<td>{{$country->countryNameAr}}</td>
						          	<td>
						          	
							      	<a href="{{url('admin/cityInfo/'.$country->id)}}" class="btn btn-info btn-sm">
							      		<i class="fa fa-plus"></i>
							      		@lang('trans.city')
							      	</a>
							      
							      	</td>
						          	<td>
						          		<img src="{{url('Admin_uploads/countries/'.$country->countryImage)}}" class="table-image">
						          	</td>
						          	<td>{{$country->phoneKey}}</td>
						          	<td>
							          	<div class="btn-group">
							          		<a class="btn btn-success" href="{{url('admin/viewCreateCountry/'.$country->id)}}">
							          			<i class="fa fa-edit"></i>
							          		</a>
							          	
						          	 		<a class="btn btn-danger" href="{{url('admin/deleteCountry/'.$country->id)}}" onclick="return confirm('Are you sure?');" >
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