$(document).ready(function() {
    $('#reports_table').DataTable({
        initComplete: function () {
            this.api().columns([1,2,7,8,9]).every( function () {
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
    $('table tfoot th select').addClass('form-control');
});