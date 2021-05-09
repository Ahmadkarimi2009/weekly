// Array of elements of men and women totals.
let mw_total_elements = document.getElementsByClassName('mw_totals');

/**
 * Add event listener to all men
 * and women total input fields.
 */
for (i = 0; i < mw_total_elements.length; i++) {
    mw_total_elements[i].addEventListener('change', calculate_total);
}

/**
 * Calculate totals for men and women,
 * add the totals in the related input
 * field and calculate and add totals of
 * benificiaries in the related input field
 * as well.
 */
function calculate_total() {

    // Make sure input doesn't contain minus number.
    set_value_to_zero_if_minus(this);

    // total is 0 at first.
    let totals = 0;

    // Loop through all elements (men and women totals).
    for (i = 0; i < mw_total_elements.length; i++) {

        // Add to the overall totals.
        totals += Number(mw_total_elements[i].value);
    }

    // Add overall totals to the related input field.
    document.getElementById('total_number_of_men_women').value = totals;
    // Add total benificiaries to the related input field.
    document.getElementById('total_number_of_benificiaries').value = Number(totals) * 7;
}

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
