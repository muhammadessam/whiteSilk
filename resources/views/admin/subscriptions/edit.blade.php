@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">تعديل</h3>
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
                        <x-number name="price" value="{{$subscription['price']}}" title="السعر"></x-number>

                        <x-img></x-img>

                        <subscription oldtype="{{$subscription['type']}}" olddays="{{$subscription['days']}}" oldpieces="{{$subscription['pieces']}}" oldadded_credit="{{$subscription['added_credit']}}"></subscription>

                        <x-checkbox name="is_active" title="الحالة" value="{{$subscription['is_active']}}"></x-checkbox>

                        <attributes :attributes="{{$subscription->attributes}}"></attributes>

                        <button class="btn btn-success"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
