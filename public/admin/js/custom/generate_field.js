function createNewFields (wrapperField, nameField)
    {

         // Modify the id of the copy
        wrapField = wrapperField;

        // get the last DIV which ID starts with ^= "field_template_" ex: field_template_0
        var templateField = $( wrapField + ' section[id^="field_template_"]:last');

        // Read the Number from that DIV's ID (i.e: 3 from "field_template_3")
        // And increment that number by 1
        var numField = parseInt( templateField.prop("id").match(/\d+/g), 10 ) +1;

         

        // Clone it and assign the new ID (i.e: from num 4 to ID ex:"field_template_4")
        $sectionClone = templateField.clone().prop('id', 'field_template_' + numField );

        //Clone
        $sectionClone.clone().appendTo(wrapField);  

        //Modify Attribute 
        fieldInput = $(wrapField + ' #field_template_' +  numField + ' [id^="'+ nameField + '_"]:last');
        var numInput = parseInt( fieldInput.prop("id").match(/\d+/g), 10 ) +1;

         $(fieldInput).val('');
         $(fieldInput).attr('id', nameField + "_" + numField);
         $(fieldInput).attr('value','');
         $(fieldInput).attr('name', nameField + "_" + numField);

         $(wrapField + ' #field_template_' +  numField + ' #remove_current_email').attr('onClick','removeField("' + wrapperField  + '",' + numField + ')');

         $('#num_vehicle_make').val(numField);
    }

function removeField(wrapperField, idField)
{
    TemplateRemove = wrapperField + ' #field_template_' +  idField;
    $(TemplateRemove).remove();
}