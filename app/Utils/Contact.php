<?php

namespace App\Utils;

use Carbon\Carbon;

class Contact
{
    // public $postedDate;
    public function __construct(public $postedDate)
    {
        // $this->postedDate = $postedDate;
    }

    public static function getDate($postedDate): string
    {
        $getDateInMinutes = (int) Carbon::parse($postedDate)->diffInMinutes(Carbon::now());
        $getDateInDays = (int) Carbon::parse($postedDate)->diffInDays(Carbon::now());
        $getTomorrowPostedDate = Carbon::parse($postedDate)->addDay()->format('d/m/Y');
        $getNow = now()->format('d/m/Y');

        if ($getDateInMinutes < 1) {
            return "A l'instant";
        } else {

            if ($getTomorrowPostedDate == $getNow) {
                return "Hier";
            } elseif ($getDateInDays === 0) {
                return Carbon::parse($postedDate)->format("H:i");
            } else if ($getDateInDays === 1) {
                return "Hier";
            } else if ($getDateInDays >= 2 && $getDateInDays <=4) {
                return Carbon::parse($postedDate)->locale("fr")->isoFormat("dddd");
            }
            return Carbon::parse($postedDate)->format("d/m/Y");
        }
    }

    public static function viewedStateFormat($state): string
    {
        if ($state === 1)
            return "lu";

        return "non lu";
    }
}
