<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">@if(empty($cities)) @lang('leftsidebar.Add') @else @lang('leftsidebar.Edit') @endif</h3>
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
          <form class="form-horizontal" action="{{url('admin/createCity')}}" method="post" enctype="multipart/form-data">
            <div class="box-body">
              @csrf
              <input type="hidden" name="id" value="@if(!empty($cities)) {{$cities->id}} @endif">
              <input type="hidden" name="country_id" value="@if(!empty(Request('country_id'))) {{Request('country_id')}} @endif">

              <div class="form-group">

                  <label for="cityName" class="col-sm-2 control-label">@lang('leftsidebar.cityName')</label>
                  <div class="col-sm-4">
                      <input type="text" name="cityName" class="form-control" id="cityName" placeholder="@lang('leftsidebar.cityName')" value="@if(!empty($cities)) {{$cities->cityName}} @endif" required>
                  </div>
                
                  <label for="cityNameAr" class="col-sm-2 control-label">@lang('leftsidebar.cityNameAr')</label>
                  <div class="col-sm-4">
                      <input type="text" name="cityNameAr" class="form-control" placeholder="@lang('leftsidebar.cityNameAr')" value="@if(!empty($cities)) {{$cities->cityNameAr}} @endif" required id="cityNameAr">
                  </div>

              </div>

            </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-info" value="@if(empty($sub_cat)) @lang('leftsidebar.Add') @else @lang('leftsidebar.Edit') @endif">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>