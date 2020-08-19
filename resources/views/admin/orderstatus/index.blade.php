@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>حالة الطلب</h3>
                    <div>
                        <form class="form-inline" action="{{route('admin.orderStatus.store')}}" method="post">
                            @csrf
                            <input type="text" name="name" id="name" class="form-control" placeholder="ادخل حالة جديدة ...">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="statuss" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\OrderStatus::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.orderStatus.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.orderStatus.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
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
    <x-datatable id="statuss" mass="{{route('admin.order.status.mass.destroy')}}"></x-datatable>
@endsection
