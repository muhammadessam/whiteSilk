@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.couponUsage.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.couponUsage.store')}}" class="form" method="post">
                        @csrf
                        <x-select title="العميل" name="user_id" value="{{old('user_id')}}" showCol="name" :loopOver="\App\User::where('type','عميل')->get()"></x-select>
                        <x-select title="الكوبون" name="coupon_id" value="{{old('coupon_id')}}" showCol="name" :loopOver="\App\Coupon::all()"></x-select>
                        <x-select :loopOver="\App\Order::all()" name="order_id" value="{{old('order_id')}}" showCol="id" title="الطلب"></x-select>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
