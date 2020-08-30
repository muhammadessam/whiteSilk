@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">الاعدادات</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.settings.update', \App\Settings::Main())}}" class="form" method="post">
                        @csrf
                        @method('PATCH')
                        <x-number name="max_client_can_order_driver" value="{{\App\Settings::Main()->max_client_can_order_driver}}" title="اقصي عدد يستطيع العميل ان يطلب سائق"></x-number>
                        <x-number name="delivery_fees_under_price" value="{{\App\Settings::Main()->delivery_fees_under_price}}" title="رسوم التوصيل في حالة ان قل الطلب عن مبلغ معين"></x-number>
                        <x-number name="delivery_fees_under_amount" value="{{\App\Settings::Main()->delivery_fees_under_amount}}" title="رسوم التوصيل في حالة ان قل الطلب عن عدد قصع معين"></x-number>
                        <x-number name="urgent_fee" value="{{\App\Settings::Main()->urgent_fee}}" title="رسمة توصيل الطلب المستعجل"></x-number>
                        <div class="form-group">
                            <label for="notification_date" class="font-weight-bold">تاريخ الاشعارات</label>
                            <input type="date" name="notification_date" id="notification_date" class="form-control" value="{{\App\Settings::Main()->notification_date}}">
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
