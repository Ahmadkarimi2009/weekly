$(document).ready(function() {

    for (const key in event_types) {
        if (Object.hasOwnProperty.call(event_types, key)) {
            const each_event = event_types[key];

            /**
             * 
             */
            let event_type_fields = each_event.fields;
            let searchable_fields = [1,2,3,4];
            let index = 5;
            for (const key2 in event_type_fields) {
                if (Object.hasOwnProperty.call(event_type_fields, key2)) {
                    const field_id = event_type_fields[key2];

                    for (const key3 in fields) {
                        if (Object.hasOwnProperty.call(fields, key3)) {
                            if (fields[key3].id == field_id && fields[key3].searchable == "true") {
                                searchable_fields.push(index);
                            }
                        }
                    }

                }

                index++;
            }

            console.log(searchable_fields);

            for (let index = 0; index < $('#specific_report_table_' + each_event.id + ' thead th').length; index++) {
                $('#specific_report_table_' + each_event.id + ' tfoot tr').append('<th scope="col"></th>')
            }

            let reports_table = $('#specific_report_table_' + each_event.id).DataTable({
                initComplete: function () {
                    this.api().columns(searchable_fields).every( function () {
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
            });

            $('table tfoot th select').addClass('form-control');
            // $(document).on('draw.dt', '#reports_table', add_statistics);


            $('.dt-buttons button').addClass('btn btn-outline-success').removeClass('dt-button buttons-columnVisibility');

            $('.dt-buttons .dt-button-collection button').addClass('btn btn-outline-success').removeClass('dt-button buttons-columnVisibility');
            
        }
    }

});