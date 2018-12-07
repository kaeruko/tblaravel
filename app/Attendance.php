<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

  protected $guarded = array('user_id','attendance_at');

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
          'date' => 'required',
      ];
  }

}
