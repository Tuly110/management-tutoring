@extends('layouts.app')
@section('content')
  <main id="main" class="main">
    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>Data Tables</h1>    
      </div><!-- End Page Title --> 
    </div>
    
    @include('_message')
    <section class="section">
      <div >
        <div > 
            <div >
                <div class="card-body">
                    <h5 class="card-title">Teacher Search</h5>
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col" ">#</th>
                            <th scope="col" ">Class name</th>
                            <th scope="col" ">Subject name</th>
                            <th scope="col" ">Subject type</th>
                            <th scope="col" ">My class timetable</th>
                            <th scope="col"">Create at</th>
                            <th scope="col"">Create by</th>
                            <th scope="col"">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value )
                            <tr>    
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $value->class_id_name }}</td>
                                <td>{{ $value->subject_name }}</td>
                                <td>
                                  @if ($value->subject_type == 0)
                                    Theory
                                  @else
                                    Practical
                                  @endif
                                </td>
                                <td>
                                  @php
                                    $ClassSubject=$value->getMyTimeTable($value->class_id, $value->subject_id);
                                  @endphp
                                  @if (!empty($ClassSubject))
                                    {{ date('h:i A', strtotime($ClassSubject->start_time)) }} to {{  date('h:i A', strtotime($ClassSubject->end_time)) }}
                                  @endif
                                </td>
                                <td>{{ $value->created_at }}</td>    
                                <td>{{ $value->created_by_name }}</td>
                                <td>
                                  <a href="{{ url('teacher/class_and_subject/class_timetable_teacher/'.$value->class_id.'/'.$value->subject_id) }}" class="btn btn-primary">
                                    My class timetable</a>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
              </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')