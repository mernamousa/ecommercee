
   <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">{{$sub_category->s_categoryName}}</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           @if(count($sub_category->items) > 0)
                           @foreach($sub_category->items as $item)
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{$item->itemName}}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">{{$item->itemPrice}}</span>
                                    @if($item->itemDiscount > 0)
                                    discount <span style="color: #262626;">{{$item->itemDiscount}}</span>

                                       @if($item->discountType == 'percent')
                                       final  <span style="color: #262626;">{{$item->itemPrice - ($item->itemDiscount/100 * $item->itemPrice)}}</span>
                                       @else
                                      new Price  <span style="color: #262626;">{{$item->itemPrice - $item->itemDiscount}}</span>

                                       @endif
                                    @endif
                                 </p>
                                 <div class="tshirt_img"><img src="{{url('Admin_uploads/items/'.$item->itemImage)}}"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt">
                                       <a href="{{url('makeOrder/'.$item->id)}}" style="font-size: 22px;">
                                          <i class="fa fa-shopping-cart fa-lg"></i>
                                       </a>
                                    </div>

                                    <?php
                                    $token = Session::get('remember_token');
                                    $user = App\Models\User::where('remember_token',$token)->first();

                                    $fav_item = App\Models\FavItem::where('item_id',$item->id)->where('user_id',$user->id)->first();
                                    ?>

                                     @if(empty($fav_item))

                                    <div class="seemore_bt"><a href="{{url('add_to_fav/'.$item->id)}}" style="color:red"><i class="fa fa-heart-o"></i></a></div>
                                    @else
                                    <div class="seemore_bt"><a href="{{url('add_to_fav/'.$item->id)}}" style="color:red"><i class="fa fa-heart"></i></a></div>

                                    @endif


                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
