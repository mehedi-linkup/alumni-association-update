<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-6">
            {{-- Name --}}
            <div class="form-group">
                <label for="name" class="form-label">Name</label>

                <input id="name" type="text"
                       class=" form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name"
                       value="{{ old('name', optional($teacher)->name) }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="col-md-6">
            {{-- degingnation --}}
            <div class="form-group">
                <label for="qualification" class="form-label">Qualification</label>

                <input id="qualification" type="text"
                       class=" form-control{{ $errors->has('qualification') ? ' is-invalid' : '' }}"
                       name="qualification"
                       value="{{ old('qualification', optional($teacher)->qualification) }}">

                @if ($errors->has('qualification'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('qualification') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-md-6">
            {{-- degingnation --}}
            <div class="form-group">
                <label for="depertment" class="form-label">Depertment</label>
                <input id="depertment" type="text"
                       class=" form-control{{ $errors->has('depertment') ? ' is-invalid' : '' }}"
                       name="depertment"
                       value="{{ old('depertment', optional($teacher)->depertment) }}">

                @if ($errors->has('depertment'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('depertment') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            {{--  Teacher Type --}}
           <div class="form-group">
            <label for="teacher_type" class="form-label">Massage Type</label>
            <select name="teacher_type" id="teacher_type" class="form-control">
                <option selected disabled>Select Massage Type </option>
                <option value="Secretary">Secretary</option>
                <option value="Chairman">Chairman</option>
            </select>

            @if ($errors->has('teacher_type'))
                <span class="invalid-feedback">
                        <strong>{{ $errors->first('teacher_type') }}</strong>
                    </span>
            @endif
          </div>
       </div>
    </div>
    <div class="row">
    
        <!-- <input type="hidden" name="teacher_id" id="teacher_id">

        <input type="hidden" name="image_check" id="image_check">
        <div class="col-md-6">
           <div class="form-group">
            <label for="degingnation_title" class="form-label">Teacher Degingnation</label>
            <select name="degingnation_title" id="degingnation_title" class="form-control">
                <option selected disabled>Select Teacher Type </option>
                <option value="Head Teacher">Head Teacher</option>
                <option value="Assistant Teacher">Assistant Teacher</option>
                <option value="Principal Teacher">Principal</option>
                <option value="Professor">Professor</option>
            </select>

            @if ($errors->has('degingnation_title'))
                <span class="invalid-feedback">
                        <strong>{{ $errors->first('degingnation_title') }}</strong>
                    </span>
            @endif
          </div>
       </div> -->

        <div class="col-md-4">
            <div class="form-group" style="display: block">
                <label for="image" class="form-label">Image</label>

                <div class="input-group mb-1">
                    <div class="custom-file">
                        <input type="file" value="{{ optional($teacher)->image }}" name="image" id="image"
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
                    {!! CommonFunction::getImageFromURL(optional($teacher)->image, '', 'show_photo') !!}
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
        <button type="submit" onclick="teachersubmit()" class="btn btn-info float-right">Submit</button>
    </div>
</div>



