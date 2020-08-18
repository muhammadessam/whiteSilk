@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>حالة طلب السائق</h3>
                    <div>
                        <form class="form-inline" action="{{route('admin.driver-order-status.store')}}" method="POST">
                            @csrf
                            <input type="text" name="name" id="name" class="form-control" placeholder="ادخل حالة جديدة ...">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="status" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\DriverOrderStatus::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.driver-order-status.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.driver-order-status.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="delete-btn" type="submit"><i class="fa fa-trash text-danger"></i></button>
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
    <x-datatable id="status" mass="{{route('admin.driver.order.status.mass.destroy')}}"></x-datatable>
@endsection
