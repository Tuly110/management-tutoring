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
      <div >
        <div > 
            <div >
                <div class="card-body">
                    <h5 class="card-title">Teacher Search</h5>
                    {{-- <nav class="navbar navbar-light bg-light ">
                        <div class="">
                            <form class="d-flex ">
                            <input class="form-control me-2" value="{{ Request::get('name') }}" type="search" placeholder="Name" aria-label="Search" name="name">
                            <input class="form-control me-2" value="{{ Request::get('email') }}" type="search" placeholder="email" aria-label="Search" name="email">
                            <input class="form-control me-2" value="{{ Request::get('date_of_join') }}" type="date" placeholder="Date of join" aria-label="Search" name="date_of_join">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <a href="{{ url('admin/teacher/list/') }}" class="btn btn-primary" style="margin-left: 30px">Reset</a>
                            </form>
                        </div>
                    </nav> --}}
                  {{-- <h5 class="card-title">Student List (Total: {{ $getRecord->total() }})</h5> --}}
                  <!-- Dark Table -->
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col" ">#</th>
                            <th scope="col" ">Class name</th>
                            <th scope="col" ">Subject name</th>
                            <th scope="col" ">Subject type</th>
                            <th scope="col"">Create at</th>
                            <th scope="col"">Create by</th>
                            
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
                                <td>{{ $value->created_at }}</td>    
                                <td>{{ $value->created_by_name }}</td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    {{-- <div style="padding: 10px;" class="d-flex justify-content-center">
                        {!! $getRecord->appends(\Request::except('page'))->links() !!}
                    </div> --}}
                  <!-- End Dark Table -->
                </div>
              </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')