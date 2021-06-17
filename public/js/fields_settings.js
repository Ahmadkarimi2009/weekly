$(document).ready(function(){
    $('#field_name').on('keyup', function(){
        let val = $(this).val();

        let converted_text = convert_to_snake_case(val);
   
        $('#field_machine_name').val(converted_text);
 
    });

    function convert_to_snake_case(string) {
        return string.replace(/\d+/g, ' ')
            .split(/ |\B(?=[A-Z])/)
            .map((word) => word.toLowerCase())
            .join('_');
    }
});