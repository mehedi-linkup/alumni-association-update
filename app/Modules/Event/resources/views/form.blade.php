<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-6">
            {{-- Event Name --}}
            <div class="form-group">
                <label for="event_name" class="form-label"> Event Type <span class='required-star'></span></label>
                <input id="event_name" type="text" required class="form-control{{ $errors->has('event_name') ? ' is-invalid' : '' }}" name="event_name" value="{{ old('event_name', optional($event)->event_name) }}" autofocus>
               
                @if ($errors->has('event_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('event_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <!-- <div class="col-md-4">
            <div class="form-group">
                <label for="event_type" class="form-label"> Event Type <span class='required-star'></span></label>
                    <select name="event_type" id="event_type" class="form-control">
                        <option selected disabled>Select Teacher Type </option>
                        <option value="school-gallery">School Gallery</option>
                        <option value="committee-gallery">Committee Gallery</option>
                    </select>

                @if ($errors->has('event_type'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('event_type') }}</strong>
                    </span>
                @endif
            </div>
        </div> -->


        <div class="col-md-6">
            {{-- date of date --}}
            <div class="form-group">
                <label for="date" class="form-label">Date</label>
                <input id="date" required type="text" data-select="datepicker"
                       class="Date form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                       name="date"
                       value="{{ old('date', (!empty($event->date) ? CommonFunction::dateShow($event->date) : null)) }}">

                @if ($errors->has('date'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <!-- previous code -->
    <!-- <div class="row" >
        <div class="col-md-6"  >
            <div class="form-group">
                <label for="photo" class="form-label">Photo</label>

                <div class="input-group mb-1" >
                    <div class="custom-file">
                        <input type="file" name="photo[]" id="photo" multiple  class="form-control-file">
                        <label class="custom-file-label" for="photo">Choose file</label>
                    </div>
                </div>

                @if ($errors->has('photo'))
                    <span style="display:block;" class="invalid-feedback">
                        <strong>{{ $errors->first('photo') }}</strong>
                   </span>
                @endif

            </div>

            <small id="emailHelp" class="form-text text-muted">
                File Format: *.jpg/ .png | Max file size: 3MB -->
            <!-- </small>

        </div>
      
    </div> --> 


    <!-- recent code -->

     <div class="input-field">
        <label class="active">Photos</label>
        <div class="input-images-1" style="padding-top: .5rem;"></div>
    </div>
</div>

<input type="hidden" name="gallery_id" id="gallery_id">
<div class="card-footer">
    <a href="{{ route('view-gallery') }}">
        <button type="button" class="btn btn-danger">Close</button>
    </a>
    <button type="submit" class="btn btn-info float-right">Submit</button>
</div>


