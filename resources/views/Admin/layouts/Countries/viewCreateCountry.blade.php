<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">@if(empty($countries)) @lang('leftsidebar.Add') @else @lang('leftsidebar.Edit') @endif</h3>
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
          <form class="form-horizontal" action="{{url('admin/createCountry')}}" method="post" enctype="multipart/form-data">
            <div class="box-body">
              @csrf
              <input type="hidden" name="id" value="@if(!empty($countries)) {{$countries->id}} @endif">

              <div class="form-group">

                  <label for="countryName" class="col-sm-2 control-label">@lang('leftsidebar.countryName')</label>
                  <div class="col-sm-4">
                      <input type="text" name="countryName" class="form-control" id="countryName" placeholder="@lang('leftsidebar.countryName')" value="@if(!empty($countries)) {{$countries->countryName}} @endif" required>
                  </div>
                
                  <label for="countryNameAr" class="col-sm-2 control-label">@lang('leftsidebar.countryNameAr')</label>
                  <div class="col-sm-4">
                      <input type="text" name="countryNameAr" class="form-control" placeholder="@lang('leftsidebar.countryNameAr')" value="@if(!empty($countries)) {{$countries->countryNameAr}} @endif" required id="countryNameAr">
                  </div>

              </div>

              <div class="form-group">
                  <label for="countryImage" class="col-sm-2 control-label">@lang('leftsidebar.countryImage')</label>
                  <div class="col-sm-4">
                      <input type="file" name="countryImage" class="form-control" placeholder="@lang('leftsidebar.countryImage')" >
                      @if(!empty($countries) && !empty($countries->countryImage)) 
                        <img src="{{url('Admin_uploads/countries/'.$countries->countryImage)}}" style="height:200px;width:200px"> 
                      @endif
                  </div>

                  <label for="phoneKey" class="col-sm-2 control-label">@lang('leftsidebar.phoneKey')</label>
                  <div class="col-sm-4">
                      <input type="text" name="phoneKey" class="form-control" placeholder="@lang('leftsidebar.phoneKey')" value="@if(!empty($countries)) {{$countries->phoneKey}} @endif" required id="phoneKey">
                  </div>
              </div>

            </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-info" value="@if(empty($categories)) @lang('leftsidebar.Add') @else @lang('leftsidebar.Edit') @endif">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>