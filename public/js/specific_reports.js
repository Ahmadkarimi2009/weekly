$(document).ready(function() {

    let total_number_of_male_female = 0;
    let total_number_of_session = 0;
    let searchable_fields = [1,2,3,4];
    let array_of_datatables_variable = [];
    

    initiate_or_redraw_datatables();
    function initiate_or_redraw_datatables() {
        array_of_datatables_variable = [];
        for (const key in event_types) {
            let total_columns_in_this_table = 5;
            let new_searchable_fields = searchable_fields.slice();
            if (Object.hasOwnProperty.call(event_types, key)) {
                const each_event = event_types[key];
    
                /**
                 * 
                 */
                let event_type_fields = each_event.fields;
                for (const key2 in event_type_fields) {
                    if (Object.hasOwnProperty.call(event_type_fields, key2)) {
                        const field_id = event_type_fields[key2];
    
                        for (const key3 in fields) {
                            if (Object.hasOwnProperty.call(fields, key3)) {
                                if (fields[key3].id == field_id && fields[key3].searchable == "true") {
                                    new_searchable_fields.push(total_columns_in_this_table);
                                }
                            }
                        }
    
                    }
    
                    total_columns_in_this_table++;
                }

                for (let index = 0; index < $('#specific_report_table_' + each_event.id + ' thead th').not('.d-none').length; index++) {

                    console.log('specific_report_table_' + each_event.id + ' is ' + $('#specific_report_table_' + each_event.id + ' thead th').not('.d-none').length);
                    $('#specific_report_table_' + each_event.id + ' tfoot tr').append('<th scope="col"></th>')
                }
    
                // Variable holding the index of the column by which the grouping is done. "province column".
                var groupColumn = 1;
                let reports_table = $('#specific_report_table_' + each_event.id).DataTable({
    
                    // This section is for adding filtering option for each column.
                    initComplete: function () {
                        this.api().columns(new_searchable_fields).every( function () {
                            var column = this;
                            var select = $('<select><option value="">Select</option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
            
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                });
            
                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            });
                        });
                    },
                    "paging": false,
                    "order": [[1, 'asc']],
                    "oLanguage": {
                        "sEmptyTable": "No entries are available for this activity type"
                    },
    
                    // Hiding the province column itself.
                    "columnDefs": [
                        { "visible": false, "targets": groupColumn }
                    ],
    
                    // This section is for grouping based on provinces.
                    "drawCallback": function ( settings ) {
                        var api = this.api();
                        var rows = api.rows( {page:'current'} ).nodes();
                        var last=null;
             
                        api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                            if ( last !== group ) {
                                $(rows).eq( i ).before(
                                    '<tr class="group"><td class="bg-light border border-light text-dark" colspan="' + Number(total_columns_in_this_table + 1) + '"><span class="grouping_title">'+group+'</span><span class="float-right statistics_for_this_province"></span></td></tr>'
                                );
             
                                last = group;
                            }
                        } );
                    }
                });

                array_of_datatables_variable.push(reports_table);
    
                $(document).on('draw.dt', '#specific_report_table_' + each_event.id, calculate_totals).on('draw.dt', function(){
                    calculate_totals_for_each_actity('specific_report_table_' + each_event.id);
                }).on('init.dt', calculate_totals_for_each_actity('specific_report_table_' + each_event.id));
    
                $('table tfoot th select').addClass('form-control');
                $('table').find('.dataTables_filter, .dataTables_info').addClass('do_not_print');
                // $(document).on('draw.dt', '#reports_table', add_statistics);
    
    
                $('.dt-buttons button').addClass('btn btn-outline-success').removeClass('dt-button buttons-columnVisibility');
    
                $('.dt-buttons .dt-button-collection button').addClass('btn btn-outline-success').removeClass('dt-button buttons-columnVisibility');
                
            }
        }
    }

    /**
     * Calculating the numbers after tables loads and reload.
     * 
     * This function is called when the tables are generated
     * and re-generated to calculate the totals.
     */
    function calculate_totals() {

        total_number_of_male_female = 0;
        // Empty the totals container div.
        $('#statistics_section').empty();

        // Define array of the total classes.
        let male_female_totals_classes = ['number_of_male', 'number_of_female', 'male_beneficiaries', 'female_eneficiaries'];
        let sessions_totals_classes = ['number_of_sessions', 'no_of_online_counseling_sessions_arranged_in_container', 'no_of_online_counseling_sessions', 'no_of_sessions_for_female_clients', 'no_of_sessions_for_male_clients'];

        // Loop through total classes.
        male_female_totals_classes.forEach(element => {
            total_number_of_male_female += check_total_tds_and_add_them_to_div(element, male_female_totals_classes);
        });

        // Add the current total to the totals section.
        $('#statistics_section').append(`           
            <div class="bg-dark text-light p-4 m-2 rounded statistics_blocks">
                <h3>Male & Female Total</h3>
                <h1 class="text-danger">${total_number_of_male_female}</h1>
            </div>
        `);

        // Loop through total classes.
        sessions_totals_classes.forEach(element => {
            total_number_of_session += check_total_tds_and_add_them_to_div(element, sessions_totals_classes);
        });

        // Add the current total to the totals section.
        $('#statistics_section').append(`           
            <div class="bg-dark text-light p-4 m-2 rounded statistics_blocks">
                <h3>Total of All Sessions</h3>
                <h1 class="text-danger">${total_number_of_session}</h1>
            </div>
            <br>
        `);
    }

    // Caculate the totals for the first time after tables load. 
    calculate_totals();

    function check_total_tds_and_add_them_to_div (element, totals_classes_array) {
        // Variable for holding the total number if needed to be returned.
        let total_of_totals = 0;
        // If tds with specified classes exist.
        if ($('td.' + element).length > 0) {

            // create a variable to hold the total for this total class.
            let this_total = 0;

            // Loop through all the tds with this total class.
            $('td.' + element).each(function(){
                if ($(this).text() != "") {

                    // Add the totals for this total class.
                    this_total += Number($(this).text()); 

                    // If this element's total to be added to the overall totals.
                    if (totals_classes_array.indexOf(element) != -1) {
                        total_of_totals += Number($(this).text());
                    }
                }
            });

            // Add the current total to the totals section.
            $('#statistics_section').append(`
                    
                <div class="bg-light p-4 m-2 rounded statistics_blocks">
                    <h3>${element}</h3>
                    <h1 class="text-danger">${this_total}</h1>
                </div>
            `);
        }

        return total_of_totals;
    }

    function calculate_totals_for_each_actity(table) {
        $('#' + table + ' tbody tr.group .grouping_title').each(function(){
            let province_name = $(this).text();
            if (province_name != '') {
                let total_male_in_province = 0;
                let total_female_in_province = 0;
                let total_both_in_province = 0;
                $('#' + table + ' tbody tr').find('.number_of_male.' + province_name).each(function(){
                    total_male_in_province += Number($(this).text());
                    total_both_in_province += Number($(this).text());
                });
    
                $('#' + table + ' tbody tr').find('.number_of_female.' + province_name).each(function(){
                    total_female_in_province += Number($(this).text());
                    total_both_in_province += Number($(this).text());
                });
    
                $(this).siblings('.statistics_for_this_province').text(`
                    Male: ${total_male_in_province} || Female: ${total_female_in_province} || Overall Total: ${total_both_in_province}
                `);
            }     
        });
    }

    function add_column_hiding_buttons_to_page() {
        $('#hiding_columns_div').empty();
        let columns_array = [];
        $('th.hidable_columns').each(function(){

            // Make sure the column button is added only once.
            if (columns_array.indexOf($(this).text()) == -1) {
                columns_array.push($(this).text());
                $('#hiding_columns_div').append(`
                    <button class="btn btn-outline-info column_filter_buttons" data-target-columns="${ $(this).data('target') }" data-status="shown">${ $(this).text() }</button>
                `);
            }

        });
    }

    add_column_hiding_buttons_to_page();

    /**
     * Event Handling for hiding the columns.
     */
    $(document).on('click', '.column_filter_buttons', function(){
        hide_or_display_selected_column($(this));
    });

    /**
     * This function receives the button that is clicked
     * for hiding the necessary column. Based on the selected button,
     * the required column gets hidden.
     * @param {*} button 
     */
    function hide_or_display_selected_column(button) {

        let status = $(button).data('status');
        let target_columns = $(button).data('target-columns');


        if (status == 'shown') {
            $(button).addClass('btn-primary text-dark').removeClass('btn-outline-primary').data('status', 'hidden');
            $('.' + target_columns).addClass('d-none');
            searchable_fields.pop();
        }
        else {
            $(button).removeClass('btn-primary text-dark').addClass('btn-outline-primary').data('status', 'shown');
            $('.' + target_columns).removeClass('d-none');
            let last_index = searchable_fields.pop();

            if (last_index != undefined) {
                searchable_fields.push(last_index);
                searchable_fields.push(Number(last_index) + 1);
            }
            else {
                searchable_fields.push(1);
            }

        }

        console.log(searchable_fields);


        array_of_datatables_variable.forEach(element => {
            // console.log(element);
            element.destroy();
        });
        $('table tfoot tr').empty();

        initiate_or_redraw_datatables();
    }
});