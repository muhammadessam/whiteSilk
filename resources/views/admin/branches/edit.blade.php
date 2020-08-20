@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.branches.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.branches.update', $branch)}}" class="form" method="post">
                        @csrf
                        @method('PUT')
                        <x-text name="name" value="{{$branch['name']}}" title="الاسم"></x-text>
                        <x-text name="bill_prefix" value="{{$branch['bill_prefix']}}" title="الرقم المسبق للفاتورة"></x-text>
                        <x-checkbox name="is_app" value="{{$branch['is_app']}}" title="يدعم الاستقبال من التطبيق"></x-checkbox>
                        <x-select name="country_id" value="{{$branch['country_id']}}" showCol="name" title="الدولة" :loopOver="\App\Country::all()"></x-select>
                        <x-select name="city_id" value="{{$branch['city_id']}}" showCol="name" title="المدينة" :loopOver="\App\City::all()"></x-select>
                        <x-select name="area_id" value="{{$branch['area_id']}}" showCol="name" title="المنطقة" :loopOver="\App\Area::all()"></x-select>
                        <x-textarea name="details" value="{{$branch['details']}}" title="تفاصيل العنوان"></x-textarea>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
