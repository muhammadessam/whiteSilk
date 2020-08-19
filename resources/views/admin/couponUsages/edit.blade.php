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
                    <form action="{{route('admin.couponUsage.update', $couponUsage)}}" class="form" method="post">
                        @csrf
                        @method('PUT')
                        <x-select title="العميل" name="user_id" value="{{$couponUsage['user_id']}}" showCol="name" :loopOver="\App\User::where('type','عميل')->get()"></x-select>
                        <x-select title="الكوبون" name="coupon_id" value="{{$couponUsage['coupon_id']}}" showCol="name" :loopOver="\App\Coupon::all()"></x-select>
                        <x-select title="الطلب" name="coupon_id" value="{{$couponUsage['coupon_id']}}" showCol="name" :loopOver="\App\Coupon::all()"></x-select>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
