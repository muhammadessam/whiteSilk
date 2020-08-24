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
                        @method('PATCH')
                        <addresses :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}" :selectedclientid="{{$order['user_id']}}" :selectedaddressid="{{$order['address_id']}}"></addresses>

                        <x-select name="branch_id" :loopOver="\App\Branch::all()" showCol="name" value="{{$order['branch_id']}}" title="الفرع"></x-select>

                        <x-text name="serial" value="{{$order['serial']}}" title="رقم الفاتورة"></x-text>

                        <x-select name="driver_id" value="{{$order['driver_id']}}" showCol="name" title="السائق" :loopOver="\App\User::where('type', 'سائق')->with('addresses')->get()"></x-select>
                        <div class="form-group">
                            <label class="font-weight-bold">ادخل القطع</label>
                            <order-pieces :old="{{$order->pieces}}" :pieces="{{\App\PriceList::all()}}" :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></order-pieces>
                        </div>

                        <order-type oldtype="{{$order['type']}}"  oldsubscription="{{$order['pivot_id']}}" oldpayment="{{$order['payment_method_id']}}" :payments="{{\App\PaymentMethod::all()}}" :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></order-type>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="arrived_at">تاريخ الاستلام</label>
                                    <input type="date" name="arrived_at" id="arrived_at" class="form-control" value="{{\Carbon\Carbon::create($order['arrived_at'])->format('Y-m-d')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="out_at">تاريخ التسليم</label>
                                    <input type="date" name="out_at" id="out_at" class="form-control" value="{{\Carbon\Carbon::create($order['out_at'])->format('Y-m-d')}}">
                                </div>
                            </div>
                        </div>

                        <x-checkbox name="is_paid" value="{{$order['is_paid']}}" title="حالة الدفع"></x-checkbox>

                        <x-select name="coupon_id" value="{{$order['coupon_id']}}" title="كوبون الخصم" :loopOver="\App\Coupon::all()"></x-select>

                        <x-select name="status_id" value="{{$order['status_id']}}" title="حالة الطلب" :loopOver="\App\OrderStatus::all()" showCol="name"></x-select>

                        <x-number name="total" value="{{$order['total']}}" title="مجموع الفاتورة الكلي - سوف يتم حسابه اتوماتيكيا ولكن ان تم ادخاله سوف يقوم النظام باعتبار القيمة المعطاه"></x-number>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
