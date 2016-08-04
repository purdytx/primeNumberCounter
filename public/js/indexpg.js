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

/* resets fetch form */
$('#restartfetch').on('click', function() {
    $('#fetchnum').html('');
    $('#pstart').val('');
    $('#pend').val('');
});

/* makes a GET call to api to get the range for fetching */
$('#fetchprime').on('click', function() {
     $.ajax({
        type:"GET",
        url:"http://api.consumeitall.com/api/prime/"+$('#pstart').val()+"/"+$('#pend').val(),

        success:function(results)
        {
	    var res = JSON.parse(results);
	    if (res.status == 200) {
  	      var str = '<p>';
	      var i = 0;    
	      for (var key in res.data) {
		if (i != 0) {
		    str += ', ';
		}
		str += res.data[key];
		i = 1;
	      }
	      str += '</p>';
	      $('#fetchnum').html('');
	      $('#fetchnum').html(str);
	    } else {
	      $('#fetchnum').html('');
              $('#fetchnum').html(res.data);
	    }
        },
        error:function()
        {
	    $('#fetchnum').html('');
            $('#fetchnum').html('An error occured. Please check your range. 2 - 1000 is recommended');
        }
    });
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

