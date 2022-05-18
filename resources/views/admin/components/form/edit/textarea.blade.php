<div class="form-group">
    <label for="exampleInputuname">{{$label}}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="{{$icon}}"></i></span>
        </div>
        <textarea style="direction: ltr" required name="{{$name}}" type="text"  cols="5" rows="5"  class="form-control">{{$item["$name"]}}</textarea>
    </div>
</div>
