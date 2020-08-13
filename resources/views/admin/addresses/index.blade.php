@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>العناوين</h3>
                    <div>
                        <a href="{{route('admin.addresses.index')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="addresses" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( \App\Address::all() as $item)
                                <tr>
                                    <td>{{$item[id]}}</td>
                                    <td>
                                        <a href="{{route('admin.addresses.edit')}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.addresses.destroy', $item)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="fa fa-trash text-dark"></i></button>
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
