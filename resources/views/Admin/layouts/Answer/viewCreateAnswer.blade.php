<div class="content-wrapper">
  <section class="content">
    <div class="row">
          <div class="col-xs-12">
              <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">@if(empty($admin)) @lang('leftsidebar.Add') @else @lang('leftsidebar.Edit') @endif</h3>
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
              <form class="form-horizontal" action="{{url('admin/createAnswer')}}" method="post">
                  <div class="box-body">
                    @csrf
                    <input type="hidden" name="question_id" value="{{Request('questionId')}}">

                    @for($i=1;$i<5;$i++)
                      <div class="form-group">
                          <label for="answer" class="col-sm-2 control-label">@lang('leftsidebar.answer')</label>
                          <div class="col-sm-4">
                              <textarea id="answer" name="answer[]" class="form-control" required>{{count($answers) ? $answers[$i-1]->answer : ''}}</textarea>
                          </div>
                          <div class="box-body">
                            <label for="isTrue" class="col-sm-2 control-label">is correct answer ?</label>
                              <div class="col-sm-4" id="isTrue">
                                <label>
                                  <input type="radio" name="isTrue" class="minimal" value="{{$i}}" {{count($answers) && $answers[$i-1]->isTrue  == true ? 'checked' : ''}}>
                                   yes
                                </label>
                              </div>
                          </div>
                      </div>
                    @endfor
                  </div>
                  <div class="box-footer">
                      <input type="submit" class="btn btn-info" value="@if(!count($answers)) @lang('leftsidebar.Add') @else @lang('leftsidebar.Edit') @endif">
                  </div>
              </form>
            </div>
          </div>
        </div>
  </section>
</div>