document.getElementById("nav01").innerHTML =
"<nav class='navbar navbar-inverse navbar-fixed-top'>" +
		"<div class='container-fluid'>" +
			"<div class='navbar-header'>" +
				"<a class='navbar-brand' href='#'>BUMIPUTRA MANUFAKTUR TEKNOLOGI</a>" +
				"<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>" +
					"<span class='icon-bar'></span>" +
					"<span class='icon-bar'></span>" +
					"<span class='icon-bar'></span>" +
				"</button>" +
			"</div>" +
			"<div id='myNavbar' class='collapse navbar-collapse'>" +
				"<ul class='nav navbar-nav'>" +
					"<li class='dropdown'><a href='#'' class='dropdown-toggle' data-toggle='dropdown'>Data Master   <span class='caret'></span></a>" +
						"<ul class='dropdown-menu'>" +
							"<li><a href='list_level.php'>Data Level User</a></li>" +
							"<li><a href='list_user.php'>Data User</a></li>" +
						"</ul>" +
					"</li>" +
				"</ul>" +
			"</div>" +
		"</div>" +
	"</nav>";

	document.getElementById("footer").innerHTML =
	"<div class='footer'>" +
	"&copy; Copyright 2016 - AABC Software" +
	"</div>";