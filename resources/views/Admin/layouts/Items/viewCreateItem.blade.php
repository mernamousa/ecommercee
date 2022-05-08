<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">@if(empty($items)) @lang('trans.add') @else @lang('trans.edit') @endif</h3>
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
          <form class="form-horizontal" action="{{url('admin/createItem')}}" method="post" enctype="multipart/form-data">
            <div class="box-body">
              @csrf
              <input type="hidden" name="id" value="@if(!empty($items)) {{$items->id}} @endif">

              <div class="form-group">

                  <label for="itemName" class="col-sm-2 control-label">@lang('trans.itemName')</label>
                  <div class="col-sm-4">
                      <input type="text" name="itemName" class="form-control" id="itemName" placeholder="@lang('trans.itemName')" value="@if(!empty($items)) {{$items->itemName}} @endif" required>
                  </div>
                
                  <label for="itemNameAr" class="col-sm-2 control-label">@lang('trans.itemNameAr')</label>
                  <div class="col-sm-4">
                      <input type="text" name="itemNameAr" class="form-control" placeholder="@lang('trans.itemNameAr')" value="@if(!empty($items)) {{$items->itemNameAr}} @endif" required id="itemNameAr">
                  </div>

              </div>

              <div class="form-group">

                  <label for="itemDesc" class="col-sm-2 control-label">@lang('trans.itemDesc')</label>
                  <div class="col-sm-4">
                      <textarea name="itemDesc" class="form-control" id="itemDesc" placeholder="@lang('trans.itemDesc')" required>@if(!empty($items)){{$items->itemDesc}}@endif</textarea>
                  </div>
                
                  <label for="itemDescAr" class="col-sm-2 control-label">@lang('trans.itemDescAr')</label>
                  <div class="col-sm-4">
                      <textarea name="itemDescAr" class="form-control" placeholder="@lang('trans.itemDescAr')" value="@if(!empty($items)){{$items->itemDescAr}}@endif" required id="itemDescAr">@if(!empty($items)){{$items->itemDesc}}@endif</textarea>
                  </div>

              </div>

              <div class="form-group">

                  <label for="itemPrice" class="col-sm-2 control-label">@lang('trans.itemPrice')</label>
                  <div class="col-sm-4">
                      <input type="number" name="itemPrice" class="form-control" id="itemPrice" placeholder="@lang('trans.itemPrice')" value="@if(!empty($items)){{$items->itemPrice}}@endif" required>
                  </div>
                
                  <label for="itemDiscount" class="col-sm-2 control-label">@lang('trans.itemDiscount')</label>
                  <div class="col-sm-4">
                      <input type="text" name="itemDiscount" class="form-control" placeholder="@lang('trans.itemDiscount')" value="@if(!empty($items)){{$items->itemDiscount}}@endif" required id="itemDiscount">
                  </div>
              </div>

              <div class="form-group">

                  <label for="discountType" class="col-sm-2 control-label">@lang('trans.discountType')</label>
                  <div class="col-sm-4">
                      <select name="discountType" class="form-control" id="discountType" placeholder="@lang('trans.discountType')"required>
                        @if(!empty($items))
                            @if($items->discountType == 'fixed')
                              <option value="fixed" selected>@lang('trans.fixed')</option>
                              <option value="percent">@lang('trans.percent')</option>
                            @else
                              <option value="fixed">@lang('trans.fixed')</option>
                              <option value="percent" selected>@lang('trans.percent')</option>
                            @endif
                        @else
                          <option value="fixed">@lang('trans.fixed')</option>
                          <option value="percent">@lang('trans.percent')</option>
                        @endif
                      </select>
                  </div>

                  <label for="sub_cat_id" class="col-sm-2 control-label">@lang('trans.sub_cat_id')</label>
                  <div class="col-sm-4">
                      <select name="sub_cat_id" class="form-control" id="sub_cat_id" placeholder="@lang('trans.sub_cat_id')"required>
                        @foreach($sub_cats as $sub_cat)
                        <option value="{{$sub_cat->id}}" 
                          @if(!empty($items) && $items->sub_cat_id == $sub_cat->id)
                            selected
                          @endif
                          >
                          {{$sub_cat->s_categoryName}}
                        </option>
                        @endforeach
                      </select>
                  </div>
                

              </div>




              <div class="form-group">
                  <label for="itemImage" class="col-sm-2 control-label">@lang('trans.itemImage')</label>
                  <div class="col-sm-4">
                      <input type="file" name="itemImage" class="form-control" placeholder="@lang('trans.itemImage')" id="itemImage">
                      @if(!empty($items) && !empty($items->itemImage)) 
                        <img src="{{url('Admin_uploads/items/'.$items->itemImage)}}" style="height:200px;width:200px"> 
                      @endif
                  </div>
              </div>



              <!-- test  onchange="return getSubProp(this.value);" -->
              <div class="form-group">
                  <label for="sub_prop_id" class="col-sm-2 control-label">@lang('trans.sub_prop_id')</label>
                  <div class="col-sm-4">
                    <select name="sub_prop_id[]" class="form-control" id="sub_prop_id" multiple>


                      <option value="">choose ..</option>
                      @if(!empty($properties))
                        @foreach($properties as $prop)
                          <optgroup label="{{$prop->propertyName}}">
                            @if(count($prop->sub_props)>0)
                              @foreach($prop->sub_props as $s_prop)
                                  

                                  @if(!empty($items))
                                  <?php
                                    if (in_array($s_prop->id, $selectedProps)) {
                                      $selected = 'selected';
                                    }else{
                                      $selected = '';
                                    }
                                  ?>
                                  @else
                                    <?php 
                                      $selected = '';
                                    ?>
                                  @endif
                              <option value="{{$s_prop->id}}" {{$selected}}>
                                {{$s_prop->s_propertyName}}
                              </option>
                              @endforeach
                            @endif
                          </optgroup>
                        @endforeach
                      @endif
                    </select>
                  </div>

                  <div style="display: none;" id="swsw">
                    <label for="sub_prop_id" class="col-sm-2 control-label">@lang('trans.sub_prop_id')</label>
                    <div class="col-sm-4">
                      <select name="sub_prop_id" class="form-control" id="sub_prop_id">
                        
                      </select>
                    </div>
                  </div>
              </div>


            </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-info" value="@if(empty($items)) @lang('trans.add') @else @lang('trans.edit') @endif">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>



<script type="text/javascript">
    
    function getSubProp(prop_id) {
      if (prop_id == false) {
        $('#swsw').hide();
      }else{
        $('#swsw').show();
      }
       $.ajax({
        url:"{{url('admin/sub_props')}}/"+prop_id,
        type:"get",
        success : function(res){
          $('#sub_prop_id').html('');
          if (res.status == true){
            if(res.sub_props.length > 0){


              for (var i = 0; i < res.sub_props.length; i++) {
                $('#sub_prop_id').append($('<option>',
                 {
                    value: res.sub_props[i].id,
                    text : res.sub_props[i].s_propertyName
                }));
              }
            }
          }
        }
      });

    }


</script>