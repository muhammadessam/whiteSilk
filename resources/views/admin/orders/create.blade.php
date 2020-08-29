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
                        <addresses selectedclientid="{{old('user_id')}}" selectedaddressid="{{old('address_id')}}" :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></addresses>

                        <x-select name="branch_id" :loopOver="\App\Branch::all()" showCol="name" value="{{old('branch_id')}}" title="الفرع"></x-select>

                        <x-text name="serial" value="{{old('serial')}}" title="رقم الفاتورة"></x-text>

                        <x-select name="driver_id" value="{{old('driver_id')}}" showCol="name" title="السائق" :loopOver="\App\User::where('type', 'سائق')->with('addresses')->get()"></x-select>

                        <order-type :payments="{{\App\PaymentMethod::all()}}" :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></order-type>

                        <x-number name="number_of_Pieces" value="{{old('number_of_Pieces')}}" title="ادخل عدد القطع - اذا تم ادخالها سوف يقوم النظام باعتبارها بدلا من القطع المدخلة"></x-number>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">اختر من قائمة الاسعار</label>
                                    <order-pieces :pieces="{{\App\PriceList::all()}}" :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></order-pieces>
                                </div>
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">اضف صنف غير موجود</label>
                                <order-special :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></order-special>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="arrived_at">تاريخ الاستلام</label>
                                    <input type="date" name="arrived_at" id="arrived_at" class="form-control" value="{{old('arrived_at')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="out_at">تاريخ التسليم</label>
                                    <input type="date" name="out_at" id="out_at" class="form-control" value="{{old('out_at')}}">
                                </div>
                            </div>
                        </div>

                        <x-checkbox name="is_paid" value="{{old('is_paid')}}" title="حالة الدفع"></x-checkbox>

                        <x-select name="coupon_id" value="{{old('coupon_id')}}" title="كوبون الخصم" :loopOver="\App\Coupon::all()" showCol="name"></x-select>

                        <x-select name="status_id" value="{{old('status_id')}}" title="حالة الطلب" :loopOver="\App\OrderStatus::all()" showCol="name"></x-select>

                        <x-number name="total" value="{{old('total')}}" title="مجموع الفاتورة الكلي - سوف يتم حسابه اتوماتيكيا ولكن ان تم ادخاله سوف يقوم النظام باعتبار القيمة المعطاه"></x-number>

                        <x-checkbox name="is_fast" value="{{old('is_fast')}}" title="استعجال الطلب"></x-checkbox>

                        <x-textarea name="notes" value="{{old('notes')}}" title="ملاحظات"></x-textarea>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
