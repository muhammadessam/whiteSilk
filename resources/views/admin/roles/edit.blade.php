@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">اضافة جديد</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.roles.update', $role)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">الاسم</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$role['name']}}">
                                    <x-error title="name"></x-error>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
