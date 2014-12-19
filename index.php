<!doctype html>
<html lang="en-US">
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="Content-Type" content="text/html">
  	<title>Mov~E Collection</title>
  	<meta name="author" content="Jake Rocheleau">
  	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="jquery.fastLiveFilter.js"></script>
	<script type="text/javascript" charset="utf-8" src="data1.js"></script>
	<script type="text/javascript" charset="utf-8">
//<![CDATA[

	function addCommas(num) {
		num = String(num);
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(num)) {
			num = num.replace(rgx, '$1' + ',' + '$2');
		}
		return num;
	}
	
	$(function() {
		// Copy the data into the display (reusing the dataset from the comparison page
		// here... probably should do something less intense?)
		var lists = $('#list_to_filter');

		

		for (i in data)
		{
			movieTitle = data[i];
			lists.append('<li><a href="http://www.imdb.com/title/' + i + '/">' + movieTitle + '</a></li>');
		}

	
		
		// Activate fastLiveFilter w/ callback
		var numDisplayed = $(".num_displayed");
		$("#filter_input").fastLiveFilter("#list_to_filter", {
			callback: function(total) { numDisplayed.html(addCommas(total)); },
		});
	});
	
//]]>
</script>


</head>

<body>




<input id="filter_input" placeholder="Type to filter" />
	<p>Showing <span class="num_displayed"></span> movies:</p>


<ul id="list_to_filter"></ul>




</body>

</html>
