@extends('core.master')

@section('title')
   {!! trans ('app.app.quoter_title') !!}
@endsection

@section('class-section')
    wrapper-cotizar
@endsection

@section('nav')
    <a href="{{ route('index')}}" class="button btn-sunflower"> <span class="icon-home" aria-hidden="true"></span> {{ trans('app.submit.home') }}</a>
    <a href="{{ URL::previous() }}"  class="button btn-aqua"> <span class="icon-back" aria-hidden="true" style="padding-top:5px"></span> {{ trans('app.submit.back') }}</a>
@endsection

    @section('content')
        <!-- BG PAPER -->
        <section class="bg-paper row">
            <!--  CONTENT -->
            <section class="content">
                <!-- title -->
                <section class="row header-title text-center">
                    <article class="small-12 small-centered column text-center">
                        <h2>
                            {!! trans ('app.app.quoter_title') !!}
							<span class="textline">
								{!! trans ('app.app.quoter_description') !!}
							</span>
                        </h2>
                    </article>
                </section>
                <!-- End  title -->
            </section>
            <!-- END CONTENT -->
            <section class="row">
                <section class="small-12 column">
                    @include('core.partials.message')
                </section>
            </section>
            <!-- FORM -->
            <section class="row form-cotizar text-center">
                <section class="small-12 medium-8 columns medium-centered">
                    {!! Form::open(['route' => 'quote.create', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form'])!!}
                        @include('core.quote.fields')
                    {!! Form::close()!!}
                </section>
            </section>
            <!-- END FORM -->
        </section>
        <!-- END BG PAPER -->
    <section class="">
        {!! Form::open(['route' => ['admin.tsProducts.show', ':VALUE_ID'], 'method' => 'GET', 'class' => '' , 'id' => 'form-crops-type'])!!}
        {!! Form::close()!!}
        {!! Form::open(['route' => ['quote.showProducts', ':STAGE_ID' , ":TYPE_ID"], 'method' => 'GET', 'class' => '' , 'id' => 'form-stage-type'])!!}
        {!! Form::close()!!}
    </section>
@endsection

@section('bottom')
    <section class="small-12 column text-center">
        <img data-interchange="[{{asset('images/ads/nitroeffi-m.jpg')}} , small], [{{asset('images/ads/nitroeffi-m.jpg')}} , medium], [{{asset('images/ads/nitroeffi.jpg')}}, large]"  alt="Solucion UAN" >
    </section>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{URL::asset('assets/js/validate/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/validate/validate.js')}}"></script>

    <script>

        /**
         * Cambiar el select de las etapas dependiendo del tipo de cultivo.
         */

        function enableStage(idTemplate, stageSelect)
        {
            var row = $('#crops_type_id_' + idTemplate );
            var type = row.val();
            var form = $('#form-crops-type');
            var url = form.attr('action').replace(':VALUE_ID', type);

            var data = form.serialize();

            $.get(url, data, function (result) {
                $('#crops_stage_id_' + idTemplate ).prop("disabled", false);
                $('#crops_stage_id_' + idTemplate ).empty();
                $("#product_id_" + idTemplate).prop("disabled", true);
                $("#product_id_" + idTemplate).empty();
                $("#complements_id_" + idTemplate).prop("disabled", true);
                $('#complements_id_' + idTemplate).empty();

                $('#crops_stage_id_' + idTemplate ).append("<option>Seleccionar</option>");
                $.each(result, function(key, element) {
                    if ( (stageSelect != null) && (element['id'] == stageSelect))
                    {
                        $('#crops_stage_id_' + idTemplate ).append("<option value='" + element['id'] + "' selected>" + element['stage'] + "</option>");
                    }
                    else
                    {
                        $('#crops_stage_id_' + idTemplate ).append("<option value='" + element['id'] + "'>" + element['stage'] + "</option>");
                    }
                });

            }).fail(function () {
                console.log('error');
            });

        }

        function activeProducts(typeID, stageID, productID)
        {
            var form = $('#form-stage-type');
            var url = form.attr('action').replace( ':STAGE_ID', stageID).replace( ':TYPE_ID' , typeID);
            var data = form.serialize();
            $.get(url, data, function (result) {
                $("#product_id_0").prop("disabled", false);
                $("#product_id_0").empty();
                $("#complements_id_0").prop("disabled", false);
                $('#complements_id_0').empty();
                $('#product_id_0').append("<option>Seleccionar</option>");
                $('#complements_id_0').append("<option value=''> Selecionar </option>");
                selectItem = "";
                $.each(result, function(key, element) {
                    if ((element['id'] == productID))
                    {
                        selectItem = "selected";
                    }
                    if (element['category_id'] != 4)
                    {
                        $('#product_id_0').append("<option value='" + element['id'] + "' " +selectItem + ">" +  element['category'] + "- " +  element['product'] + "</option>");
                    }
                    else
                    {
                        $('#complements_id_0').append("<option value='" + element['id'] + "' " + selectItem +">" +  element['product'] + "</option>");
                    }
                    selectItem = "";
                });
            }).fail(function () {
                console.log('error');
            });
        }

        function enableProducts(idTemplate,productSelect)
        {
            row       = $('#crops_stage_id_' + idTemplate );
            idStage   = row.val();
            idType    = $('#crops_type_id_' + idTemplate ).val();
            var form = $('#form-stage-type');

            var url = form.attr('action').replace( ':STAGE_ID', idStage).replace( ':TYPE_ID' , idType);

            var data = form.serialize();

            $.get(url, data, function (result) {
                $("#product_id_" + idTemplate).prop("disabled", false);
                $("#product_id_" + idTemplate).empty();
                $("#complements_id_" + idTemplate).prop("disabled", false);
                $('#complements_id_' + idTemplate).empty();
                $('#product_id_'+ idTemplate).append("<option>Seleccionar</option>");
                $('#complements_id_'  + idTemplate).append("<option value=''> Selecionar </option>");
                selectItem = "";

                $.each(result, function(key, element) {
                    if ((productSelect != null) && (element['id'] == productSelect))
                    {
                        selectItem = "selected"
                    }
                    if (element['category_id'] != 4)
                    {
                        $('#product_id_'  + idTemplate).append("<option value='" + element['id'] + selectItem + "'  >" +  element['category'] + "- " +  element['product'] + "</option>");
                    }
                    else
                    {
                        $('#complements_id_'  + idTemplate).append("<option value='" + element['id'] + selectItem +"'>" +  element['product'] + "</option>");
                    }
                });
            }).fail(function () {
                console.log('error');
            });
         }

        /**
         * Create news headquarter
         * @return object DOM
         */

        function createTemplateCrops()
        {

            initNumPhone = 0;

            var $cropSection = $('#wrapper-crops');
            // get the last DIV which ID starts with ^= "headquarter_template_"
            var $template = $('section[id^="template_wrapper_"]:last');

            // Read the Number from that DIV's ID (i.e: 3 from "headquarter_template_3")
            // And increment that number by 1
            var num = parseInt( $template.prop("id").match(/\d+/g), 10 ) +1;

            // Clone it and assign the new ID (i.e: from num 4 to ID "headquarter_template_4")
            $sectionClone = $template.clone().prop('id', 'template_wrapper_' + num );

            //Clone
            $sectionClone.clone().appendTo($cropSection);

            //Modify the attributes and class
            setAttributeClone(num);
        }

          /**
      * Modify all fields of the headquarter, except phone. For this function call createPhone
      * @param  number numHeadquarter id headquarters where we will create new phones
      */
    function setAttributeClone(numCrop){


         // Modify the id of the copy
        templateCrop = '#template_wrapper_'+ numCrop;

        // Modify Section Crops Type Select
        cropsType = templateCrop +' select[id="crops_type_id_' + (numCrop - 1) + '"]';
        $(cropsType).attr('name','crops_type_id_' + numCrop );
        $(cropsType).attr('onchange','enableStage(' + numCrop + ',null)');
        $(cropsType).attr('id','crops_type_id_' + numCrop );
        $(cropsType).val('');

        // Modify Crops Stage
        cropsStage = templateCrop + ' select[id^="crops_stage_id_' + (numCrop - 1) + '"]';
        $(cropsStage).empty();
        $(cropsStage).attr('name','crops_stage_id_' + numCrop);
        $(cropsStage).attr('onchange','enableProducts(' + numCrop + ',null)');
        $(cropsStage).attr('id','crops_stage_id_' + numCrop);
        $(cropsStage).val('');
         $(cropsStage).prop("disabled", true);


        // Modify Products
        products = templateCrop + ' select[id^="product_id_' + (numCrop - 1) + '"]';
        $(products).empty();
        $(products).attr('name','product_id_' + numCrop);
        $(products).attr('id','product_id_' + numCrop);
        $(products).val('');
        $(products).prop("disabled", true);

        // Modify Complements
        complements = templateCrop + ' select[id^="complements_id_' + (numCrop - 1) + '"]';
        $(complements).empty();
        $(complements).attr('name','complements_id_' + numCrop);
        $(complements).attr('id','complements_id_' + numCrop);
        $(complements).val('');
        $(complements).prop("disabled", true);

        // Modify Mezcla
        mezcla = templateCrop + ' [id^="mezcla_medida_' + (numCrop - 1) + '"]';
        $(mezcla).attr('name','mezcla_medida_' + numCrop);
        $(mezcla).attr('id','mezcla_medida_' + numCrop);
        $(mezcla).val('');

        // Modify Label Mezcla
        labelMezcla = templateCrop + ' [id^="labelMezcla_' + (numCrop - 1) + '"]';
        console.log($(labelMezcla));
        $(labelMezcla).attr('for','mezcla_medida_' + numCrop);
        $(labelMezcla).attr('id','labelMezcla_' + numCrop);
        $(labelMezcla).val('');

         // Modify the attribute conClick of #remove_headquarter
        $(templateCrop + ' #removeCrops').attr("onClick" , "removeCrops(" + numCrop + ")")

        // Number of Headquarter
         $('#total_crops').val(numCrop);

    }

     function removeCrops(idCrop)
    {
        wrapperCrops = "#template_wrapper_" + idCrop;
        $(wrapperCrops).remove();
    }


    </script>

    @if (isset($data -> idType) and isset($data -> idStage))
        <script>
            function initDocument()
            {
                enableStage( 0 , {{ $data -> idStage }});
                @if (isset($data-> idProduct))
                    activeProducts( {{ $data -> idType }}, {{ $data -> idStage }} , {{ $data -> idProduct }})
                @endif
            }

        $( document ).ready(function() {
         initDocument();
        });
        </script>
    @endif
@endsection