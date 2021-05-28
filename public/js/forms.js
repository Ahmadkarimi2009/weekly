

/**
 * Setting the value of a given input to zero
 * if value less than zero is not allowed for
 * it.
 * 
 * @param {object} thiss 
 */
function set_value_to_zero_if_minus(thiss) {

    // If current value is less than zero.
    if (thiss.value < 0) {

        // Set the value back to zero.
        thiss.value = 0;
    }
}

/**
 * Confirmation of deletion forms before submissions.
 */
$(document).ready(function(){

    $('.delete_forms').on('click', function(e){
        swal({
            title: "Are you sure?",
            text: "You want to delete this?!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
              $(this).parent('form').submit();
            } else {
              swal("Process Canceled. You are safe!");
            }
        });
    })
});


$(document).on('change', '#event_type_select_box', function(){

    // Remove previously added fields that were from pervious event type.
    $('.event_type_related_fields').remove();

    // Get the ID of this event type.
    let chosen_event_type_id = $(this).val();

    // Get the entity for this chosen event type.
    let chosen_event_type_fields = event_types.find(ob => ob.id == chosen_event_type_id).fields;

    let input_tag = "";

    // Loop through IDs of the fields for this event type.
    chosen_event_type_fields.forEach(function(field_id){

        // Get access to the actual field using the current field id.
        let actual_field = fields.find(ob => ob.id == field_id);

        // Extra classes in case the field is for totals.
        let extra_classes = add_necessary_classes_for_totals(actual_field);

        // Generate a field for the form based on this actual field.
        input_tag += `
            <div class="col-sm-6 event_type_related_fields">
                <div class="form-group pt-3">
                    <label for="${actual_field.machine_name}">${actual_field.name}</label>
                    <input type="${actual_field.data_type}" class="form-control form-control-lg ${extra_classes}"
                    name="${actual_field.machine_name}" id="${actual_field.machine_name}" placeholder="${actual_field.name}" required>
                </div>
            </div>
        `;
    });

    // Add the generated fields to the form.
    $('#event_type_select_box_container').after(input_tag);
});


/**
 * Returning appropriate class
 * for the given field if it is
 * for calculating total number
 * of male or female.
 * @param {object} actual_field 
 * @returns 
 */
function add_necessary_classes_for_totals(actual_field) {

    // Empty class.
    let classes = "";

    // If field is total of male or female.
    if (actual_field.machine_name == 'number_of_male' || actual_field.machine_name == 'number_of_female') {

        // Return class name.
        return 'mw_totals'
    }

    // Return empty class.
    return classes;
}

$('.add_edit_report_form_submit_btn').on('click', function(e){
    let json_data = new Object;
    $('.event_type_related_fields input').each(function(){
        json_data[$(this).attr('name')] = $(this).val();
    });

    $('#json_data_input_field').val(JSON.stringify(json_data));
    $(this).parents('form').submit();
})