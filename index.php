<html>

    <head>
        <title>Epson Print Demo</title>
        <script src="jquery-3.2.1.min.js"></script>
        <script>

$(document).ready(function() {
    $('#btnPrint').click(function() {
        $.ajax({
            url: '/print.php',
            type: 'get',
            success: function(response) {
		console.log('SUCCESS');
                console.log(response);
		    var uri = 'bit.print://balitekno.com/sinarjaya' + 
			'?h=' + response.h + 
			'&c=' + response.c + 
			'&f=' + response.f + 
			'&q=' + response.q;
		    window.location = uri;
		    /*
		$.ajax({
		    url: 'http://localhost:8080',
		    crossOrigin: true,
		    type: 'get',
		    data: {
			    h: response.h,
			    c: response.c,
			    f: response.f,
			    q: response.q
		    },
		    success: function(response) {
			    alert('SUCCESS');
			    console.log(response);
		    },
	   	    error: function(xhr) {
			    console.log(xhr);
			    if (xhr && xhr.status == 200) {
				    alert('SUCCESS');
			    } else {
				    alert('RESPONSE_ERROR_CODE: ' + xhr.status);
			    }
		    }
		});
		*/
            },
            error: function(xhr) {
                alert('error');
                console.log(xhr);
            }
        });

    });
});

        </script>
    </head>

    <body>
        <input type="button" id="btnPrint" value="PRINT" />
    </body>

</html>
