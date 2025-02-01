@extends('front.layouts.master')
@section('title', 'My Orders')

@section('content')
    <div class="container" style="margin-top: 7rem">
        <div style="margin-bottom: 12rem">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                
                {{-- <h3 class=" mb-3 w-100">My Orders</h3>
                <div class="wrap-table-shopping-cart">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>بيانات العميل</th>
                                <th>بيانات الاتصال</th>
                                <th>اجمالي الطلب</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp

                            @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $order->full_name }} <br> {{ $order->full_adreess }}</td>
                                    <th>{{ $order->phone }} - {{ $order->email }}</th>
                                    <td>{{ $order->total }}</td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="1000">
                                        <h5 class="text-center">
                                            لا يوجد طلبات
                                        </h5>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div> --}}

                <h3 class=" my-3 w-100">Data Order</h3>
                <div class="wrap-table-shopping-cart">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المنتج</th>
                                <th>سعر المنتج</th>
                                <th>اللون</th>
                                <th>المقاس</th>
                                <th>الكمية المطلوبة</th>
                                <th>اجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orders as $order)
                                @forelse ($order->items as $item)
                                    <tr>
                                        <th>{{ $i++ }}</th>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->product_price }}</td>
                                        <td>{{ $item->chosen_color ?? 'لم يحدد' }}</td>
                                        <td>{{ $item->chosen_size ?? 'لم يحدد' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->sub_total }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="1000">
                                            <h5 class="text-center">
                                                لا يوجد طلبات
                                            </h5>
                                        </td>
                                    </tr>
                                @endforelse
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="{{ url('order_track') }}" class="btn btn-info">Order Tracking</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
