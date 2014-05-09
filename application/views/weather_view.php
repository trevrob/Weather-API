<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Weather Report</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("form").submit(function(){
			$.get($(this).attr('action')+"?callback=?", $(this).serialize(), function(dojo){
				var title= dojo.data.request[0].query;
				var date= dojo.data.weather[0].date;	
				var time= dojo.data.current_condition[0].observation_time;
				var temp = dojo.data.current_condition[0].temp_F;
				var desc = dojo.data.current_condition[0].weatherDesc[0].value;
				var pic = dojo.data.current_condition[0].weatherIconUrl[0].value;
				var min = dojo.data.weather[0].tempMinF;
				var max = dojo.data.weather[0].tempMaxF;
				console.log(dojo);
				$('#forecast').append("<div id='weather'><h2>" + title + "</h2>" + "<div id='today'>" + 
					"<label id='date'>" + date +"</label><label id='time'>" + time + "<br></label><label id='temp'>" +
					temp + " F"+"<br></label>"+"<label id='desc'>" + desc + "<br></label>"+
					"<label><img id='pic' src='" + pic + "'><br></label></div>"+"<div id='week'><h3>7-Day Forecast</h3><label id='min'> " + "<b>Low of : </b>"+ min + " F"+ 
					"<br></label>"+"<label id='max'> " + "<b>High of : </b>"+ max + " F"+"</label></div></div>");	
			}, 'json');
			return false;
			});
		});
	</script> 
</head>
<body>
<div id="container">
	<h1> TrevRob's Weather Forecast </h1>
	<form action='http://api.worldweatheronline.com/free/v1/weather.ashx' method='get'>
		<input type='text' name='q' id='where'>
		<input type='hidden' name='key' value='jtpc4myth9fwxjgwz9fh5fw5'>
		<input type='hidden' name='format' value='json'>
		<input type='hidden' name='num_of_days' value='1'>
		<input type='submit' value='Get Weather!' id='sub'>
	</form>
	<div id='forecast'>


	</div>


</div>
</body>
</html>