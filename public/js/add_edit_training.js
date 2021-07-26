$(document).ready(function(){
    $('.staff_list_card').on('click', function(){
        $(this).toggleClass('border border-success');
        if ($(this).data('selected') == 'true') {
            $(this).data('selected', 'false');
        }
        else {
            $(this).data('selected', 'true');
        }

        get_ids_of_selected_staff_members();
    });

});

function get_ids_of_selected_staff_members() {
    let ids = [];
    $('.staff_list_card').each(function(){
        if ($(this).data('selected') == 'true') {
            ids.push($(this).data('staff_id'));
        }
    });

    if (ids.length > 0) {
        $('#input_for_staff_ids').val(JSON.stringify(ids));
    }
    else {
        $('#input_for_staff_ids').val();
    }
}