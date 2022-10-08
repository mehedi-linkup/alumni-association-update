<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-12">
            {{-- name --}}
            <div class="form-group" style="display: block">
                <label for="description" style="display: block"> Description <span
                        class='required-star'></span></label>
                <textarea name="description" id="description" style="display: block">
                    {!! old('description', optional($welcomenews)->description) !!}
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
        <div class="col-md-6">
            {{-- name --}}
            <div class="form-group">
                <label for="title" class="form-label"> About Us Title <span class='required-star'></span></label>
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                       name="title" value="{{ old('title', optional($welcomenews)->title) }}" autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
     
        <input type="hidden" name="welcomenews_id" id="welcomenews_id" value="{{old('welcomenews_id',$welcomenews->id)}}">

        <input type="hidden" name="image_check" id="image_check">
        <div class="col-md-6">
            {{-- name --}}
            <div class="form-group">
                <label for="title" class="form-label"> Date <span class='required-star'></span></label>
                <input id="date" type="text" data-select="datepicker"
                       class=" form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                       name="date"
                       value="{{ old('date', (!empty($welcomenews->date) ? CommonFunction::dateShow($welcomenews->date) : null)) }}">

                @if ($errors->has('date'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" style="display: block">
                <label for="image" class="form-label">Image</label>
                <div class="input-group mb-1">
                    <div class="custom-file">
                        <input type="file" value="{{ optional($welcomenews)->image }}" name="image" id="image"
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
                    {!! CommonFunction::getImageFromURL(optional($welcomenews)->image, '', 'show_photo') !!}
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
        <button type="submit" class="btn btn-info float-right">Submit</button>
    </div>
</div>



