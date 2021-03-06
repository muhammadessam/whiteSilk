@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.coupons.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.coupons.update',$coupon)}}" class="form" method="post">
                        @csrf
                        @method('PUT')
                        <x-text name="name" value="{{$coupon['name']}}" title="الاسم"></x-text>
                        <x-text name="code" value="{{$coupon['code']}}" title="الكود"></x-text>
                        <x-textarea name="description" title="الوصف" value="{{$coupon['description']}}"></x-textarea>

                        <div class="form-group">
                            <label class="font-weight-bold" for="type">النوع</label>
                            <select name="type" id="type" class="form-control">
                                <option value="ثابت" {{$coupon['type'] == 'ثابت' ? 'selected':''}}>ثابت</option>
                                <option value="نسبة" {{$coupon['type'] == 'نسبة' ? 'selected':''}}>نسبة</option>
                            </select>
                            <x-error title="type"></x-error>
                        </div>

                        <x-number title="القيمة" name="value" value="{{$coupon['value']}}"></x-number>

                        <x-checkbox value="1" name="is_free_Shipping" title="الشحن المجاني"></x-checkbox>

                        <x-number name="total_usage" value="{{$coupon['total_usage']}}" title="الاستخدام الكلي"></x-number>

                        <x-number name="usage_per_user" value="{{$coupon['usage_per_user']}}" title="الاستخدام لكل شخص"></x-number>

                        <x-checkbox title="الحالة" value="1" name="is_active"></x-checkbox>

                        <div class="form-group">
                            <label for="start" class="font-weight-bold">البداية</label>
                            <input type="datetime-local" name="start" id="start" class="form-control" value="{{\Carbon\Carbon::create($coupon['start'])->format('Y-m-d\TH:i')}}">
                        </div>
                        <div class="form-group">
                            <label for="end" class="font-weight-bold">النهاية</label>
                            <input type="datetime-local" name="end" id="end" class="form-control" value="{{\Carbon\Carbon::create($coupon['end'])->format('Y-m-d\TH:i')}}">
                        </div>
                        <x-number value="{{$coupon['minimum_amount']}}" name="minimum_amount" title="اقل قيمة"></x-number>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
