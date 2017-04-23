<?php

namespace Calendar;

use DateTimeInterface;
use DateTime;
use Calendar\CalendarInterface;


class Calendar implements CalendarInterface
{
	
	protected $datetime;


	/**
     * @param DateTimeInterface $datetime
     */
    public function __construct(DateTimeInterface $datetime)
    {
    	$this->datetime = $datetime;
    }

    /**
     * Get the day
     *
     * @return int
     */
    public function getDay()
    {
    	return (int) $this->datetime->format("j");
    }

    /**
     * Get the weekday (1-7, 1 = Monday)
     *
     * @return int
     */
    public function getWeekDay()
    {
		return (int) $this->datetime->format("N");
    }

    /**
     * Get the first weekday of this month (1-7, 1 = Monday)
     *
     * @return int
     */
    public function getFirstWeekDay()
    {
    	return (int) $this->getFirstDayOfThisMonth()
    					  ->format("N");
    }

    /**
     * Get the first week of this month (18th March => 9 because March starts on week 9)
     *
     * @return int
     */
    public function getFirstWeek()
    {
    	return (int) $this->getFirstDayOfThisMonth()
    					  ->format("W");
    }

    /**
     * Get the number of days in this month
     *
     * @return int
     */
    public function getNumberOfDaysInThisMonth()
    {
    	return (int) $this->datetime->format("t");
    }

    /**
     * Get the number of days in the previous month
     *
     * @return int
     */
    public function getNumberOfDaysInPreviousMonth()
    {
		return (int) $this->getFirstDayOfPreviousMonth()
    					  ->format("t");
    }

    /**
     * Get the calendar array
     *
     * @return array
     */
    public function getCalendar()
    {
		$previousWeek = (int) $this->getSameDayInPreviousWeek()->format('W');
		$firstDayofFirstweek = $this->getFirstDayOfThisMonth()->modify('monday this week');
		$lastDayofLastweek = $this->getLastDayofThisMonth()->modify('sunday this week');
	 	
		$calendar = [];
		while($firstDayofFirstweek <= $lastDayofLastweek) {
	        $week = (int) $firstDayofFirstweek->format('W');
	        $day = (int) $firstDayofFirstweek->format('d');
	        $calendar[$week][$day] = ( $week == $previousWeek ) ? true:false;
	        $firstDayofFirstweek = $firstDayofFirstweek->modify('+1 day');
    	}

    	return $calendar;
    }

    /**
     * Get the first day of the month from datetime
     *
     * @return DateTime
     */
    private function getFirstDayOfThisMonth()
    {
    	return $this->getClonedDateTime()
    				->modify('first day of this month');
    }

    /**
     * Get the last day of the month from datetime
     *
     * @return DateTime
     */
    private function getLastDayofThisMonth()
    {
    	return $this->getClonedDateTime()
    				->modify('last day of this month');
    }

    /**
     * Get the first day of last month from datetime
     *
     * @return DateTime
     */
    private function getFirstDayOfPreviousMonth()
    {
    	return $this->getClonedDateTime()
    				->modify('first day of last month');
    }

    /**
     * Get same day in previous week from datetime
     *
     * @return DateTime
     */
    private function getSameDayInPreviousWeek()
    {
    	return $this->getClonedDateTime()
    	            ->modify('-1 week');
    }

    /**
     * @return DateTime
     */
    private function getClonedDateTime()
    {
    	return (clone $this->datetime);
    }


}