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
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="user_id" value="{{ old('user_id') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="attendance_at" value="{{ old('attendance_at') }}">
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection