<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-6">
            {{-- Degingnation --}}
            <div class="form-group">
                <label for="degingnation" class="form-label">Designation</label>

                <input id="desingnation" type="text"
                       class=" form-control{{ $errors->has('desingnation') ? ' is-invalid' : '' }}"
                       name="desingnation"
                       value="{{ old('desingnation', optional($massages)->desingnation) }}">

                @if ($errors->has('desingnation'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('desingnation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <input type="hidden" name="massage_id" id="massage_id">
    
        <div class="col-md-6">
            {{-- Name --}}
            <div class="form-group">
                <label for="name" class="form-label">Name</label>

                <input id="name" type="text"
                       class=" form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name"
                       value="{{ old('name', optional($massages)->name) }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row">
       <div class="col-md-6">
            {{-- Description --}}
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                 <textarea  id="description" type="text" name="description" class=" form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description', optional($massages)->description) }}</textarea>      

                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="image" class="form-label">Image</label>

                <div class="input-group mb-1">
                    <div class="custom-file">
                        <input type="file" value="{{ optional($massages)->image }}" name="image" id="image"
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
                    {!! CommonFunction::getImageFromURL(optional($massages)->image, '', 'show_photo') !!}
                    <div class="first">

                    </div>
                </div>
                {{--Show image--}}

            </div>

        </div>
       
      
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="file" class="form-label">File/Documents</label>

                <div class="input-group mb-1">
                    <div class="custom-file">
                        <input type="file" value="{{ optional($massages)->file }}" name="file" id="file" class="form-control-file{{ $errors->has('file') ? ' is-invalid' : '' }}" onchange="fileUpload(this)" >
                        <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                </div>




                @if ($errors->has('file'))
                    <span style="display:block;" class="invalid-feedback">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif

                {{--Show image--}}

            </div>
            <small id="emailHelp" class="form-text text-muted">
                File Format: *.doc/.docx,.ppt/.pptx,.xls/.xlsx,.txt | Max file size: 5MB
            </small>
            
        </div>
        <div class="col-md-6">
        <div class="mb-2 first">

            </div>
        </div>

    </div>

</div>
<div class="card-footer">
    <div class="float-left">
        <button type="submit" onclick="massagesubmit()" class="btn btn-info float-right">Submit</button>
    </div>
</div>



