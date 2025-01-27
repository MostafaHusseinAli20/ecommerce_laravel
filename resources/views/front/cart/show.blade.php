@extends('front.layouts.master')
@section('title', 'Cart')
@section('content')
     <!-- Shoping Cart -->
	<form method="POST" action="{{ route('front.cart.update') }}" class="bg0 p-t-75 p-b-85" style="margin-top: 7rem">
		@csrf
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">

								<tr class="table_head">
                                    <th class="column-1"></th>
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

									@forelse (carts() as $index => $item)
                                        <tr class="table_row">
                                            <td class="text-center">
                                                <a href="{{ route('front.cart.destroy', $index) }}" class="btn btn-sm btn-danger">
													<i class="fa fa-trash"></i>
												</a>
                                            </td>
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ asset('storage/' . $item->product->main_image) }}" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2">{{ \App\Models\Product::query()->find($item->product->id)->title }}
												<br>
												<span
                                                class="font-weight-bold text-primary">{{$item->size ?? __('front.size_cart')}}</span><br>
                                            <span
                                                class="font-weight-bold text-success">{{$item->color ?? __('front.color_cart')}}</span>
											</td>
                                        
											<td class="column-3">L.E {{ $item->product->price }}</td>
											
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number" 
													name="quantity[{{$index}}]" 
													value="{{ $item->quantity }}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="column-5">
												L.E {{ $item->quantity * $item->product->price }}
											</td>
                                        
										</tr>
                                    @empty
                                        <tr>
                                            <td colspan="1000">
                                                <h4 class="w-100 text-center p-2">
                                                    لايوجد بيانات
                                                </h4>
                                            </td>
                                        </tr>        
                                    @endforelse
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							
							@if (carts()->count() > 0)
							<button class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								@lang('front.Update_Cart')
							</button>
							@else
							
							@endif
						</div>
					</div>
				</form>
				</div>

				@if (carts()->count() > 0)
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<form action="{{ url('checkout') }}" method="POST">
						@csrf
						<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
							<h4 class="mtext-109 cl2 p-b-30">
								Cart Totals
							</h4>
	
							<div class="flex-w flex-t bor12 p-b-13">
								<div class="size-208">
									<span class="stext-110 cl2">
										Subtotal:
									</span>
								</div>
	
								<div class="size-209">
									<span class="mtext-110 cl2">
										L.E {{ cartsTotal() }}
									</span>
								</div>
							</div>
	
							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Shipping:
									</span>
								</div>
	
								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<p class="stext-111 cl6 p-t-2">
										There are no shipping methods available. Please double check your address, or contact us if you need any help.
									</p>
									
									<div class="p-t-15">
										<span class="stext-112 cl8">
											Calculate Shipping
										</span>
										@auth
											<input type="hidden" name="user_id" value="{{ auth()->id() }}">
										@endauth

										<div class="bor8 bg0 m-b-12 mt-2">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_name" placeholder="Full Name" 
											value="{{ auth()->user()->name }}" required>
										</div>

										<div class="bor8 bg0 m-b-12">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email" placeholder="Email"
											value="{{ auth()->user()->email }}" required>
										</div>
	
										<div class="bor8 bg0 m-b-12">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Phone"
											value="{{ auth()->user()->phone }}" required>
										</div>
	
										<div class="bor8 bg0 m-b-12">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_adreess[]" placeholder="Country"
											value="{{ auth()->user()->full_adreess }}" required>
										</div>
	
										<div class="bor8 bg0 m-b-22">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_adreess[]" placeholder="State"
											value="{{ auth()->user()->full_adreess }}" required>
										</div>

										<div class="bor8 bg0 m-b-22">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_adreess[]" 
											value="{{ auth()->user()->full_adreess }}" placeholder="Postcode / Zip" required>
										</div>
										
									</div>
								</div>
							</div>
	
							<div class="flex-w flex-t p-t-27 p-b-33">
								<div class="size-208">
									<span class="mtext-101 cl2">
										Total:
									</span>
								</div>
	
								<div class="size-209 p-t-1">
									<span class="mtext-110 cl2" id="subtotal">
										L.E {{ cartsTotal() }}
									</span>
								</div>
							</div>
	
							<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Proceed to Checkout
							</button>
						</div>
					</form>
				</div>
				@else

				@endif
			</div>
		</div>
	

@endsection
