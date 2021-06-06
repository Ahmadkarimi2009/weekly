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

    let reports_table = $('#reports_table').DataTable({
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
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
    });

    $('table tfoot th select').addClass('form-control');
    $(document).on('draw.dt', '#reports_table', add_statistics);
    function add_statistics() {
        let array_of_totals_columns = ['Number of Male', 'Number of Female', 'Total', 'Number of Sessions', 'Male Beneficiaries', 'Female Beneficiaries', 'Total Beneficiaries'];
        $('#statistics_section').empty();

        $('table thead tr th').each(function(index){
            if($.inArray($(this).text(), array_of_totals_columns) !== -1) {
                if (reports_table != undefined) {
                    let column_title = $(this).text();
                    let totals_each_row = reports_table.column(index, {search: 'applied'} ).data().toArray();
    
                    let overall_total = 0;
                    for (var i = 0; i < totals_each_row.length; i++) {
                        overall_total += totals_each_row[i] << 0;
                    }
    
                    $('#statistics_section').append(`
                        
                        <div class="bg-light p-4 m-2 rounded statistics_blocks">
                            <h3>${column_title}</h3>
                            <h1 class="text-danger">${overall_total}</h1>
                        </div>
                    `);
                }
                
            }
        })
    }

    $('.dt-buttons button').addClass('btn btn-outline-success').removeClass('dt-button buttons-columnVisibility');

    // $('.dt-buttons .dt-button-collection button').addClass('btn btn-outline-success').removeClass('dt-button buttons-columnVisibility');

});