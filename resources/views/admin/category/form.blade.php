<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-6">
            {{-- name --}}
            <div class="form-group">
                <label for="name" class="form-label"> Category Name <span class='required-star'></span></label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', optional($category)->name) }}" autofocus>
              
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            {{-- name --}}
            <div class="form-group">
                <label for="name" class="form-label">Sub Category<span class='required-star'></span></label>
               <select name="parent_id" id="parent_id" class="form-control">
                   <option value="0">Parent Category</option>
                   @foreach($levels as $level)
                   <option value="{{$level->id}}">{{$level->name}}</option>
                   @endforeach
               </select>

                @if ($errors->has('parent_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('parent_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            {{-- name --}}
            <div class="form-group">
                <label for="url" class="form-label">Url<span class='required-star'></span></label>
                <input id="url" type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url', optional($category)->url) }}" autofocus>

                @if ($errors->has('url'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            {{-- name --}}
            <div class="form-group">
                <label for="description" class="form-label">Description<span class='required-star'></span></label>
                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', optional($category)->description) }}" autofocus>

                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <input type="hidden" name="category_id" id="category_id">
</div>
<div class="card-footer">
    <button type="submit" onclick="categorysubmit()" class="btn btn-info float-right">Submit</button>
</div>
