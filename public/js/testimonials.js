$(document).ready(function(){
    $(document).on('click', '.filter_province', function(){
        
        let name = $(this).data('name');

        // Add the btn-success class for the clicked button.
        $(this).toggleClass('btn-success btn-outline-success');
        if (name != 'all_provinces') {
            $('.all_provinces').addClass('btn-outline-success').removeClass('btn-success');
        }
        if (name == 'all_provinces') {
            $('.each_province').removeClass('btn-success').addClass('btn-outline-success');
        }

        let filter_province_array = [];

    });
});