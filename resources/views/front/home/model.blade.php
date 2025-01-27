<div class="modal fade" id="showProductModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 800px;margin-top: 10rem" role="document">
        <div class="modal-content">
            <div class=" js-modal1 p-t-60 p-b-20">
                <div class="overlay-modal1 js-hide-modal1"></div>

                <div class="container">
                    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                        <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                            <img src="{{asset('front')}}/images/icons/icon-close.png" alt="CLOSE">
                        </button>

                        <div class="row">
                            <div class="col-md-6 col-lg-7 p-b-30">
                                <img style="width: 100%" src="{{asset("storage/$product->main_image")}}" alt="IMG-PRODUCT">
                            </div>

                            <div class="col-md-6 col-lg-5 p-b-30">
                                <div class="p-r-50 p-t-5 p-lr-0-lg">
                                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                        {{$product->title}}
                                    </h4>

                                    <span class="mtext-106 cl2">
								L.E {{$product->price}}
							</span>

                                    <p class="stext-102 cl3 p-t-23">
                                        {{$product->description}}
                                    </p>

                                    <!--  -->
                                    <form action="">
                                        <div class="p-t-33">
                                            @if($product->sizes->count())
                                                <div class="flex-w flex-r-m p-b-10">
                                                    <div class="size-203 flex-c-m respon6">
                                                        Size
                                                    </div>

                                                    <div class="size-204 respon6-next">
                                                        <div class="rs1-select2 bor8 bg0">
                                                            <select class="js-select2" name="size">
                                                                <option value="">Choose Size</option>
                                                                @foreach($product->sizes as $size)
                                                                    <option value="{{$size->value}}">{{$size->value}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            
                                            @if($product->colors->count())
                                                <div class="flex-w flex-r-m p-b-10">
                                                    <div class="size-203 flex-c-m respon6">
                                                        Color
                                                    </div>

                                                    <div class="size-204 respon6-next">
                                                        <div class="rs1-select2 bor8 bg0">
                                                            <select class="js-select2" name="color">
                                                                <option value="">Choose Color</option>
                                                                @foreach($product->colors as $color)
                                                                    <option value="{{$color->color}}">{{$color->color}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="flex-w flex-r-m p-b-10">
                                                @if (auth()->check())
                                                <div class="size-204 flex-w flex-m respon6-next">

                                                    <a href="{{ route('front.cart.store', ['product_id'=>$product->id,'quantity'=>1]) }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                                        Add to cart
                                                    </a>
                                                </div>
                                                @else
                                                <h6 class="mt-3">Becuse Buy This Product Go To <a href="{{ url('loginPage') }}" 
                                                    class="text-primary"
                                                    style="text-decoration: underline">
                                                    Login</a> Page First</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>