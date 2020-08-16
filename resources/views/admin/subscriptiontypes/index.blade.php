@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>انواع الاشتراكات</h3>
                    <div>
                        <form class="form-inline" action="{{route('admin.subscription-types.store')}}" method="post">
                            @csrf
                            <input class="form-control" type="text" name="name" id="name" placeholder="ادخل نوع جديد ...">
                            <button type="submit" href="{{route('admin.subscription-types.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="subscriptionTypes" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>النوع</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( \App\SubscriptionType::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.subscription-types.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.subscription-types.destroy', $item)}}" method="post">
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
    <x-datatable id="subscriptionTypes" mass="{{route('admin.subscription.types.mass.destroy')}}"></x-datatable>
@endsection
