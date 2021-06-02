

/**
 * Setting the value of a given input to zero
 * if value less than zero is not allowed for
 * it.
 * 
 * @param {object} thiss 
 */
function set_value_to_zero_if_minus(thiss) {

    // If current value is less than zero.
    if (thiss.val() < 0) {

        // Set the value back to zero.
        thiss.val(0);
    }
}

/**
 * Returns 'readonly' if field is total.
 * Returns empty of field is not total.
 * Total fields are supposed to be readonly as
 * the system itself is going to manipulate them.
 * @param {object} field 
 * @returns 
 */
function determine_if_readonly_input(field) {
    if (field.machine_name == 'total' || field.machine_name == 'total_eneficiaries') {
        return 'readonly';
    }

    return '';
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

/**
 * Adding necessary fields based on the selected activity type.
 */
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

        let read_only = determine_if_readonly_input(actual_field);

        if (actual_field.data_type == 'checkbox') {
            input_tag += `
                <div class="col-sm-12 event_type_related_fields">
                    <label>In SCC or Field</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="in_scc_or_field" id="in_scc" value="SCC" checked>
                        <label class="form-check-label" for="in_scc">
                            In SCC
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="in_scc_or_field" id="in_field" value="Field">
                        <label class="form-check-label" for="in_field">
                            In Field
                        </label>
                    </div>
                </div>
            `;
        }
        else if (actual_field.data_type == 'selectbox') {

            let options_list = "";
            for (const key in provinces) {
                if (Object.hasOwnProperty.call(provinces, key)) {
                    const element = provinces[key];
                    options_list += '<option value="' + element.id + '">' + element.name + '</option>';
                }
            }
            input_tag += `
                <div class="col-sm-6 event_type_related_fields">
                    <div class="form-group pt-3">
                        <label for="with_province_select_box">With Province</label>
                        <select class="form-control form-control-lg" name="with_province" id="with_province_select_box" aria-label="Select Provinces Select Box" required="required">
                            <option value="">Select Province</option>
                            ${options_list}
                        </select>
                    </div>
                </div>
            `;
        }
        else if (actual_field.data_type == 'textarea') {
            // Generate a field for the form based on this actual field.
            input_tag += `
                <div class="col-sm-12 event_type_related_fields">
                    <div class="form-group pt-3">
                        <label for="${actual_field.machine_name}">${actual_field.name}</label>
                        <textarea class="form-control" id="${actual_field.machine_name}" rows="4" name="${actual_field.machine_name}"></textarea>
                    </div>
                </div>
            `;
        }
        else {
            if (actual_field.machine_name == 'topic') {
                // Generate a field for the form based on this actual field.
                input_tag += `
                    <div class="col-sm-12 event_type_related_fields">
                        <div class="form-group pt-3">
                            <label for="${actual_field.machine_name}">${actual_field.name}</label>
                            <input type="${actual_field.data_type}" class="form-control form-control-lg ${actual_field.machine_name}"
                            name="${actual_field.machine_name}" id="${actual_field.machine_name}" placeholder="${actual_field.name}" required="required" value="" ${read_only}>
                        </div>
                    </div>
                `;
            }
            else {
                // Generate a field for the form based on this actual field.
                input_tag += `
                    <div class="col-sm-6 event_type_related_fields">
                        <div class="form-group pt-3">
                            <label for="${actual_field.machine_name}">${actual_field.name}</label>
                            <input type="${actual_field.data_type}" class="form-control form-control-lg ${actual_field.machine_name}"
                            name="${actual_field.machine_name}" id="${actual_field.machine_name}" placeholder="${actual_field.name}" required="required" value="" ${read_only}>
                        </div>
                    </div>
                `;
            }
           
        }
        
    });

    // Add the generated fields to the form.
    $('#event_type_select_box_container').after(input_tag);
});

$('.add_edit_report_form_submit_btn').on('click', function(e){
    let json_data = new Object;
    
    $('.event_type_related_fields input').each(function(){

        if ($(this).attr('type') == 'radio') {
            if ($(this).is(':checked')) {
                json_data[$(this).attr('name')] = $(this).val();
            }
        }
        else {
            json_data[$(this).attr('name')] = $(this).val();
        }
    });

    $('.event_type_related_fields textarea').each(function(){
        json_data[$(this).attr('name')] = $(this).val();
    });

    $('#json_data_input_field').val(JSON.stringify(json_data));
    $(this).parents('form').submit();
})

/**
 * Summing and adding up the totals for male
 * and female participants.
 */
$(document).on('change', '.number_of_male, .number_of_female, .male_beneficiaries, .female_eneficiaries', function(){
    set_value_to_zero_if_minus($(this));

    $('input.total').val(Number($('.number_of_female').val()) + Number($('.number_of_male').val()));
    $('input.total_eneficiaries').val(Number($('.female_eneficiaries').val()) + Number($('.male_beneficiaries').val()));
});

var testimonial_number = 2;
$(document).on('click', '#add_more_testimonial_btn', function(){
    $(this).parent().before(`
        <div class="col-sm-12">
            <fieldset class="border p-2 mb-3">
                <legend class="w-auto">Testimonail:</legend>
                <button type="button" class="btn btn-sm delete_testimonial_button float-right">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg>
                </button>
                <div class="form-group pt-3">
                    <label for="testimonial_number_1">Testimonial</label>
                    <textarea class="form-control" id="testimonial_number_1" rows="4" name="testimonial[${testimonial_number}][0]"></textarea>
                </div>
                <div class="form-group pt-3">
                    <label for="testimonial_number_${testimonial_number}_name">Name of Person</label>
                    <input type="text" class="form-control" id="testimonial_number_${testimonial_number}_name" name="testimonial[${testimonial_number}][1]">
                </div>
                <div class="col-sm-12">
                    <div class="border rounded p-3">
                        <label for="testimonial_number_${testimonial_number}_name">Image of the person (If any)</label>
                        <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="testimonial[${testimonial_number}][2]" id="testimonial_number_${testimonial_number}_name" placeholder="123">
                    </div>
                </div>
            </fieldset>
        </div>
    `);

    testimonial_number++;
});

$(document).on('click', '.delete_testimonial_button', function(){
    $(this).parent().parent().remove();
});