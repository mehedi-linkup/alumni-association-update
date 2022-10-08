<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-4">
            {{-- name --}}
            <div class="form-group">
                <label for="name" class="form-label"> Committee Name <span class='required-star'></span></label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', optional($committee)->name) }}" autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            {{-- committee Type --}}
            <div class="form-group">
                <label for="name" class="form-label">Committee Type <span class='required-star'></span></label>
                  <select name="committee_type" id="committee_type" class="form-control">
                     <option selected disabled>Select Committee</option>
                     <option value="Alumni Committee">Alumni Committee</option>
                     <option value="100 Years Celebration Committee">100 Years Celebration Committee</option>
                     <option value="Advisory Committee">Advisory Committee</option>
                  </select>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('committee_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <input type="hidden" name="committee_id" id="committee_id">
        <div class="col-md-4">
            {{-- name --}}
            <div class="form-group">
                <label for="description" class="form-label"> Committee Designation <span class='required-star'></span></label>
                <input id="desingnation" type="text" class="form-control{{ $errors->has('desingnation') ? ' is-invalid' : '' }}" name="desingnation" value="{{ old('desingnation', optional($committee)->desingnation) }}" autofocus>

                @if ($errors->has('desingnation'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('desingnation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            {{-- name --}}
            <div class="form-group">
                <label for="batch" class="form-label"> Batch <span class='required-star'></span></label>
                <input id="batch" type="number" class="form-control{{ $errors->has('batch') ? ' is-invalid' : '' }}" name="batch" value="{{ old('batch', optional($committee)->batch) }}" autofocus>

                @if ($errors->has('batch'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('batch') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <input type="hidden" name="image_check" id="image_check">
       
        <div class="col-md-6"  >
            <div class="form-group">
                <label for="image" class="form-label">Image</label>

                <div class="input-group mb-1">
                    <div class="custom-file">
                        <input type="file" value="{{ optional($committee)->image }}" name="image" id="image" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}" accept="image/jpeg, image/png" onchange="imageUpload(this, 'show_photo')">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                {{--                <small id="emailHelp" class="form-text text-muted">--}}
                {{--                    File Format: *.jpg/ .png | Max file size: 3MB--}}
                {{--                </small>--}}
                <div class="mb-1 first">
                    {{--                    <img class="mb-1" id="photo_preview" height="100" width="100">--}}
                    {!! CommonFunction::getImageFromURL(optional($committee)->image, '', 'show_photo') !!}
                    <div class="first">

                    </div>
                </div>
                {{--Show image--}}

            </div>

        </div>
        <div class="col-md-6">
            <div class="float-left">
                <button type="submit" onclick="committeesubmit()" class="btn btn-info float-right">Submit</button>
            </div>

        </div>

    </div>
</div>

