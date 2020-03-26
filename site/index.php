<?php 

	include "includes/mysql.php";
	include "includes/time.php";


?>
<html>
  <head>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Статистика</title>
  </head>
  <body>
  	<div class="cities">
  		<?php 
  			foreach (getCities() as $city) {
  				echo "<button>" . $city['name'] . "</button>";
  			}
  		?>
  	</div>
  	<div class="tb">
	    <table>
	    	<tbody>
	    		<tr>
	    			<td>Месяц</td>
	    			<td colspan="31">
	    				<?php 
		    				echo $months[date('n') - 1]; 
		    			?>
	    				
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>Дата</td>
	    			<?php 
	    				for ($i=1; $i < getDaysInMonth(); $i++) { 
	    					echo "<td>" . $i . "</td>";
	    				}
	    			?>
	    		</tr>	
	    		<?php 	

	    				$devices = getDevices();

	    				foreach ($devices as $device) {
	    					echo "<tr>";		
							echo "<td>Device id: " .  $device['device_id'] . "</td>";

	    					for ($i=1; $i < getDaysInMonth(); $i++) { 

	    						$city = 1;

								if(isset($_GET['city']))
								{
									$city = $_GET['city'];
								}

								$city = getCity($city);

			    				$info = getInfo($device['device_id'], $city, "2020-03-" . $i);

			    				if(empty($info))
			    				{
			    					echo "<td>00:00</td>";
			    					continue;
			    				}

				    			foreach($info as $key){

				    				$time = getTime($key['SUM(session_time)']); 
				    				echo "<td>" . $time . "</td>";
				    			}
				    		}

			    			echo "</tr>";  		
			    			
	    				}
	    		?>
	    	</tbody>
	    </table>
	</div>
  </body>
</html>