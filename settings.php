<!DOCTYPE html>
<html>

	<head>
                <meta charset="utf-8">
                <title>Set airport</title>
                <link rel="stylesheet" href="css.css">
                <script src="https://kit.fontawesome.com/dd348bbd0a.js" crossorigin="anonymous"></script>
                <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
	</head>

<body style="text-align:center;">

	<h1>Choose an airport</h1>

	<?php
		if(array_key_exists('icao', $_POST)) {
                        $icao = htmlspecialchars($_POST['icao']);
			echo "<font color=white>Airport to find : ".$icao."<br/>";
			$airport_file = fopen("aptlist", "r") or die("Unable to open airport file!");
			$found = false;
			while ((!feof($airport_file)) and (!$found)) {
				$line = fgets($airport_file);
				$aux = explode("\t", $line);
				$found = ($aux[0] == $icao);
			}
			fclose($airport_file);
			if (!$found) echo "Unknown airport !";
			else {
				echo "Airport found !";
				unlink('settings');
				$settings = fopen("settings", "w");
				fwrite($settings, $line);
				fclose($settings);
				header("Location: base.php");
			}
		}
	?>

	<form method="post">
		<select id="airport" onChange="update()">

			<option value="WMKK">Kuala Lumpur International Airport</option>
			<option value="WMKP">Penang International Airport</option>
			<option value="WSSS">Singapore Changi Airport</option>
			<option value="YBBN">Brisbane International Airport</option>
			<option value="YPPH">Perth International Airport</option>
			<option value="VHHH">Hong Kong International Airport</option>
			<option value="VMMC">Macau International Airport</option>
			<option value="RJTT">Tokyo Haneda Airport</option>
			<option value="RKSI">Seoul Incheon International Airport</option>
			<option value="KLAX">Los Angeles International Airport</option>
			<option value="KJFK">New York JFK</option> 
			<option value="EGLL">London Heathrow Airport</option>
			<option value="EGGP">Liverpool John Lennon Airport</option>

                </select>
                <input type="hidden" name="icao" id="value">
		<button> Set airport </button> <input type="button" onclick="location.href='base.php';" value=" Cancel " />
	</form>

        <script type="text/javascript">
		function update() {
			var select = document.getElementById('airport');
			var option = select.options[select.selectedIndex];
                        document.getElementById('value').value = option.value;
                }
                update();
        </script>

</body>

</html>
