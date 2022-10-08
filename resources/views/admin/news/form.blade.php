<div class="card-body" id="photo_section">
    <div class="row">

        <div class="col-md-12">
            {{-- name --}}
            <div class="form-group" style="display: block">
                <label for="description" style="display: block"> Notice Description <span
                        class='required-star'></span></label>
                <textarea name="description" id="description" style="display: block">
                    {!! old('description', optional($news)->description) !!}
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
        <div class="col-md-4">
            {{-- name --}}
            <div class="form-group">
                <label for="title" class="form-label"> Notice Title <span class='required-star'></span></label>
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                       name="title" value="{{ old('title', optional($news)->title) }}" autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            {{-- name --}}
            <div class="form-group">
                <label for="title" class="form-label"> Notice Type <span class='required-star'></span></label>
                  <select name="news_type" id="event_type" class="form-control text-capitalize">
                     <option selected disabled>Select Notice Type </option> 
                     <option value="upcoming-news-event">Important Notices about the Upcoming Event</option>
                     <option value="upcoming-news-meeting">Information about upcoming meeting</option>
                  </select>

                @if ($errors->has('news_type'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('news_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <input type="hidden" name="news_id" id="news_id">

        <input type="hidden" name="image_check" id="image_check">
        <div class="col-md-4">
            <div class="form-group" style="display: block">
                <label for="image" class="form-label">Image</label>

                <div class="input-group mb-1">
                    <div class="custom-file">
                        <input type="file" value="{{ optional($news)->image }}" name="image" id="image"
                               class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}"
                               accept="image/jpeg, image/png" onchange="imageUpload(this, 'show_photo')">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                {{--                <small id="emailHelp" class="form-text text-muted">--}}
                {{--                    File Format: *.jpg/ .png | Max file size: 3MB--}}
                {{--                </small>--}}
                <div class="mb-1 first">
                    {{--                    <img class="mb-1" id="photo_preview" height="100" width="100">--}}
                    {!! CommonFunction::getImageFromURL(optional($news)->image, '', 'show_photo') !!}
                    <div class="first">

                    </div>
                </div>
                {{--Show image--}}

            </div>

        </div>

    </div>

</div>
<div class="card-footer">
    <div class="float-left">
        <button type="submit" onclick="newssubmit()" class="btn btn-info float-right">Submit</button>
    </div>
</div>



