<?php 
public static class DateManager(){

	/**
	*Get Bussines Days between 2 dates , considering hollidays
	*@param unixdate $initialDate UnixDate(sample = strotime("10/10/2011"))
	*@param unixdate $endDate UnixDate(sample = strotime("10/10/2011"))
	*@param array $holidays String array(sample = array("4 July 2011"))
	*Usage Sample
	*$start = strtotime("1 January 2010");
	*$end = strtotime("13 December 2010");
	* ###Add as many holidays as desired.###
	*$holidays = array();
	*$holidays[] = "4 July 2010";            // Falls on a Sunday; doesn't affect count
	*$holidays[] = "6 September 2010";        // Falls on a Monday; reduces count by one
	*echo networkdays($start, $end, $holidays);    // Returns 246
	*/
	public static function GetBusinessDays($initialDate , $endDate,holidays = array()){
		  // If the start and end dates are given in the wrong order, flip them.    
    if ($initialDate > $endDate)
        return networkdays($endDate, $initialDate, $holidays);

    // Find the ISO-8601 day of the week for the two dates.
    $initialDated = date("N", $initialDate);
    $endDated = date("N", $endDate);

    // Find the number of weeks between the dates.
    $w = floor(($endDate - $initialDate)/(86400*7));    # Divide the difference in the two times by seven days to get the number of weeks.
    if ($endDated >= $initialDated) { $w--; }        # If the end date falls on the same day of the week or a later day of the week than the start date, subtract a week.

    // Calculate net working days.
    $nwd = max(6 - $initialDated, 0);    # If the start day is Saturday or Sunday, add zero, otherewise add six minus the weekday number.
    $nwd += min($endDated, 5);    # If the end day is Saturday or Sunday, add five, otherwise add the weekday number.
    $nwd += $w * 5;        # Add five days for each week in between.

    // Iterate through the array of holidays. For each holiday between the start and end dates that isn't a Saturday or a Sunday, remove one day.
    foreach ($holidays as $h) {
        $h = strtotime($h);
        if ($h > $initialDate && $h < $endDate && date("N", $h) < 6)
            $nwd--;
    }

    return $nwd;
	}

	public static function IsInRange($actualDate ='' , $minDate , $maxDate)
	{
		if( $minDate >= $actualDate && $actualDate <= $maxDate )
			return true;
		return false;
	}

	public function AddDays($actualDate='' , $days=0)
	{

	}

	public function AddMonths($actualDate='' , $months=0)
	{

	}
	public function AddYears($actualDate='' , $years=0)
	{

	}

}

?>