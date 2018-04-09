    <?php 

    	$days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    	$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		$currentYear = date('Y');
		$currentMonth = date('n');
		$numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
		$getStartDayOfMonth = gregoriantojd($currentMonth, 1, $currentYear);
		$getEndDayOfMonth = gregoriantojd($currentMonth, $numberOfDaysInMonth, $currentYear);
		$startDay = jddayofweek($getStartDayOfMonth, 1);
		$endDay = jddayofweek($getEndDayOfMonth, 1);
		$arraySearch = array_search($startDay, $days);
		$arraySearchEnd = array_search($endDay, $days);


		

		$anomalyDays = array();

		if($arraySearch > 0 && $arraySearchEnd == 6){
			$prevMonth = $currentMonth - 1;
			$numberOfDaysInPrevMonth = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $currentYear);
			$prevDays = $numberOfDaysInPrevMonth - $arraySearch;

				for($x = $prevDays+1; $x <= $numberOfDaysInPrevMonth; $x++){
					$anomalyDays[] = $prevMonth.'-'.$x;
				}

				for($x = 1; $x <= $numberOfDaysInMonth; $x++){
					$anomalyDays[] = $currentMonth.'-'.$x;
				}
		}else if($arraySearchEnd < 6 && $arraySearch == 0){
				for($x = 1; $x <= $numberOfDaysInMonth; $x++){
					$anomalyDays[] = $currentMonth.'-'.$x;
				}

				for($x = 1; $x < (count($days) - $arraySearchEnd); $x++){
					$anomalyDays[] = (count($days) - $arraySearchEnd).'-'.$x;
				}
		}else if($arraySearch > 0 && $arraySearchEnd < 6){
				$prevMonth = $currentMonth - 1;
			$numberOfDaysInPrevMonth = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $currentYear);
			$prevDays = $numberOfDaysInPrevMonth - $arraySearch;

				for($x = $prevDays+1; $x <= $numberOfDaysInPrevMonth; $x++){
					$anomalyDays[] = $prevMonth.'-'.$x;
				}

				for($x = 1; $x <= $numberOfDaysInMonth; $x++){
					$anomalyDays[] = $currentMonth.'-'.$x;
				}
				
				for($x = 1; $x < (count($days) - $arraySearchEnd); $x++){
					$anomalyDays[] = ($currentMonth + 1).'-'.$x;
				}

		}
		$countArrays = 0;
		$weekList = array();

		while($countArrays < count($anomalyDays)){
			$weekDays = array();

			for($x=0; $x<7; $x++){
				if($countArrays < count($anomalyDays)){
					$weekDays[] = $anomalyDays[$countArrays++];
				}
			}
			$weekList[] = $weekDays;
		}

		echo array_search('2', $weekList);

    ?>