<?php

namespace App\Http\Controllers\Admin;

use App\Shift;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShiftPost;



use Calendar;
use App\Event;

class AttController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $a = new Shift();
        $a->getall();
        print("huwahuwa");
        return view('admin.att.index');
    }


    public function add()
    {
      $data = [];

      $k = 0;

      $week[0] = "月";
      $week[1] = "火";
      $week[2] = "水";
      $week[3] = "木";
      $week[4] = "金";
      $week[5] = "土";
      $week[6] = "日";

      for ($i=0 + 3; $i < 31+3; $i++) {
        echo $week[$i % 7];
      }


      //従業員一同取得
      $users = new User();
      $all_users = $users->getallUsers();
      $employes = [];
      foreach ($all_users as $key => $u) {
        $employes[$u->id] = $u;
      }


      $shift = new Shift;
      $today = getdate();




      $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                  [
                      'color' => '#f05050',
                      'url' => 'pass here url and any route',
                  ]
                );
            }
        }

        $data["att"] = $shift;
        $data["employes"] = $employes;
        $data["dates"] = $shift->getCalendarDates($today["year"], $today["mon"]);
        $data["currentMonth"] = $today["month"];

        $data["calendar"] = Calendar::addEvents($events);


      return view('admin.att.create', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ShiftPost $request)
    {
        // $this->validate($request, Attendance::$rules);
        $validated = $request->validated();

        $shift = new Shift;
        // $shift->user_id = $request->input("user_id");
        // $shift->attendance_at = date("Y-m-d H:i:s");

        $form = $request->all();
        $shift->fill($form);
        $shift->save();
        logger($shift);

        // データベースに保存する
        // return redirect('admin/att');

    }

    public function bstest(Request $request)
    {
        return view('admin.att.bstest');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
