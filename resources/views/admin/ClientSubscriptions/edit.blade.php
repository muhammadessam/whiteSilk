@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">تعديل</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.users.show',$data->pivot->client_id)}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.client.subscription.update')}}" class="form" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="subscription_id" value="{{$data->id}}">
                        <input type="hidden" name="client_id" value="{{$data->pivot->client_id}}">
                        <input type="hidden" name="pivot_id" value="{{$data->pivot->id}}">
                        <x-checkbox name="is_active" value="{{$data->pivot->is_active}}" title="الحالة"></x-checkbox>
                        <x-number name="remaining_pieces" value="{{$data->pivot->remaining_pieces}}" title="عدد القطع الباقية"></x-number>
                        <div class="form-group">
                            <label for="start_date"></label>
                            <input type="date" name="start_date" value="{{$data->pivot->start_date}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="start_date"></label>
                            <input type="date" name="end_date" value="{{$data->pivot->end_date}}" class="form-control">
                        </div>
                        <x-number name="credit" value="{{$data->pivot->credit}}" title="المبلغ الباقي للعميل"></x-number>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
