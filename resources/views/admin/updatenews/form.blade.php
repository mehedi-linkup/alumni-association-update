<div class="card-body" id="photo_section">
    <div class="row">

        <div class="col-md-12">
            {{-- name --}}
            <div class="form-group" style="display: block">
                <label for="description" style="display: block"> News Description <span
                        class='required-star'></span></label>
                <textarea name="description" id="description" style="display: block">
                    {!! old('description', optional($updatenews)->description) !!}
                   </textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div> 


    </div>
    <div class="row">
        <input type="hidden" name="updatenews_id" id="updatenews_id" value="{{old('updatenews_id',$updatenews->id)}}">
      

    </div>

</div>
<div class="card-footer">
    <div class="float-left">
        <button type="submit" onclick="editupdatenews()" class="btn btn-info float-right">Submit</button>
    </div>
</div>



