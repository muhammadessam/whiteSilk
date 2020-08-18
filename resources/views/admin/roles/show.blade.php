@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title"> {{$role->name}}</h3>
                    <div>
                        <div class="n-chk">
                            <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                                <input id="chkall" type="checkbox" onchange="selectAll()">
                                <span class="slider round"></span>
                            </label>
                            كافة الصلاحيات
                        </div>
                    </div>
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

                                        @foreach(\Silber\Bouncer\Database\Ability::all()->groupBy("entity_type") as $type => $names)

                                            <tr>
                                                <td>{{app('roleHelper')->modelToName($type)}}</td>
                                                <td>
                                                    <div class="form-row">
                                                        @foreach($names as $name)
                                                            <div class="n-chk ml-4">
                                                                <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                                                                    <input onchange="changeAll()" class="chk" type="checkbox" name="permissions[]" value="{{$name['name']}}-{{$type}}" {{$role->can($name['name'], $type) ? 'checked':''}}>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                {{($name['name'])}}
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
<script>
    function selectAll() {
        $('.chk').each(function (index, obj) {
            if ($('#chkall').is(':checked')) {
                $(this).prop('checked', true);
            } else {
                $(this).prop('checked', false);

            }
        });
    }

    function changeAll() {
        $('#chkall').prop('checked', false);
    }
</script>
