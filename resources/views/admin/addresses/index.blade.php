@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>العناوين</h3>
                    <div>
                        <a href="{{route('admin.addresses.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="addresses" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الدولة</th>
                                <th>المدينة</th>
                                <th>المنطقة</th>
                                <th>العميل</th>
                                <th>حط عرض</th>
                                <th>خط طول</th>
                                <th>تفاصيل</th>
                                <th>الهاتف</th>
                                <th>الهاتف البديل</th>
                                <th>الاسم</th>
                                <th>المربع</th>
                                <th>الجادة</th>
                                <th>الشارع</th>
                                <th>المبني</th>
                                <th>الطابق</th>
                                <th>الشقة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( \App\Address::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item->country->name}}</td>
                                    <td>{{$item->city->name}}</td>
                                    <td>{{$item->area->name}}</td>
                                    <td>{{$item->customer->name}}</td>
                                    <td>{{$item['lat']}}</td>
                                    <td>{{$item['long']}}</td>
                                    <td>{{$item['details']}}</td>
                                    <td>{{$item['phone']}}</td>
                                    <td>{{$item['alter_phone']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['block']}}</td>
                                    <td>{{$item['gada']}}</td>
                                    <td>{{$item['street']}}</td>
                                    <td>{{$item['building']}}</td>
                                    <td>{{$item['floor']}}</td>
                                    <td>{{$item['flat_house']}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.addresses.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.addresses.destroy', $item)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn"><i class="fa fa-trash text-dark"></i></button>
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
    <x-datatable id="addresses"></x-datatable>
@endsection
