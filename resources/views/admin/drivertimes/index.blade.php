@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>اوقات السائقين</h3>
                    <div>
                        <a href="{{route('admin.drivers-times.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="driverstimes" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>من</th>
                                <th>الي</th>
                                <th>اقصي عدد</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\DriversTime::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{\Carbon\Carbon::create($item['from'])->format('h:i A')}}</td>
                                    <td>{{\Carbon\Carbon::create($item['to'])->format('h:i A')}}</td>
                                    <td>{{$item['max']}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.drivers-times.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.drivers-times.destroy', $item)}}" method="post">
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
    <x-datatable id="driverstimes" mass="{{route('admin.drivers.times.mass.destroy')}}"></x-datatable>
@endsection
