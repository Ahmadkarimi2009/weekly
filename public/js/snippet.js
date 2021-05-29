$(document).ready(function() {
    
    $('#provinces_table').DataTable({
        initComplete: function () {
            this.api().columns([1]).every( function () {
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
        }
    });
    $('#topics_table').DataTable({
        initComplete: function () {
            this.api().columns([1,2]).every( function () {
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
        }
    });


    /**
     * 
     */
    let event_type_fields = event_type.fields;
    let searchable_fields = [1,2,3,4];
    let index = 5;
    for (const key in event_type_fields) {
        if (Object.hasOwnProperty.call(event_type_fields, key)) {
            const field_id = event_type_fields[key];

            for (const key2 in fields) {
                if (Object.hasOwnProperty.call(fields, key2)) {
                    if (fields[key2].id == field_id && fields[key2].searchable == "true") {
                        searchable_fields.push(index);
                    }
                }
            }

        }

        index++;
    }

    for (let index = 0; index < $('table thead th').length; index++) {
        $('table tfoot tr').append('<th scope="col"></th>')
    }

    $('#reports_table').DataTable({
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
        }
    });

    $('table tfoot th select').addClass('form-control');

});