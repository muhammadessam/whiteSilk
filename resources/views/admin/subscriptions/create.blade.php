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
                    <form action="{{route('admin.subscriptions.store')}}" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-text name="name" value="{{old('name')}}" title="الاسم"></x-text>
                        <x-textarea name="description" value="{{old('description')}}" title="الوصف"></x-textarea>
                        <x-number name="price" value="{{old('price')}}" title="السعر"></x-number>

                        <x-img></x-img>

                        <subscription></subscription>

                        <x-checkbox name="is_active" title="الحالة" value="1"></x-checkbox>
                        <attributes :attributes=[]></attributes>
                        <button class="btn btn-success"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
