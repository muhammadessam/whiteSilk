@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>استخدام كروت الهدايا</h3>
                    <div>
                        <a href="{{route('admin.giftCardUsage.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usages" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الكود</th>
                                <th>المستخدم</th>
                                <th>السعر</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\GiftCardUsage::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item->card->code}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item['price']}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.giftCardUsage.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.giftCardUsage.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
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
    <x-datatable id="usages" mass="{{route('admin.gift.card.usage.mass.destroy')}}"></x-datatable>
@endsection
