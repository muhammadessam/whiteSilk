@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.subscriptions.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.subscriptions.update', $subscription)}}" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <x-text name="name" value="{{$subscription['name']}}" title="الاسم"></x-text>
                        <x-textarea name="description" value="{{$subscription['description']}}" title="الوصف"></x-textarea>
                        <x-img></x-img>
                        <x-select name="type_id" title="النوع" value="{{$subscription['type_id']}}" :loopOver="\App\SubscriptionType::all()" showCol="name"></x-select>
                        <x-number name="price" value="{{$subscription['price']}}" title="السعر"></x-number>
                        <x-text name="pieces" value="{{$subscription['pieces']}}" title="اجمالي عدد القطع"></x-text>
                        <x-checkbox name="is_active" title="الحالة" value="1"></x-checkbox>
                        <attributes :attributes={{$subscription->attributes}}></attributes>
                        <button class="btn btn-success"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
