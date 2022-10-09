<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-12">
            {{-- name --}}
            <div class="form-group" style="display: block">
                <label for="description" style="display: block"> Description <span
                        class='required-star'></span></label>
                <textarea name="description" id="description" style="display: block">
                    {!! old('description', optional($welcomenotes)->description) !!}
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
                       name="title" value="{{ old('title', optional($welcomenotes)->title) }}" autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
     
        <input type="hidden" name="welcomenotes_id" id="welcomenotes_id" value="{{old('welcomenotes_id',$welcomenotes->id)}}">
        {{-- <div class="col-md-6">
           
            <div class="form-group">
                <label for="title" class="form-label"> Date <span class='required-star'></span></label>
                <input id="date" type="text" data-select="datepicker"
                       class=" form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                       name="date"
                       value="{{ old('date', (!empty($welcomenotes->date) ? CommonFunction::dateShow($welcomenotes->date) : null)) }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="form-group" style="display: block">
                <label for="image" class="form-label">Image</label>
                <div class="input-group mb-1">
                    <div class="custom-file">
                        <input type="file" value="{{ optional($welcomenotes)->image }}" name="image" id="image"
                               accept="image/jpeg, image/png, image/jpg" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}"
                              onchange="imageUpload(this, 'show_photo')">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
              
                <div class="mb-1 first">
                   
                    
                    <img class="img-thumbnail" src="{{asset($welcomenotes->image)}}" alt="Something" style="width: 100px; height: 100px;" id="show_photo">
                   
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



