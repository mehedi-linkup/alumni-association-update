<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="terms_conditions" class="form-label"> Terms and Conditions <span class='required-star'></span></label>
                <textarea id="terms_conditions" type="text" class="form-control{{ $errors->has('terms_conditions') ? ' is-invalid' : '' }}" name="terms_conditions">{{ old('terms_conditions')? old('terms_conditions') : $etc->terms_conditions}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="return_policy" class="form-label">Return Policy <span class='required-star'></span></label>
                <textarea id="return_policy" type="text" class="form-control{{ $errors->has('return_policy') ? ' is-invalid' : '' }}" name="return_policy">{{ old('return_policy')? $old('return_policy') :  $etc->return_policy}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="privacy_policy" class="form-label">Privacy Policy <span class='required-star'></span></label>
                <textarea id="privacy_policy" type="text" class="form-control{{ $errors->has('privacy_policy') ? ' is-invalid' : '' }}" name="privacy_policy">{{ old('privacy_policy')? old('privacy_policy') : $etc->privacy_policy}}</textarea>
            </div>
        </div>
        
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-info float-right">Submit</button>
</div>


