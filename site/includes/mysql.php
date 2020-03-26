<?php
	
	function getDevices()
	{
		$link = mysqli_connect('localhost', 'root', '', 'device_info');
		if(!$link)
			die("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		$sql = "SELECT device_id FROM stats GROUP BY device_id";
		$result = mysqli_query($link, $sql);	
		$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

		$info = array();

		return $result;
	}

    function getInfo($id, $city, $date)
	{
		$link = mysqli_connect('localhost', 'root', '', 'device_info');
		if(!$link)
			die("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		$sql = "SELECT device_id, city, SUM(session_time) FROM stats WHERE city = '". $city . "' AND date = '" . $date . "' AND device_id = '" . $id ."' GROUP BY device_id";
		$result = mysqli_query($link, $sql);	
		$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		return $result;
	}

	function getCity($id)
	{
		$link = mysqli_connect('localhost', 'root', '', 'device_info');
		if(!$link)
			die("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		$sql = 'SELECT name FROM cities WHERE id = ' . $id;
		$result = mysqli_query($link, $sql);	
		$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $result[0]['name'];
	}

	function getCities()
	{
		$link = mysqli_connect('localhost', 'root', '', 'device_info');
		if(!$link)
			die("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		$sql = 'SELECT name FROM cities';
		$result = mysqli_query($link, $sql);	
		$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $result;
	} 
?>
