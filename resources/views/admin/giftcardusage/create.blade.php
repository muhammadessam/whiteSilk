@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.giftCardUsage.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.giftCardUsage.store')}}" class="form" method="post">
                        @csrf

                        <x-select :loopOver="\App\GiftCard::all()" value="{{old('card_id')}}" name="card_id" title="الكارت" showCol="code"></x-select>
                        <x-select :loopOver="\App\User::where('type', 'عميل')->get()" value="{{old('user_id')}}" name="user_id" title="العميل" showCol="name"></x-select>
                        <x-number title="السعر" name="price" value="{{old('price')}}"></x-number>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
