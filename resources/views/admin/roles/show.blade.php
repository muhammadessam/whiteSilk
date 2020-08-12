@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> {{$role->name}}</h3>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="col">
                            <form action="{{route('admin.assign.role.permissions', $role)}}" method="POST">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-4">
                                        <thead>
                                        <tr>
                                            <th>الموديل</th>
                                            <th>الاذونات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach(\Silber\Bouncer\Database\Ability::all()->groupBy("entity_type") as $type=>$names)
                                            <tr>
                                                <td>{{app('roleHelper')->modelToName($type)}}</td>
                                                <td>
                                                    <div class="form-row">
                                                        @foreach($names as $name)
                                                            <div class="n-chk">
                                                                <label
                                                                    class="new-control new-checkbox checkbox-primary">
                                                                    <input type="checkbox" class="new-control-input"
                                                                           name="permissions[]"
                                                                           value="{{$name['name']}}-{{$type}}" {{$role->can($name['name'], $type) ? 'checked':''}}>
                                                                    <span class="new-control-indicator"></span>
                                                                    {{app('roleHelper')->crudsToName($name['name'])}}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
