    <div class="form-group has-feedback ">
        {!! Form::label('crops',trans('admin.crops.type_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-10">
           {!! Form::text('crops', null, ['class' => 'form-control', 'placeholder' => trans('admin.crops.enter_a_type_crops') , 'required'])  !!}
            <span class="glyphicon glyphicon-ok form-control-feedback" id="crops1"></span>
        </div>
    </div>
    <div class="form-group has-feedback ">
        @if (! empty($data -> collection -> icon))
            {!! Form::label('icon',trans('admin.crops.icon_stage_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

            <div class="col-sm-8">
                {!! Form::file('icon', ['class' => ''])  !!}

                <a href="{{ url('media/type-crops') .'/'. $data -> collection -> icon }} " class="current-attachment">
                    <img src="{{ url('media/type-crops') .'/'. $data -> collection -> icon }} " alt="" width="150">
                </a>
            </div>

        @else
            {!! Form::label('icon',trans('admin.crops.icon_type_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

            <div class="col-sm-8">
                {!! Form::file('icon',['class' => '', 'required'])  !!}
                <span class="glyphicon form-control-feedback" id="icon1"></span>
            </div>

        @endif
    </div>

