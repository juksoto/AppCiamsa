<!-- Nombre -->
<section class="row">
    <article class="small-4 medium-3 text-left columns">
        {!! Form::label('name',trans('app.form.name'), ['class' => 'control-label'] ) !!}
    </article>
    <article class="small-8  medium-9 columns">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.message.enter_a_name') , 'required'])  !!}
        <span class="glyphicon glyphicon-ok form-control-feedback" id="name1"></span>

        {!! Form::text('direccion', null, ['class' => 'form-control input-one' , 'placeholder' => trans('app.message.enter_a_name') , 'required'])  !!}
        {!! Form::text('persona', 'ciamsa app', ['class' => 'form-control input-one', 'placeholder' => trans('app.message.enter_a_name') , 'required'])  !!}

    </article>
</section>
<!-- End Nombre -->
<!-- Email -->
<section class="row">
    <article class="small-4 medium-3 text-left columns">
        {!! Form::label('email',trans('app.form.email'), ['class' => 'control-label'] ) !!}
    </article>
    <article class="small-8  medium-9 columns">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('app.message.enter_a_email') , 'required'])  !!}
        <span class="glyphicon glyphicon-ok form-control-feedback" id="email1"></span>
    </article>
</section>
<!-- End Email -->
<!-- Empresa -->
<section class="row">
    <article class="small-4 medium-3 text-left columns">
        {!! Form::label('company',trans('app.form.company'), ['class' => 'control-label'] ) !!}
    </article>
    <article class="small-8  medium-9 columns">
        {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => trans('app.message.enter_a_company') , 'required'])  !!}
        <span class="glyphicon glyphicon-ok form-control-feedback" id="company1"></span>
    </article>
</section>
<!-- End Empresa -->
<!-- Departamento -->
<section class="row">
    <article class="small-4 medium-3 text-left columns">
        {!! Form::label('department_id',trans('app.form.department'), ['class' => 'control-label'] ) !!}
    </article>
    <section class="small-8 medium-9 columns">
        <select name="department_id" id="department_id" class = "form-control" required>
            <option value="">{{ trans('app.message.select') }}</option>
            @foreach($data -> allDepartments as $department)
                <option name="select_type" value="{!!$department -> id !!}">
                      {!! $department -> departments !!}</option>
            @endforeach
        </select>
    </section>
</section>
<!-- End Departamento -->
<!-- Ciudad -->
<section class="row">
    <article class="small-4 medium-3 text-left columns">
        {!! Form::label('city',trans('app.form.city'), ['class' => 'control-label'] ) !!}
    </article>
    <article class="small-8  medium-9 columns">
        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => trans('app.message.enter_a_city') , 'required'])  !!}
        <span class="glyphicon glyphicon-ok form-control-feedback" id="city1"></span>
    </article>
</section>
<!-- End Ciudad -->
<!-- Telefono -->
<section class="row">
    <article class="small-4 medium-3 text-left columns">
        {!! Form::label('phone',trans('app.form.phone'), ['class' => 'control-label'] ) !!}
    </article>
    <article class="small-8  medium-9 columns">
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('app.message.enter_a_phone')])  !!}

    </article>
</section>
<!-- End Telefono -->
<!-- Celular -->
<section class="row">
    <article class="small-4 medium-3 text-left columns">
        {!! Form::label('mobile',trans('app.form.mobile'), ['class' => 'control-label'] ) !!}
    </article>
    <article class="small-8  medium-9 columns">
        {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => trans('app.message.enter_a_mobile') , 'required'])  !!}
        <span class="glyphicon glyphicon-ok form-control-feedback" id="company1"></span>
    </article>
</section>
<!-- End Celular -->
<!-- WRAPPER CROPS -->
<section class="wrapper-crops" id = "wrapper-crops">
    <!-- Tipo Cultivo -->
    <section class="row">
        <article class="small-4 medium-3 text-left columns">
            {!! Form::label('crops_type_id',trans('app.form.type_crops'), ['class' => 'control-label'] ) !!}
        </article>
        <section class="small-8 medium-9 columns">
            <select name="crops_type_id" id="crops_type_id" class = "form-control" required>
                <option value="">{{ trans('app.message.select') }}</option>
                @foreach($data -> allType as $type)
                    <option name="select_type" value="{!!$type -> id !!}">
                        {!! $type -> crops !!}</option>
                @endforeach
            </select>
        </section>
    </section>
    <!-- End Tipo Cultivo -->
    <!-- Etapa del cutltivo -->
    <section class="row">
        <article class="small-4 medium-3 text-left columns">
            {!! Form::label('crops_stage_id',trans('app.form.stage_crops'), ['class' => 'control-label'] ) !!}
        </article>
        <section class="small-8 medium-9 columns">
            <select name="crops_stage_id" id="crops_stage_id" class = "form-control" required @if ($data -> stageEnabled == false) disabled @endif>
                <option value="">{{ trans('app.message.select') }}</option>
                @foreach($data -> allStage as $stage)
                    <option name="select_type" value="{!!$stage -> id !!}">
                        {!! $stage -> stage !!}</option>
                @endforeach
            </select>
        </section>
    </section>
    <!-- End Etapa del cutltivo -->
    <!-- Producto -->
    <section class="row">
        <article class="small-4 medium-3 text-left columns">
            {!! Form::label('product_id',trans('app.form.product'), ['class' => 'control-label'] ) !!}
        </article>
        <article class="small-8 medium-9 columns">
            <select name="product_id" id="product_id" class = "form-control" required @if ($data -> productEnabled == false) disabled @endif>
                <option value="">{{ trans('app.message.select') }}</option>
                @foreach($data -> products as $product)
                    <option name="select_type" value="{!!$product -> id !!}">
                        {!! $product -> product !!}</option>
                @endforeach
            </select>
        </article>
    </section>
    <!-- End Producto -->
    <!-- Forkamix a la medida -->
    <section class="row">
        <article class="small-4 medium-3 columns text-medium-right text-small-only-center">
            {!! Form::checkbox('mezcla_medida', 'si' , ['class' => 'form-control']) !!}
        </article>
        <article class="small-8  medium-9 columns text-medium-left text-small-only-center">
            {!! Form::label('mezcla_medida',trans('app.form.forkamix'), ['class' => 'control-label'] ) !!}
        </article>
    </section>
    <!-- End Forkamix a la medida -->
</section>
<!-- END WRAPPER CROPS -->
<!-- Mensaje -->
<section class="row">
    <article class="small-12 columns text-left">
        {!! Form::label('information',trans('app.form.information'), ['class' => 'control-label'] ) !!}
    </article>
    <article class="small-12 columns">
        {!! Form::textarea('information', null , ['class' => 'form-control' ,'size' => '30x3']) !!}
    </article>
</section>
<!-- End Mensaje -->
<!-- Mensaje -->
<section class="row">
    <article class="small-12 columns">
        {!! Form::submit(trans('app.submit.quote') , ['class' => 'button']) !!}
    </article>
</section>
<!-- End Mensaje -->



