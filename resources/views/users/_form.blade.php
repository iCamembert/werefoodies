<!-- Email Form Input -->

<div class="row">
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Location Form Input -->

<div class="row">
    <div class="form-group">
        {!! Form::label('location', 'Location:') !!}
        {!! Form::text('google_place_id', null, ['id' => 'pac-input', 'class' => 'form-control', 'placeholder' => 'Type in your city']) !!}
    </div>
</div>

<div id="map-canvas"></div>
<input type="hidden" name="place_id" id="placeId" />

<!-- About Form Input -->

<div class="row">
    <div class="form-group">
        {!! Form::label('about', 'About:') !!}
        {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Picture Form Input -->

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('picture', 'Picture:') !!}
            {!! Form::file('picture', ['class' => '', 'onChange' => 'readURL(this)']) !!}
        </div>
    </div>
</div>

<input type="hidden" name="cropx" id="cropx" value="0" />
<input type="hidden" name="cropy" id="cropy" value="0" />
<input type="hidden" name="cropw" id="cropw" value="0" />
<input type="hidden" name="croph" id="croph" value="0" />

<!-- Edit Profile Form Input -->

<div class="row">
    <div class="col-md-6">
        <a id="cancelEditProfileButton" class="btn btn-primary">Cancel</a>
    </div>
    <div class="col-md-6">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}
    </div>
</div>