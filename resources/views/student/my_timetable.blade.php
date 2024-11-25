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
                  @foreach ($getRecord as $value )
                    <h5 class="card-title">My Timetable</h5>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Timetable {{ $value['Subject_Name'] }}</h5>
                                    <table class="table datatable table-striped">
                                        <thead>
                                        <tr>
                                            <th>Week</th>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            <th>Room number</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($value['week'] as $valueW)
                                            <tr>
                                               <td>{{ $valueW['week_name'] }}</td>
                                               <td>{{ $valueW['start_time'] }}</td>
                                               <td>{{ $valueW['end_time'] }}</td>
                                               <td>{{ $valueW['room_number'] }}</td>
                                            </tr>
                                        @endforeach
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  @endforeach
                </div>
              </div>
        </div>
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