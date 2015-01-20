
	window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '943743042306339', // Set YOUR APP ID
	      status     : true, // check login status
	      cookie     : true, // enable cookies to allow the server to access the session
	      xfbml      : true  // parse XFBML
	    });
	 
	    };

	    
    	function loginFb() {
		    FB.login(function(response) {
		        if (response.authResponse) {
		            // connected
		        	testAPI();
		        } else {
		            // cancelled
		            alert('You not login');
		        }
		    }, { scope: 'email' });
		}

	  	function testAPI() {

		    console.log('Welcome!  Fetching your information.... ');
		    FB.api('/me', function(response) {

		    	var email 		= response.id+'@thuna.vn';
		      	var first_name 	= response.first_name;
		      	var last_name 	= response.last_name;

		      	// Use ajax link to get data
			  	$.ajax({
			  		type: "POST",
			  		url: "{{URL::to('login-facebook')}}",
			  		data:{
			  			email:email,
			  			first_name:first_name,
			  			last_name:last_name
			  		},
			  		success:function(data){
			  			window.location.href = "http://thuna.vn/"+data+"";
		        	}
			 	});

		    });
		}

		(function(d){
	     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement('script'); js.id = id; js.async = true;
	     js.src = "//connect.facebook.net/en_US/all.js";
	     ref.parentNode.insertBefore(js, ref);
	   }(document));
