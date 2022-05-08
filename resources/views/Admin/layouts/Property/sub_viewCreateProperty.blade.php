<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">@if(empty($sub_cat)) @lang('trans.Add') @else @lang('trans.Edit') @endif</h3>
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
          <form class="form-horizontal" action="{{url('admin/sub_createProperty')}}" method="post" enctype="multipart/form-data">
            <div class="box-body">
              @csrf
              <input type="hidden" name="id" value="@if(!empty($sub_prop)) {{$sub_prop->id}} @endif">
              <input type="hidden" name="prop_id" value="@if(!empty(Request('prop_id'))) {{Request('prop_id')}} @endif">

              <div class="form-group">

                  <label for="s_propertyName" class="col-sm-2 control-label">@lang('trans.s_propertyName')</label>
                  <div class="col-sm-4">
                      <input type="text" name="s_propertyName" class="form-control" id="s_propertyName" placeholder="@lang('trans.s_propertyName')" value="@if(!empty($sub_prop)) {{$sub_prop->s_propertyName}} @endif" required>
                  </div>
                
                  <label for="s_propertyNameAr" class="col-sm-2 control-label">@lang('trans.s_propertyNameAr')</label>
                  <div class="col-sm-4">
                      <input type="text" name="s_propertyNameAr" class="form-control" placeholder="@lang('trans.s_propertyNameAr')" value="@if(!empty($sub_prop)) {{$sub_prop->s_propertyNameAr}} @endif" required id="s_propertyNameAr">
                  </div>

              </div>

              <div class="form-group">
                  <label for="s_propertyImage" class="col-sm-2 control-label">@lang('trans.s_propertyImage')</label>
                  <div class="col-sm-4">
                      <input type="file" name="s_propertyImage" class="form-control" placeholder="@lang('trans.s_propertyImage')" >
                      @if(!empty($sub_prop) && !empty($sub_prop->s_propertyImage)) 
                        <img src="{{url('Admin_uploads/properties/subProperty/'.$sub_prop->s_propertyImage)}}" style="height:200px;width:200px"> 
                      @endif
                  </div>
              </div>

            </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-info" value="@if(empty($sub_prop)) @lang('trans.Add') @else @lang('trans.Edit') @endif">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>