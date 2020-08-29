@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>قائمة الاسعار</h3>
                    <div>
                        <a href="{{route('admin.price-list.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="prices" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الصنف</th>
                                <th>غسيل جاف</th>
                                <th>غسيل وكوي</th>
                                <th>كوي</th>
                                <th>صورة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( \App\PriceList::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['item']}}</td>
                                    <td>{{$item['washing']}}</td>
                                    <td>{{$item['washingAndIron']}}</td>
                                    <td>{{$item['ironed']}}</td>
                                    <td><img src="{{asset($item['img'])}}" style="width: 50px;height: 50px" class="rounded-circle"></td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.price-list.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.price-list.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
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
    <x-datatable id="prices" mass="{{route('admin.price.list.mass.destroy')}}"></x-datatable>
@endsection
