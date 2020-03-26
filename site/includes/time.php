<?php 
	function getTime($seconds)
	{
	    $minutes = floor($seconds / 60);
		$hours = floor($minutes / 60);
		$minutes = $minutes - ($hours * 60);

		return $hours . 'ч. ' . $minutes . 'м.';
	}

	function getDaysInMonth()
	{
		return cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
	}

	$months = [
		'Январь', 'Февраль', 'Март',
		'Апрель', 'Май', 'Июнь',
		'Июль', 'Август', 'Сентябрь',
		'Октябрь', 'Ноябрь', 'Декабрь'
	]; 
?>