@extends('layouts.admin')
@section('title', 'シフトの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>シフト新規作成</h2>
                {{\Form::model($att, array('action' => 'Admin\AttController@create'))}}
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">user_id</label>


                    @if (count($employes) > 0)
                        <ul>
                            @foreach($employes as $e)
                                <li>{{ $e->name }}</li>
                            @endforeach
                        </ul>
                    @endif


                        <div class="col-md-10">
                            <input type="text" class="form-control" name="user_id" value="{{ old('user_id') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">shift_at</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="shift_at" value="{{ old('shift_at') }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">

@php $week = ["月","火","水","木","金","土","日"]; $d = 1;@endphp
<table class="table table-bordered">
      @for ($i=0 + 3; $i < 31+3; $i++)
    <tr>
      <td>
        {{$d}}
      </td>
      <td>
        {{$week[$i % 7]}}
      </td>
    </tr>
      @php $d ++; @endphp
      @endfor
</table>

{{$dates[0]->year}}

@foreach ($dates as $date)
{{ $date->day }}
{{ $date->year }}

@endforeach


<table class="table table-bordered">
  <thead>
    <tr>
      @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
      <th>{{ $dayOfWeek }}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($dates as $date)
    @if ($date->dayOfWeek == 0)
    <tr>
    @endif
      <td
        @if ($date->month != $currentMonth)
        class="bg-secondary"
        @endif
      >
        {{ $date->day }}
      </td>
    @if ($date->dayOfWeek == 6)
    </tr>
    @endif
    @endforeach
  </tbody>
</table>


                </form>
            </div>
        </div>
    </div>
@endsection