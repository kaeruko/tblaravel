<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{

  protected $fillable = array('user_id','shift_at');

  protected $casts = [
      'user_id' => 'integer',
      'shift_at' => 'date',
  ];


  public function getall(){
    $atts = Shift::all();

    foreach ($atts as $att) {
        echo $att->shift_at;
    }
  }


  public function getCalendarDates($year, $month)
  {
    $year = 2018;
    $month = 11;
      $dateStr = sprintf('%04d-%02d-01', $year, $month);
      $date = new Carbon($dateStr);
      // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
      $date->subDay($date->dayOfWeek);
      // 同上。右下の隙間のための計算。
      $count = 37 + $date->dayOfWeek;
      $count = ceil($count / 7) * 7;
      $dates = [];

      for ($i = 0; $i < $count; $i++, $date->addDay()) {

          $dates[] = $date->copy();
      }
      return $dates;
  }


  public static function rules()
  {
      return [
          'user_id' => 'required|max:255',
          'shift_at' => 'required',
      ];
  }

}

