$(document).ready(function(){
    $(document).on('click', '.add_more_file_inputs', function(){
        
        $(this).parents('.parent_div').append(`
            <div class="d-flex align-items-stretch mt-3 removeable_start_of_input_section files_group">
                <div class="border border-warning rounded p-3 flex-grow-1 mr-2">
                    <label for="">Files / Images / Videos</label>
                    <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="group_inputs[${number_of_file_inputs}][files][]" id="" multiple>
                    <div class="form-group">
                        <label for="">Type of File(s)</label>
                        <select name="group_inputs[${number_of_file_inputs}][parent_category]" id="" class="form-control form-control-lg">
                            ${options_for_parent_cats}
                        </select>

                        <div class="form-group mt-4">
                            <label for="">Group of this files</label>
                            <select name="group_inputs[${number_of_file_inputs}][child_category]" id="" class="form-control form-control-lg">
                                ${options_for_child_cats}
                            </select>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-warning remove_section_section">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
                    </svg>
                </button>
            </div>
        `);

        number_of_file_inputs++;
    });

    $(document).on('click', '.remove_section_section', function(){
        $(this).parents('.removeable_start_of_input_section').remove();
    });
});
let number_of_file_inputs = 2;
let options_for_parent_cats = '';
let options_for_child_cats = '';
parent_categories.map(element => options_for_parent_cats += `<option value="${element['id']}">${element['name']}</option>`);
child_categories.map(element => options_for_child_cats += `<option value="${element['id']}">${element['name']}</option>`);