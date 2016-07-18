
<div class="form-group has-feedback ">
    {!! Form::label('product',trans('admin.products.products'), ['class' => 'col-sm-2 control-label'] ) !!}

    <div class="col-sm-10">
        {!! Form::text('product', null, ['class' => 'form-control', 'placeholder' => trans('admin.products.enter_a_product') , 'required'])  !!}
        <span class="glyphicon glyphicon-ok form-control-feedback" id="product1"></span>
    </div>
</div>

<div class="form-group has-feedback ">
    {!! Form::label('category_id',trans('admin.products.categories'), ['class' => 'col-sm-2 control-label'] ) !!}

    <div class="col-sm-10">
        <select name="category_id" id="category_id" class = "form-control" required @if( ( isset ( $data -> blockField ) ) and ($data -> blockField== true)) disabled @endif  >
            <option value="">{{ trans('admin.submit.select') }}</option>
        @foreach($data -> category as $key => $cat)
                <option name="{!! $cat -> category !!}" value="{!!$cat -> id !!}" @if ( (isset($data -> collection -> category_id) ) and ($data -> collection -> category_id == $cat -> id  )) selected @endif >{!! $cat -> category !!}</option>
            @endforeach
        </select>


    </div>
</div>


<div class="form-group has-feedback ">
    @if (! empty($data -> collection -> image))
        {!! Form::label('image',trans('admin.products.image_product'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-8">
            {!! Form::file('image', ['class' => ''])  !!}

            <a href="{{ url('media/products') . '/' .$data -> categoryName .'/'. $data -> collection -> image }} " class="current-attachment">
                <img src="{{ url('media/products') . '/' .$data -> categoryName  .'/'. $data -> collection -> image }} " alt="" width="150">
            </a>
        </div>

    @else
        {!! Form::label('image',trans('admin.products.image_product'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-8">
            {!! Form::file('image',['class' => '', 'required'])  !!}
            <span class="glyphicon form-control-feedback" id="stage1"></span>
        </div>

    @endif
</div>


<div class="form-group has-feedback ">
    @if (! empty($data -> collection -> image))
        {!! Form::label('components',trans('admin.products.image_components'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-8">
            {!! Form::file('components', ['class' => ''])  !!}

            <a href="{{ url('media/products') . '/' .$data -> categoryName .'/'. $data -> collection -> components }} " class="current-attachment">
                <img src="{{ url('media/products'). '/' .$data -> categoryName .'/'. $data -> collection -> components }} " alt="" width="150">
            </a>
        </div>

    @else
        {!! Form::label('components',trans('admin.products.image_components'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-8">
            {!! Form::file('components',['class' => '', 'required'])  !!}
            <span class="glyphicon form-control-feedback" id="stage1"></span>
        </div>

    @endif
</div>