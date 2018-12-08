<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

  protected $fillable = array('user_id','attendance_at');

  protected $casts = [
      'user_id' => 'integer',
      'attendance_at' => 'date',
  ];


  public function getall(){
    $atts = Attendance::all();

    foreach ($atts as $att) {
        echo $att->attendance_at;
    }
  }


  public static function rules()
  {
      return [
          'user_id' => 'required|max:255',
          'attendance_at' => 'required',
      ];
  }

}
