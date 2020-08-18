@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.giftCategory.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.giftCategory.store')}}" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-text title="الاسم" value="{{old('name')}}" name="name"></x-text>
                        <x-number title="المبلغ" name="amount" value="{{old('amount')}}"></x-number>
                        <x-img></x-img>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
