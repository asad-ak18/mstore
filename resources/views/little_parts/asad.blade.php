   <div class="product__item ">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('uploads/product_photo')}}/{{$all_product->product_photo}}">
                        <ul class="product__hover">
                            <li><a href="{{asset('uploads/product_photo')}}/{{$all_product->product_photo}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{route('productdetail',$all_product->id)}}">{{$all_product->product_name}}</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">${{$all_product->product_price}}</div>
                    </div>
                </div>
                