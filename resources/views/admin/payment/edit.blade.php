@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.payments.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.payments.update', $payment)}}" class="form" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="type" class="font-weight-bold">النوع</label>
                            <select name="type" id="type" class="form-control">
                                <option value="دخل">دخل</option>
                                <option value="خرج">خرج</option>
                            </select>
                        </div>

                        <x-text name="name" value="{{$payment['name']}}" title="الاسم"></x-text>

                        <x-number name="value" value="{{$payment['value']}}" title="القيمة"></x-number>
                        <div class="form-group">
                            <label for="order_id" class="font-weight-bold">الطلب</label>
                            <select name="order_id" id="order_id" class="form-control">
                                <option value=""></option>
                                @foreach(\App\Order::all() as $order)
                                    <option value="{{$order->id}}" {{$payment['order_id'] == $order->id ? 'selected' : ''}}>{{$order ['id']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="payment_method_id" class="font-weight-bold">طرق الدفع</label>
                            <select name="payment_method_id" id="payment_method_id" class="form-control">
                                <option value=""></option>
                                @foreach(\App\PaymentMethod::all() as $item)
                                    <option value="{{$item->id}}" {{$payment['payment_method_id'] == $order->id ? 'selected' : ''}}>{{$item['id']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <x-text name="result" value="{{$payment['result']}}" title="Result"></x-text>
                        <x-text name="postCode" value="{{$payment['postCode']}}" title="Post Code"></x-text>
                        <x-text name="tranid" value="{{$payment['tranid']}}" title="tran id"></x-text>
                        <x-text name="auth" value="{{$payment['auth']}}" title="Auth"></x-text>
                        <x-text name="ref" value="{{$payment['ref']}}" title="Ref"></x-text>
                        <x-text name="trackid" value="{{$payment['trackid']}}" title="track id"></x-text>
                        <x-text name="udf_1" value="{{$payment['udf_1']}}" title="udf_1"></x-text>
                        <x-text name="udf_2" value="{{$payment['udf_2']}}" title="udf_2"></x-text>
                        <x-text name="udf_3" value="{{$payment['udf_3']}}" title="udf_3"></x-text>
                        <x-text name="udf_4" value="{{$payment['udf_4']}}" title="udf_4"></x-text>
                        <x-text name="udf_5" value="{{$payment['udf_5']}}" title="udf_5"></x-text>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
