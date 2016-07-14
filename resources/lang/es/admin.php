<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in the admin for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'crops'  => array(
        
        // Etapas de cultivos
        'content_header_stage_crops'        => 'Agregar nueva etapa de cultivo', 
        'content_header_stage_crops_edit'   => 'Editar un etapa de cultivo', 
        'description_stage_crops'           => 'Crear, editar y eliminar las etapas de cultivos',
        'edit_stage_crops'                  => 'Editar etapa de cultivo',        
        'enter_a_stage_crops'               => 'Escriba un etapa de cultivo',        
        'enter_a_subline_stage_crops'       => 'Escriba información adicional.',        
        'image_stage_crops'                 => 'Imagen de la Etapa',
        'new_stage_crops'                   => 'Crear nueva etapa de cultivo',        
        'subline_stage_crops'               => 'Linea secundaria',
        'title_stage_crops'                 => 'Etapa del Cultivo',

        // Relacion Tipos y Etapas  de cultivos
        'title_tsCrop_crops'                => 'Relacion Tipo y Etapas de Cultivos',
        'title_tsCrop_crops_stage'          => 'Nueva Relación',
        'content_header_tsCrop_crops'       => 'Cree una nueva relación entre tipo y etapas de cultivos',


        // Tipos  de cultivos
        'content_header_type_crops'         => 'Agregar nuevo tipo de cultivo', 
        'content_header_type_crops_edit'    => 'Editar un tipo de cultivo', 
        'description_type_crops'            => 'Crear, Editar y Eliminar los etapas de cultivos',
        'edit_type_crops'                   => 'Editar Tipo de Cultivos',        
        'enter_a_type_crops'                => 'Escriba un tipo de cultivo',        
        'new_type_crops'                    => 'Nuevo Tipo de Cultivos',        
        'title_type_crops'                  => 'Tipo de Cultivos',
        'type_crops'                        => 'Tipo de Cultivos',
        
        // Generales
        'id'                                => 'ID',
        'image'                             => 'imagen',
        'subline'                           => 'Sublinea', 


    ),

    'filter'  => array(
        'active'           => 'activo',
        'filter'           => 'filtrar',
        'inactive'         => 'inactivo',
        'search'           => 'buscar....',
        'select_a_filter ' => 'Seleccione un filtro',
    ),

    'message'  => array(

        //Alerts
        'alert_field_update'     => 'ha sido actualizado.',    
        'alert_field_create'     => 'Nuevo item creado.',    
        'alert_field_error'      => 'Ha ocurrido un error.',    

        //Etapas del cultivo
        'stage_crops_is_required'    => 'Etapa del cultivo es requerido', 
        'stage_crops_already_exists' => 'Esta etapa del cultivo ya ha sido creada.',               
        'create_new_stage_crops'     => 'Se ha agregado una nueva etapa de cultivo.',               
        'mimes_stage_crops'          => 'Sólo se permite imágenes png y gif',  
        'max_stage_crops'            => 'El peso máximo para la imagene es de 1MB',  
        'image_stage_crops'          => 'La imagen es un campo requerido, debe ser formato PNG o GIF y no pesar más de 1MB',  

        // Tipos de cultivos
        'type_crops_is_required'    => 'El tipo de cultivo es requerido',        
        'type_crops_already_exists' => 'Este tipo de cultivo ya existe.',        
        'create_new_type_crops'     => 'Se ha creado un nuevo tipo de cultivo',    

         // Validaciones
        'already_exists'            => 'ya existe.',       
        'is_required'               => 'es requerido',       
        'no_records_found'          => 'No hay registros',



        
            

    ),

    'status' => array(
        'status'                    => 'Estado',
        'has_been_published'        => 'ha sido publicado.',
        'has_been_removed'          => 'ha sido removido.',
        'published'                 => 'publicado',
        'unpublished'               => 'despublicado',
    ),

    'submit' => array(
   
        'add'                       => 'Agregar nuevo',
        'add_submit'        => 'Crear nuevo',
        
        'back'              => 'Regresar',
        'create_button'     => 'Guardar',
        'create_new_button' => 'Guardar y Nuevo',
        'filter'            => 'Filtrar',
        'filter_object'     => 'Filtro',
        'publish'           => 'Publicar',
        'remove_address'    => 'Remover ',
        'select'            => 'Seleccionar',
        'unpublish'         => 'Despublicar',
        'update'            => 'Actualizar',
    ),
];

