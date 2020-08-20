@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.orders.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.orders.store')}}" class="form" method="post">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold" for="type">نوع الفاتورة</label>
                            <select name="type" id="type" class="form-control">
                                <option value="اشتراك">اشتراك</option>
                                <option value="منفصلة">منفصلة</option>
                            </select>
                            <x-error title="type"></x-error>
                        </div>


                        <x-select name="payment_method_id" :loopOver="\App\PaymentMethod::all()" showCol="name" value="{{old('payment_method_id')}}" title="طريقة الدقع"></x-select>
                        <addresses :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></addresses>
                        <x-number name="total" value="{{old('total')}}" title="المبلغ"></x-number>
                        <x-select name="status_id" value="{{old('status_id')}}" showCol="name" :loopOver="\App\OrderStatus::all()" title="حالة الطلب"></x-select>
                        <x-checkbox name="is_paid" value="{{old('is_paid')}}" title="مدفوع"></x-checkbox>
                        <x-select name="coupon_id" value="{{old('coupon_id')}}" showCol="name" :loopOver="\App\Coupon::all()" title="الكوبونات"></x-select>
                        <div class="form-group">
                            <label for="date">تاريخ الطلب</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
