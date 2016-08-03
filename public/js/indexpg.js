/*
* JavaScritp (Jquery)
* functions / calls for index view page
* prime numbers project
* Purdy
* August 2016
*/

/* resets number walk form */
$('#restartprime').on('click', function() {
    $('#curval').val('2');
    $('#primenum').html('');
    $('#primenum').html('2');
});

/* makes ajax call to get next prime number in walk through */
$('#nextprime').on('click', function() {
    $.ajax({
        type:"POST",
        url:"index/ajaxcount",
        data:{primenum:$('#curval').val()},
        success:function(results)
        {
            $('#primenum').html('');
            $('#primenum').html(results);
            $('#curval').val(results);
        },
        error:function()
        {
            console.log('uh oh');
        }
    });
});

