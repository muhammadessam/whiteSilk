@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.orders.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.orders.store')}}" class="form" method="post">
                        @csrf
                        <addresses :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></addresses>
                        <x-select name="branch_id" :loopOver="\App\Branch::all()" showCol="name" value="{{old('branch_id')}}" title="الفرع"></x-select>
                        <x-text name="serial" value="{{old('serial')}}" title="رقم الفاتورة"></x-text>
                        <x-select name="driver_id" value="{{old('driver_id')}}" showCol="name" title="السائق" :loopOver="\App\User::where('type', 'سائق')->with('addresses')->get()"></x-select>
                        <div class="form-group">
                            <label class="font-weight-bold">ادخل القطع</label>
                            <order-pieces :pieces="{{\App\PriceList::all()}}" :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></order-pieces>
                        </div>
                        <order-type :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></order-type>


                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function selectedUserEvent() {
            if ($(event.target).val() == 'اشتراك') {
                Event.$emit('subscription')
            }
        }
    </script>
@endsection
