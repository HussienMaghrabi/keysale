<div class="form-group">
    <label for="exampleInputuname">{{$label}}</label>
    <div class="input-group">
        <input type="file"
               data-default-file="{{$item["$name"]}}"
               name="{{$name}}" class="dropify"
               data-max-file-size="{{$max}}M"/>
    </div>
</div>
