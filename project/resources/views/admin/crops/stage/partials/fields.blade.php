    <div class="form-group has-feedback ">
        {!! Form::label('stage',trans('admin.crops.title_stage_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-10">
           {!! Form::text('stage', null, ['class' => 'form-control', 'placeholder' => trans('admin.crops.enter_a_stage_crops') , 'required'])  !!}
            <span class="glyphicon glyphicon-ok form-control-feedback" id="stage1"></span>
        </div>
    </div>

    <div class="form-group has-feedback ">
        {!! Form::label('subline',trans('admin.crops.subline_stage_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-10">
            {!! Form::text('subline', null, ['class' => 'form-control', 'placeholder' => trans('admin.crops.enter_a_subline_stage_crops')])  !!}
            <span class="glyphicon form-control-feedback" id="stage1"></span>
        </div>
    </div>
    <div class="form-group has-feedback ">
        {!! Form::label('type_id',trans('admin.crops.type_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-10">
            <select name="type_id" id="type_id" class = "form-control" required >
                <option value="">{{ trans('admin.submit.select') }}</option>
                @foreach($data -> type as $key => $value)
                    <option name="{!! $value -> crops !!}" value="{!!$value -> id !!}" @if ( (isset($data -> collection -> type_id) ) and ($data -> collection -> type_id == $value -> id  )) selected @endif >{!! $value -> crops!!}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group has-feedback ">
        {!! Form::label('order_number',trans('admin.crops.order_number'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-2">
            {!! Form::number('order_number', null, ['class' => 'form-control', 'maxlength' => '2'])  !!}
            <span class="glyphicon form-control-feedback" id="order_number1"></span>
        </div>
    </div>

    <div class="form-group has-feedback ">
        @if (! empty($data -> collection -> image))
        {!! Form::label('image',trans('admin.crops.image_stage_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-8">
            {!! Form::file('image', ['class' => ''])  !!}

            <a href="{{ url('media/stage-crops') .'/'. $data -> collection -> image }} " class="current-attachment">
                <img src="{{ url('media/stage-crops') .'/'. $data -> collection -> image }} " alt="" width="150">
            </a>
        </div>

            @else
            {!! Form::label('image',trans('admin.crops.image_stage_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

            <div class="col-sm-8">
                {!! Form::file('image',['class' => '', 'required'])  !!}
                <span class="glyphicon form-control-feedback" id="stage1"></span>
            </div>

        @endif
    </div>


