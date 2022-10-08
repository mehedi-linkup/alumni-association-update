<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-4">
            {{-- title --}}
            <div class="form-group">
                <label for="title" class="form-label"> Slider Title <span class='required-star'></span></label>
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', optional($sliders)->title) }}" autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <input type="hidden" name="slider_id" id="slider_id">
     
        <input type="hidden" name="image_check" id="image_check">
      
        <div class="col-md-6"  >
            <div class="form-group">
                <label for="image" class="form-label">Image</label>

                <div class="input-group mb-1">
                    <div class="custom-file">
                        <input type="file" value="{{ optional($sliders)->image }}" name="image" id="image" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}" accept="image/jpeg, image/png" onchange="imageUpload(this, 'show_photo')">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                {{--                <small id="emailHelp" class="form-text text-muted">--}}
                {{--                    File Format: *.jpg/ .png | Max file size: 3MB--}}
                {{--                </small>--}}
                <div class="mb-1 first">
                    {{--                    <img class="mb-1" id="photo_preview" height="100" width="100">--}}
                    {!! CommonFunction::getImageFromURL(optional($sliders)->image, '', 'show_photo') !!}
                    <div class="first">

                    </div>
                </div>
                {{--Show image--}}

            </div>

        </div>
        <div class="col-md-6">
            <div class="float-left">
                <button type="submit" onclick="slidersubmit()" class="btn btn-info float-right">Submit</button>
            </div>

        </div>

    </div>
</div>

