<!-- modal body -->

<!--<div class="modal-body container-fluid">-->

    <div class="col-md-12">

        <!-- Date Form Input -->

        <div class="row">
            <div class='input-group date center-block' id='datetimepicker'>
                <div class="form-group">
                    {!! Form::label('datetime', 'Date & Time:') !!}
                    {!! Form::text('served_at', null, ['class' => 'form-control']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Type Form Input -->

        <div class="row">
            <div class="form-group center-block">
                {!! Form::label('type', 'Type:') !!}
                <div class="radio radio-primary">
                    <label>
                {!! Form::radio('type_id', 1, ['class' => 'radio radio-success']) !!} Pick up
                    </label>
                </div>
                <div class="radio radio-primary"><label>
                {!! Form::radio('type_id', 2, ['class' => 'radio radio-success']) !!} Delivery
                    </label> </div>
                    <div class="radio radio-primary"><label>
                {!! Form::radio('type_id', 3, ['class' => 'radio radio-success']) !!} At my home
                        </label> </div>
                        <div class="radio radio-primary"><label>
                {!! Form::radio('type_id', 4, ['class' => 'radio radio-success']) !!} At chef's home
                            </label> </div>
            </div>
        </div>

        <!-- Comment Form Input -->

        <div class="row">
            <div class="form-group">
                {!! Form::label('comment', 'Comment:') !!}
                {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
            </div>
        </div>

    </div>

</div>

<!-- Add/Edit Order Form Input -->

<!--<div class="modal-footer">--><!-- modal footer -->
    <button class="btn btn-default">Back to Cart</button> <!--data-dismiss="modal"-->
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form control']) !!}
<!--</div>--><!-- /modal footer -->