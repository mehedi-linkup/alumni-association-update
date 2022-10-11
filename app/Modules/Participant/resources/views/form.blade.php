<div class="card-body" id="photo_section">
    <div class="row">
        <div class="col-md-4">
            {{-- name --}}
            <div class="form-group">
                <label for="name" class="form-label"> Name <span class='required-star'></span></label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    name="name" value="{{ old('name', optional($participant)->name) }}" autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            {{-- Father Name --}}
            <div class="form-group">
                <label for="fathers_name" class="form-label"> Fathers Name <span class='required-star'></span></label>
                <input id="fathers_name" type="text"
                    class="form-control{{ $errors->has('fathers_name') ? ' is-invalid' : '' }}" name="fathers_name"
                    value="{{ old('fathers_name', optional($participant)->fathers_name) }}" autofocus>

                @if ($errors->has('fathers_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('fathers_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            {{-- Mother Name --}}
            <div class="form-group">
                <label for="mother_name" class="form-label">Mother Name</label>

                <input id="mother_name" type="text"
                    class=" form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" name="mother_name"
                    value="{{ old('mother_name', optional($participant)->mother_name) }}">

                @if ($errors->has('mother_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('mother_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            {{-- date of birth --}}
            <div class="form-group">
                <label for="email" class="form-label">Email</label>

                <input id="email" type="email"
                    class=" form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                    value="{{ old('email', optional($participant)->email) }}">

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            {{-- date of birth --}}
            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>

                <input id="phone" type="number"
                    class=" form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                    value="{{ old('phone', optional($participant)->phone) }}">

                @if ($errors->has('phone'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif

            </div>
        </div>
        <div class="col-md-4">
            {{-- date of birth --}}
            <div class="form-group">
                <label for="occupation" class="form-label">Occupation</label>

                <input id="occupation" type="text"
                    class=" form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" name="occupation"
                    value="{{ old('occupation', optional($participant)->email) }}">

                @if ($errors->has('occupation'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('occupation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <input type="hidden" value="" name="participant_id" id="participant_id">
        <div class="col-md-4">
            {{-- Present Address --}}
            <div class="form-group">
                <label for="present_address" class="form-label">Present Address</label>

                <input id="present_address" type="text"
                    class=" form-control{{ $errors->has('present_address') ? ' is-invalid' : '' }}"
                    name="present_address"
                    value="{{ old('present_address', optional($participant)->present_address) }}">

                @if ($errors->has('present_address'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('present_address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            {{-- Present Address --}}
            <div class="form-group">
                <label for="permanent_address" class="form-label">Permanent Address</label>

                <input id="permanent_address" type="text"
                    class=" form-control{{ $errors->has('permanent_address') ? ' is-invalid' : '' }}"
                    name="permanent_address"
                    value="{{ old('permanent_address', optional($participant)->permanent_address) }}">

                @if ($errors->has('permanent_address'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('permanent_address') }}</strong>
                    </span>
                @endif

            </div>
        </div>
        <div class="col-md-4">
            {{-- date of birth --}}
            <div class="form-group">
                <label for="passing_year" class="form-label">Passing Year</label>
                <?php $start = 1970;
                $end = intval(date('Y', strtotime(\Carbon\Carbon::now())));
                $i = 0; ?>
                <select id="passing_year" class="form-control" name="passing_year">
                    <option selected disabled value=""> Select Passing Year</option>
                    <?php for($i = $start; $i <= $end; $i++){ ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                @if ($errors->has('passing_year'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('passing_year') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div id="pass" class="col-md-4">
            {{-- date of birth --}}
            <div class="form-group">
                <label for="password" class="form-label">Password</label>

                <input id="password" type="password"
                    class=" form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                    value="{{ old('password', optional($participant)->password) }}">

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div id="confirm_pass" class="col-md-4">
            {{-- date of birth --}}
            <div class="form-group">
                <label for="confirm_password" class="form-label">Confirm Password</label>

                <input id="confirm_password" type="password"
                    class=" form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}"
                    name="confirm_password" value="{{ old('password', optional($participant)->password) }}">

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            {{-- date of Blood Group --}}
            <div class="form-group">
                <label for="blood_group" class="form-label">Blood Group</label>
                <select name="blood_group" id="blood_group" class="form-control">
                    <option selected disabled>Select Blood Group</option>
                    <option value="A+">A+(ve)</option>
                    <option value="A-">A-(ve)</option>
                    <option value="AB+">AB+(ve)</option>
                    <option value="AB-">AB-(ve)</option>
                    <option value="B+">B+(ve)</option>
                    <option value="B-">B-(ve)</option>
                    <option value="O+">O+(ve)</option>
                    <option value="O-">O-(ve)</option>
                </select>

                @if ($errors->has('blood_group_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('blood_group') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            {{-- date of Gender --}}
            <div class="form-group">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option selected disabled>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                @if ($errors->has('gender'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div id="image_col" class="col-md-4">
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <div class="input-group mb-1">
                    <div class="custom-file">
                        <input type="file" value="{{ optional($participant)->image }}" name="image"
                            id="image" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}"
                            accept="image/jpeg, image/png" onchange="imageUpload(this, 'show_photo')">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="mb-1 first">
                    {!! CommonFunction::getImageFromURL(optional($participant)->image, '', 'show_photo') !!}
                </div>
                {{-- Show image --}}

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="dress" class="form-label">Dress Size</label>
                <select name="dress" id="dress" class="form-control">
                    <option selected disabled>Select Dress Size</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>
                </select>

                @if ($errors->has('dress'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('dress') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" onclick="participantsubmit()" class="btn btn-info float-right">Submit</button>
        </div>
    </div>
</div>
</div>
