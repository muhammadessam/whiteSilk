@props(['name', 'title', 'value'=>'1'])


<div class="form-group">
    <label class="font-weight-bold">{{$title}}</label>
    <div class="mb-3">
        <label class="mr-3">غير فعال</label>
        <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
            <input id="{{$name}}" name="{{$name}}" type="checkbox" checked value="{{$value}}">
            <span class="slider round"></span>
        </label>
        فعال
    </div>
</div>
