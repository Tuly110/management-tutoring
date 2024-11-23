@extends('layouts.app');
@section('content')
  <main id="main" class="main">

    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>Data Tables</h1>    
      </div><!-- End Page Title -->
    </div>
    
    @include('_message')
    <section class="section">
      <div class="row">
     
        <div class="col-lg-12"> 
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Class Timetable</h5>
                    <nav class="navbar navbar-light bg-light ">
                        <div class="">
                            <form class="d-flex ">
                              <div class="col-12">
                                <label for="inputNanme4" class="form-label p-2">Class Name</label>
                                <select class="form-control getClass_assign" name="class_id">
                                  <option value="0">Select Class</option>
                                  @foreach ($getClass_assign as $class )
                                      <option {{ Request::get('class_id')== $class->id ? 'selected' :'' }} 
                                        value="{{ $class->id }}">{{ $class->name }}</option>
                                  @endforeach    
                                </select>
                              </div>
                              <div class="col-12">
                                <label for="inputNanme4" class="form-label p-2">Subject Name</label>
                                <select class="form-control getSubject" name="subject_id">
                                  <option value="0">Select Subject</option>
                                  @if (!empty($getSubject))
                                    @foreach ($getSubject as $subject )
                                    <option {{ Request::get('subject_id')== $subject->id ? 'selected' :'' }} 
                                      value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
                                    @endforeach
                                  @endif
                                </select>   
                              </div>
                              <div>
                                <button class="btn btn-success" type="submit">Search</button>
                              </div>
                              <div>
                                <a href="{{ url('admin/class_timetable/list/') }}" class="btn btn-primary" style="margin-left: 30px">Reset</a>
                              </div>
                            </form>
                        </div>
                        @if (!empty(Request::get('class_id')) && !empty(Request::get('subject_id'))) 
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-body">
                              @include('_message')
                              <form action="{{ url('admin/class_timetable/add') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="subject_id" value="{{ Request::get('subject_id') }}">
                                <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                                <table class="table datatable">
                                  <thead>
                                    <tr>
                                      <th>Week</th>
                                      <th>Start time</th>
                                      <th>End time</th>
                                      <th>Room number</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php
                                      $i=1;
                                    @endphp
                                    @foreach ($week as $value)
                                        <tr>
                                          <th>
                                            <input type="hidden" name="timetable[{{$i}}][week_id]" value="{{ $value['week_id'] }}">
                                            {{ $value['week_name'] }}
                                          </th>
                                          <td>
                                            <input type="time" name="timetable[{{$i}}][start_time]" value="{{ $value['start_time'] }}" class="form-control">
                                          </td>
                                          <td>
                                            <input type="time" name="timetable[{{$i}}][end_time]" value="{{ $value['end_time'] }}" class="form-control">
                                          </td>
                                          <td>
                                            <input type="text" name="timetable[{{$i}}][room_number]" value="{{ $value['room_number'] }}" class="form-control">
                                          </td>
                                        </tr>
                                        @php
                                          $i++;
                                        @endphp
                                    @endforeach

                                  </tbody>
                                </table>
                                <button class="btn btn-primary">Submit</button>
                              </form>
                                
                              
                            </div>
                          </div>
                
                        </div>
                        
                    </nav>
                </div>
              </div>
        </div>
      @endif
      </div>
    </section>

  </main><!-- End #main -->
@section('script')
  <script type="text/javascript">
    $('.getClass_assign').change(function() {
      var class_id = $(this).val();
      console.log("Class ID: ", class_id);
      $.ajax({
        type: "POST",
        url: "{{ url('admin/class_timetable/get_subject') }}",
        data: {
             "_token": "{{ csrf_token()  }}",
             class_id: class_id,
        },
        dataType:"json",
        success: function (response) {
           $('.getSubject').html(response.html);
          },
      });
    });
  </script>

@endsection('')