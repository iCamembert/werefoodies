<div class="row">

    <!-- CREATE REVIEW -->
    <div class="col-md-6">

        <h2>Write a Review:</h2>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <!--<ul>
                    //@foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    //@endforeach
                        </ul>-->
            </div>
        @endif

        {!! Form::open(['url' => 'reviews']) !!}
            @include('reviews._form', ['submitButtonText' => 'Post Review'])
        {!! Form::close() !!}

        @include('errors.list')

    </div>
    <!-- /CREATE REVIEW -->

</div>