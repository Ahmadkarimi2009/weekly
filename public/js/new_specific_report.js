$(document).ready(function(){

    // Array holding the totals of all for male, female and both.
    let all_totals = {
        'number_of_male' : 0,
        'number_of_female' : 0,
        'total' : 0
    };

    // Loop through all the tables and
    // calculate their totals and add them
    // at the bottom of that table. Also, add
    // table's totals to the totals of all.
    $('table').each(function(){
        let totals_fields_array = ['number_of_sessions', 'number_of_male', 'number_of_female', 'total'];

        totals_fields_array.forEach(element => {
            let totalss = 0;
            $(this).find('tbody td.' + element).each(function(){
                totalss += Number($(this).text());

                // This will skip number of sessions being added to the totals and getting displayed
                // on the top, becuase sessions are different for each activity and we can't calculate
                // them as one like total of male and female.
                if (typeof all_totals[element] != 'undefined') {

                    // Add this total to the related total of all.
                    all_totals[element] += Number($(this).text());
                }
            });

            $(this).find('tfoot th span.' + element).text(totalss);
        });
    }).promise().done(update_the_statistics_section());

    

    /**
     * Loop through the totals of all and add them
     * to the related element in the page.
     */
    function update_the_statistics_section() {
        $('#statistics_section').empty();

        for (const key in all_totals) {
            if (Object.hasOwnProperty.call(all_totals, key)) {
                const element = all_totals[key];
                $('#statistics_section').append(`           
                    <div class="bg-dark text-light p-4 m-2 rounded statistics_blocks">
                        <h3>${key}</h3>
                        <h1 class="text-danger">${element}</h1>
                    </div>
                `);
            }
        }
    }
});