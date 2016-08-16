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
    'admin'  => array(
        'admin_title' => "Panel de Control",
        'admin_description' => "Opcines del panel de control",
        ),
    
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
        'reference_stage_crops'             => 'Referencia Tipo Cultivo',
        'enter_a_reference_stage_crops'     => 'Escriba el tipo de cultivo de referencia.',
        'reference'                         => 'Referencia',

        // Relacion Tipos y Etapas  de cultivos
        'title_tsCrop_crops'                => 'Relacion Tipo y Etapas de Cultivos',
        'title_tsCrop_crops_stage'          => 'Nueva Relación',
        'edit_tsCrop_title'                 => 'Editar Relación',
        'content_header_tsCrop_crops'       => 'Cree una nueva relación entre tipo y etapas de cultivos',
        'content_header_tsCrop_crops_edit'  => 'Edite la relación entre tipo y etapas de cultivos',

        // Tipos  de cultivos
        'content_header_type_crops'         => 'Agregar nuevo tipo de cultivo', 
        'content_header_type_crops_edit'    => 'Editar un tipo de cultivo', 
        'description_type_crops'            => 'Crear, Editar y Eliminar los etapas de cultivos',
        'edit_type_crops'                   => 'Editar Tipo de Cultivos',        
        'enter_a_type_crops'                => 'Escriba un tipo de cultivo',        
        'new_type_crops'                    => 'Nuevo Tipo de Cultivos',        
        'title_type_crops'                  => 'Tipo de Cultivos',
        'type_crops'                        => 'Tipo de Cultivos',
        'icon_type_crops'                   => 'Icono',
        
        // Generales
        'id'                                => 'ID',
        'image'                             => 'imagen',
        'subline'                           => 'Sublinea', 

        'order_number'                      => 'Orden'


    ),

    'filter'  => array(
        'active'           => 'activo',
        'filter'           => 'filtrar',
        'inactive'         => 'inactivo',
        'search'           => 'buscar....',
        'select_a_filter ' => 'Seleccione un filtro',
    ),

    'quote'  => array(
        'name'           => 'Nombre',
        'email'          => 'Correo',
        'department'     => 'Depto',
        'city'           => 'Ciudad',
        'type'           => 'Tipo',
        'stage'          => 'Etapa',
        'category'       => 'Categoría',
        'product'        => 'Producto',
        'mezcla'         => 'Mezcla Medida',
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
        'error_stage_no_type'        => 'No existe un tipo de cultivo o no esta activo. Primero debe crear tipos de cultivos.',  

        // Tipos de cultivos
        'type_crops_is_required'            => 'El tipo de cultivo es requerido',        
        'type_crops_already_exists'         => 'Este tipo de cultivo ya existe.',        
        'type_stage_crops_already_exists'   => 'Este tipo de cultivo ya existe en esta etapa.',        
        'create_new_type_crops'             => 'Se ha creado un nuevo tipo de cultivo',


        //Products
        'error_products_no_category' => 'No existe una categoria o no esta activa. Primero debe crear categorias.',  
        'product_is_already'         => 'Este nombre de producto ya existe en esta categoria',  
        'product_stage_is_already'   => 'Este producto ya existe en este tipo y etapa de cultivo',  
        

        //Categories
        'category_already_exists'   => 'El nombre para esta categoria ya existe. Por favor, revisar en categorias inactivas.', 
        'products_is_required'      => 'El nombre del producto es requerido.', 
        'components_is_required'    => 'Los componentes del producto es requerido.', 
        'image_is_required'         => 'La imagen del producto es requerida.', 
        'max_products'              => 'El peso máximo para la imagene es de 1MB',  
        'mimes_image_products'      => 'La imagen es un campo requerido, debe ser formato PNG o GIF y no pesar más de 1MB', 
        'mimes_components_products' => 'Los componentes es un campo requerido, debe ser formato PNG, GIF o JPG y no pesar más de 1MB', 


         // Validaciones
        'already_exists'            => 'ya existe.',       
        'is_required'               => 'es requerido',       
        'no_records_found'          => 'No hay registros',
        "relations_status"          => "El estado de esta relación cambio."           

    ),

     'products'  => array(
            
            // Categorias
            'title_categories'                  => 'Categorías', 
            'description_categories'            => 'Crear, editar y eliminar las categorias para sus productos', 
            'categories'                        => 'Categorías',

            'edit_categories'                   => 'Editar Categorías',
            'create_categories'                 => 'Crear Categorías',
            'content_create_categories'         => 'Crea sus categorías para sus productos',
            'content_edit_categories'           => 'Edite sus categorías para sus productos',

            'category_is_required'              => 'La categoria es un campo obligatorio',
            'category_already_exists'           => 'Ya existe una categoria con el mismo nombre',


            'enter_a_category'                  => 'Escriba una cateogría',        

            // Products
            'title_products'                  => 'Productos', 
            'description_products'            => 'Crear, editar y eliminar los productos',
            'products'                        => 'Productos',
            'create_products'                 => 'Crear productos',
            'content_create_products'         => 'Escriba el nombre del nuevo producto o complemento y escoja la categoria.',
            'enter_a_product'                 => 'Escriba un producto',
            'image_product'                   => 'Imagen del producto',        
            'image_components'                => 'Imagen de los componentes',        

            'edit_products'                   => 'Editar Productos',  
            'content_edit_products'           => 'Edite los productos de la aplicación',

            // Relacion Products Type Stage
            'title_tsProducts'                  => 'Relación Productos, Tipo y Etapas de Cultivos', 
            'description_tsProducts'            => 'Crear, editar y eliminar los tipos, etapas de cultivos con los productos',
            'create_tsProducts'                 => 'Crear relacion',
            'create_content_header_tsProducts'  => 'Cree  una relacion entre productos, tipo y etapas de cultivo.',
            
            // Generales
            'id'                                => 'ID',
            'image'                             => 'imagen',
            'subline'                           => 'Sublinea', 
        ),

    'register' => array(
        'register_title'             => 'Registros',
        'register_description'      => 'Registros de la aplicación. Puede descargar esta informacion.',
        'has_been_removed'          => 'ha sido removido.',
        'published'                 => 'publicado',
        'unpublished'               => 'despublicado',
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
        'download'          => 'Descargar',
        'filter'            => 'Filtrar',
        'filter_object'     => 'Filtro',
        'publish'           => 'Publicar',
        'remove_address'    => 'Remover ',
        'select'            => 'Seleccionar',
        'unpublish'         => 'Despublicar',
        'update'            => 'Actualizar',
    ),
];


