@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>كروت الهدايا</h3>
                    <div>
                        <a href="{{route('admin.giftcard.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="giftcards" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الكود</th>
                                <th>النوع</th>
                                <th>القيمة</th>
                                <th>الرسالة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\GiftCard::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['code']}}</td>
                                    <td>{{$item->cat ? $item->cat->name : ''}}</td>
                                    <td>{{$item['amount']}}</td>
                                    <td>{{$item['msg']}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.giftcard.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.giftcard.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn"><i class="fa fa-trash text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <x-datatable id="giftcards" mass="{{route('admin.gift.card.mass.destroy')}}"></x-datatable>
@endsection
