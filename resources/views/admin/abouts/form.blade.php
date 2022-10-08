<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-12">
            {{-- name --}}
            <div class="form-group" style="display: block">
                <label for="description" style="display: block"> Description <span
                        class='required-star'></span></label>
                <textarea name="description" id="description" style="display: block">
                    {!! old('description', optional($aboutus)->description) !!}
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
                       name="title" value="{{ old('title', optional($aboutus)->title) }}" autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            {{-- About Type --}}
            <div class="form-group">
                <label for="about_type" class="form-label">About Type</label>
                   <select name="about_type" id="about_type" class="form-control text-capitalize">
                        <option selected disabled>Select About Type </option>
                        <option value="History">History Of Ali Azam School</option>
                        <option value="Achievement">Achievement Of The Organization</option>
                    </select>
                @if ($errors->has('about_type'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('about_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>
     
        <input type="hidden" name="aboutus_id" id="aboutus_id">

        <input type="hidden" name="image_check" id="image_check">
        <div class="col-md-6">
            {{-- name --}}
            <div class="form-group">
                <label for="title" class="form-label"> Date <span class='required-star'></span></label>
                <input id="date" type="text" data-select="datepicker"
                       class=" form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                       name="date"
                       value="{{ old('date', (!empty($aboutus->date) ? CommonFunction::dateShow($aboutus->date) : null)) }}">

                @if ($errors->has('name'))
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
                        <input type="file" value="{{ optional($aboutus)->image }}" name="image" id="image"
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
                    {!! CommonFunction::getImageFromURL(optional($aboutus)->image, '', 'show_photo') !!}
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
        <button type="submit" disabled onclick="aboutussubmit()" id="aboutus_button" class="btn btn-info float-right">Update</button>
    </div>
</div>



