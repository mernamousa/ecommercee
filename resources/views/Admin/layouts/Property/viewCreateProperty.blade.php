<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">@if(empty($categories)) @lang('trans.add') @else @lang('trans.edit') @endif</h3>
          </div>
          @if(count($errors))
            @foreach($errors->all() as $error)
              <div class="col-sm-12">
                <div class="alert alert-danger">{{$error}}</div>
              </div>
            @endforeach
          @endif
          @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
          @endif
          @if(session()->has('warning'))
            <div class="alert alert-warning">{{session('warning')}}</div>
          @endif
          <form class="form-horizontal" action="{{url('admin/createProperty')}}" method="post" enctype="multipart/form-data">
            <div class="box-body">
              @csrf
              <input type="hidden" name="id" value="@if(!empty($properties)) {{$properties->id}} @endif">

              <div class="form-group">

                  <label for="propertyName" class="col-sm-2 control-label">@lang('trans.propertyName')</label>
                  <div class="col-sm-4">
                      <input type="text" name="propertyName" class="form-control" id="propertyName" placeholder="@lang('trans.propertyName')" value="@if(!empty($properties)) {{$properties->propertyName}} @endif" required>
                  </div>
                
                  <label for="propertyNameAr" class="col-sm-2 control-label">@lang('trans.propertyNameAr')</label>
                  <div class="col-sm-4">
                      <input type="text" name="propertyNameAr" class="form-control" placeholder="@lang('trans.propertyNameAr')" value="@if(!empty($properties)) {{$properties->propertyNameAr}} @endif" required id="propertyNameAr">
                  </div>

              </div>

              <div class="form-group">
                  <label for="propertyImage" class="col-sm-2 control-label">@lang('trans.propertyImage')</label>
                  <div class="col-sm-4">
                      <input type="file" name="propertyImage" class="form-control" placeholder="@lang('trans.propertyImage')" >
                      @if(!empty($properties) && !empty($properties->propertyImage)) 
                        <img src="{{url('Admin_uploads/properties/'.$properties->propertyImage)}}" style="height:200px;width:200px"> 
                      @endif
                  </div>
              </div>

            </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-info" value="@if(empty($properties)) @lang('trans.add') @else @lang('trans.edit') @endif">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>