@extends('front.layouts.master')
@section('title', 'My Orders')

@section('content')
<div class="container" style="margin-top: 7rem">
        <div style="margin-bottom: 7rem">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <div class="wrap-table-shopping-cart">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">عدد العناصر</th>
                            <th scope="col">التاريخ</th>
                            <th scope="col">الوقت</th>
                            <th scope="col">الحالة</th>
                          </tr>
                        </thead>
                        <tbody>

                            @php
                                $i = 1;
                            @endphp
                            @forelse ($orders as $order)

                          <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $order->items->count() }}</td>
                            <td>{{ $order->date }}</td>
                            <td>{{ $order->time }}</td>
                            <td>{{ $order->status }}</td>
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
            </div>
        </div>
    </div>
</div>
@endsection