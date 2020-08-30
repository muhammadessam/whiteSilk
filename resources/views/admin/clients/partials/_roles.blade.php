<form action="{{route('admin.role.user.store', $client)}}" method="post">
    @csrf
    @foreach(\Silber\Bouncer\Database\Role::all() as $role)
        <div class="form-group">
            <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                <input type="checkbox" {{$client->roles->contains($role) ? 'checked' : ''}} name="roles[]" value="{{$role['id']}}">
                <span class="slider round"></span>
            </label>
            <label>{{$role['name']}}</label>
        </div>
    @endforeach

    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> حفظ</button>
</form>
