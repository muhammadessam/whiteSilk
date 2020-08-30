@props(['title', 'value'])

<div class="row">
    <div class="col">
        <div class="form-group">
            <label class="font-weight-bold">{{$title}}</label>
            <div class="form-control">
                {{$value}}
            </div>
        </div>
    </div>
</div>
