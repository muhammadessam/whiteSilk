@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('admin.subscription-attributes.update', $subscriptionAttribute)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="key" class="font-weight-bold">الاسم :</label>
                        <input type="text" name="key" id="key" class="form-control" value="{{$subscriptionAttribute['key']}}">
                    </div>

                    <div class="form-group">
                        <label for="key" class="font-weight-bold">القيمة :</label>
                        <input type="text" name="value" id="key" class="form-control" value="{{$subscriptionAttribute['value']}}">
                    </div>
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> حفظ </button>
                </form>
            </div>
        </div>
    </div>



@endsection
