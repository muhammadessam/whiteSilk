@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.giftcard.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.giftcard.store')}}" class="form" method="post">
                        @csrf
                        <x-text name="code" value="{{old('code')}}" title="الكود"></x-text>
                        <x-select :loopOver="\App\GiftCategory::all()" title="النوع" value="{{old('cat_id')}}" name="cat_id" showCol="name"></x-select>
                        <x-number name="amount" value="{{old('amount')}}" title="القيمة"></x-number>
                        <x-textarea title="الوصف" value="{{old('msg')}}" name="msg"></x-textarea>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
