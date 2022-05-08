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
			              	<h3 class="box-title">@lang('trans.adminInfo')</h3>
		              	</div>
					      	<a href="{{url('admin/viewCreateAdmin')}}" class="btn btn-primary col-xs-6">
					      		<i class="fa fa-plus"></i>
					      		<i class="fa fa-user"></i>
					      		@lang('trans.add')
					      	</a>
		            </div>

		            <div class="box-body table-responsive no-padding">
		              	<table class="table table-hover">
			                <tr>
			                  	<th>#</th>
			                  	<th>@lang('trans.name')</th>
			                  	<th>@lang('trans.email')</th>
			                  	<th>@lang('trans.created_at')</th>
			                  	<th>@lang('trans.updated_at')</th>
			                  	<th>@lang('trans.operations')</th>
			                </tr>
							@if(!empty($admins))
								@foreach($admins as $key=>$admin)
									<tr>
							          	<td>{{$key+1}}</td>
							          	<td>{{$admin->name}}</td>
							          	<td>{{$admin->email}}</td>
							          	<td>{{$admin->created_at}}</td>
							          	<td>{{$admin->updated_at}}</td>
							          	<td>
								          	<div class="btn-group">
								          		<a class="btn btn-success" href="{{url('admin/viewCreateAdmin/'.$admin->id)}}">
								          			<i class="fa fa-edit"></i>
								          		</a>
								          	
							          	 		<a class="btn btn-danger" href="{{url('admin/deleteAdmin/'.$admin->id)}}" onclick="return confirm('Are you sure?');" >
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