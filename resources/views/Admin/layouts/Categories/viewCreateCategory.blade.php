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
          <form class="form-horizontal" action="{{url('admin/createcategory')}}" method="post" enctype="multipart/form-data">
            <div class="box-body">
              @csrf
              <input type="hidden" name="id" value="@if(!empty($categories)) {{$categories->id}} @endif">

              <div class="form-group">

                  <label for="categoryName" class="col-sm-2 control-label">@lang('trans.categoryName')</label>
                  <div class="col-sm-4">
                      <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="@lang('trans.categoryName')" value="@if(!empty($categories)) {{$categories->categoryName}} @endif" required>
                  </div>
                
                  <label for="categoryNameAr" class="col-sm-2 control-label">@lang('trans.categoryNameAr')</label>
                  <div class="col-sm-4">
                      <input type="text" name="categoryNameAr" class="form-control" placeholder="@lang('trans.categoryNameAr')" value="@if(!empty($categories)) {{$categories->categoryNameAr}} @endif" required id="categoryNameAr">
                  </div>

              </div>

              <div class="form-group">
                  <label for="categoryImage" class="col-sm-2 control-label">@lang('trans.categoryImage')</label>
                  <div class="col-sm-4">
                      <input type="file" name="categoryImage" class="form-control" placeholder="@lang('trans.categoryImage')" >
                      @if(!empty($categories) && !empty($categories->categoryImage)) 
                        <img src="{{url('Admin_uploads/categories/'.$categories->categoryImage)}}" style="height:200px;width:200px"> 
                      @endif
                  </div>
              </div>

            </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-info" value="@if(empty($categories)) @lang('trans.add') @else @lang('trans.edit') @endif">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>