<div class="white-row">

    @if ($user->isMe())
        <h2>My Profile</h2>
    @else
        <h2>{{ $user->name }}'s Profile</h2>
    @endif

    <div class="row">
        <div id="profileShow">
            <div class="col-md-3">
                <img class="img-responsive" src="{{ asset('userdata/' . $user->id . '/profile_picture_md.jpg') }}" alt="Profile Picture" width="300" height="300" />
                <h3>{{ $user->name }}</h3>
            </div>
            <div class="col-md-9">
                @if ($user->isMe())
                    <ul>
                        @if ($user->isChef())
                            <li>Rating: {{ $user->rating }}%</li>
                        @endif
                        <li>Email: {{ $user->email }}</li>
                        <li>Member since: {{ $user->created_at }}</li>
                        <li id="locationListElement"></li>
                        @if ($user->isChef())
                            <li>Number of dishes: {{ $user->dishes->count() }}</li>
                        @endif
                        <li>About me: {{ $user->about }}</li>
                    </ul>
                    <button id="editProfileButton" class="btn btn-primary">Edit</button>
                @else
                    <ul>
                        <li>Rating: {{ $user->rating }}%</li>
                        <li>Member since: {{ $user->created_at }}</li>
                        <li>Location: </li>
                        @if ($user->isChef())
                            <li>Number of dishes: {{ $user->dishes->count() }}</li>
                        @endif
                        <li>About him/her: {{ $user->about }}</li>
                    </ul>
                @endif
            </div>
        </div>
        @if ($user->isMe())
            <div id="profileEdit" class="col-md-12">
                @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                    </ul>
                        </div>
                @endif
                {!! Form::model($user, ['id' => 'profileForm', 'method' => 'PATCH', 'action' => ['UsersController@update', $user->id], 'files' => true]) !!}
                    @include('users._form', ['submitButtonText' => 'Update Profile'])
                {!! Form::close() !!}
                <div id="prout" class="row" style="padding-top: 15px;">
                    <div class="col-md-6">
                        <img id="pictureViewer" class="img-responsive" src="" alt="" width="500px" height="500px"/>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>