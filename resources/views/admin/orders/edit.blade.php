@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">تعديل</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.orders.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.orders.update', $order)}}" class="form" method="post">
                        @csrf
                        @method('PUT')
                        <x-select name="payment_method_id" :loopOver="\App\PaymentMethod::all()" showCol="name" value="{{$order['payment_method_id']}}" title="طريقة الدقع"></x-select>
                        <addresses :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></addresses>
                        <x-number name="total" value="{{$order['total']}}" title="المبلغ"></x-number>
                        <x-select name="status_id" value="{{$order['status_id']}}" showCol="name" :loopOver="\App\OrderStatus::all()" title="حالة الطلب"></x-select>
                        <div class="form-group">
                            <label class="font-weight-bold">مدفوع</label>
                            <div class="mb-3">
                                <label class="mr-3">غير مدفوع</label>
                                <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                                    <input id="is_paid" name="is_paid" type="checkbox" {{$order['is_paid'] ? 'checked' : ''}} value="1">
                                    <span class="slider round"></span>
                                </label>
                                مدفوع
                            </div>
                        </div>
                        <x-select name="coupon_id" value="{{$order['coupon_id']}}" showCol="name" :loopOver="\App\Coupon::all()" title="الكوبونات"></x-select>
                        <div class="form-group">
                            <label for="date">تاريخ الطلب</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{$order['date']}}">
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
