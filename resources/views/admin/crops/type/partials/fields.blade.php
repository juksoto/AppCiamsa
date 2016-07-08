    <div class="form-group has-feedback ">
        {!! Form::label('crops',trans('admin.crops.type_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-10">
           {!! Form::text('crops', null, ['class' => 'form-control', 'placeholder' => trans('admin.crops.enter_a_type_crops') , 'required'])  !!}
            <span class="glyphicon glyphicon-ok form-control-feedback" id="crops1"></span>
        </div>
    </div>

