@extends('front.layouts.master')
@section('title', 'Order Tracking')

@section('content')
    <div class="container" style="margin-top: 7rem">
        <div style="margin-bottom: 7rem">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <h3 class="my-3 w-100">Order Tracking</h3>
                <div class="wrap-table-shopping-cart">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>عدد العناصر</th>
                                <th>الرسالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orders as $order)
                                @forelse ($order->tracks as $track)
                                    <tr>
                                        <td>{{ $track->status ?? 'Null' }}</td>
                                        <td>{{ $track->message }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <h5 class="text-center">لا يوجد طلبات</h5>
                                        </td>
                                    </tr>
                                @endforelse
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
