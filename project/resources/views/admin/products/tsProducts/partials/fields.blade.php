    <div class="form-group has-feedback ">
        {!! Form::label('crops_type_id',trans('admin.crops.type_crops'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-10">

            <select name="crops_type_id" id="crops_type_id" class = "form-control" required>
                <option value="">{{ trans('admin.submit.select') }}</option>
                @foreach($data -> typeAllCrops as $crops)
                    <option name="select_type" value="{!!$crops -> id !!}"
                            @if (isset($data -> collection) and ($data -> collection -> crops_type_id  == $crops -> id ) )  selected @endif>{!! $crops -> crops !!}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group has-feedback ">
        {!! Form::label('crops',trans('admin.crops.title_stage_crops'), ['class' => 'col-sm-2 control-label'] ) !!}


        <div class="col-sm-10">
            <select name="crops_stage_id" id="crops_stage_id" class = "form-control"  required @if ($data -> stageEnabled == false) disabled @endif>
                <option value="">{{ trans('admin.submit.select') }}</option>
                @foreach($data -> stageAllCrops as $stages)
                    <option value="{!!$stages -> id !!}" @if (isset($data -> collection) and ($data -> collection -> crops_stage_id  == $stages -> id ) )  selected @endif >{!! $stages -> stage !!}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group has-feedback ">
        {!! Form::label('product_id',trans('admin.products.products'), ['class' => 'col-sm-2 control-label'] ) !!}

        <div class="col-sm-10">
            <select name="product_id" id="product_id" class = "form-control" required>
                <option value="">{{ trans('admin.submit.select') }}</option>
                @foreach($data -> products as $product)
                    <option name="select_country" value="{!!$product -> id !!}"  @if (isset($data -> collection) and ($data -> collection -> product_id  == $product -> id ) )  selected @endif>{!! $product -> category -> category !!} -  {!! $product -> product !!}</option>
                @endforeach
            </select>
        </div>
    </div>



