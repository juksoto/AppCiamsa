    <div class="form-group has-feedback ">
        {!! Form::label('category',trans('admin.products.categories'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-10">
           {!! Form::text('category', null, ['class' => 'form-control', 'placeholder' => trans('admin.products.enter_a_category') , 'required'])  !!}
            <span class="glyphicon glyphicon-ok form-control-feedback" id="category1"></span>
        </div>
    </div>

