@extends('layouts.app');
@section('content')
  <main id="main" class="main">
    <style>
      td{
        font-size: 10px;
      }
      button{
        font-size: 10px;

      }
    </style>
    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>Data Tables</h1>    
      </div><!-- End Page Title -->
      <div class="ms-auto p-2 bd-highlight" style="text-align: right">
        <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Add new Teacher</a>
      </div> 
    </div>
    
    @include('_message')
    <section class="section">
      <div >
        <div > 
            <div >
                <div class="card-body">
                    <h5 class="card-title">Teacher Search</h5>
                    <nav class="navbar navbar-light bg-light ">
                        <div class="">
                            <form class="d-flex ">
                            <input class="form-control me-2" value="{{ Request::get('name') }}" type="search" placeholder="Name" aria-label="Search" name="name">
                            <input class="form-control me-2" value="{{ Request::get('email') }}" type="search" placeholder="email" aria-label="Search" name="email">
                            <input class="form-control me-2" value="{{ Request::get('date_of_join') }}" type="date" placeholder="Date of join" aria-label="Search" name="date_of_join">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <a href="{{ url('admin/teacher/list/') }}" class="btn btn-primary" style="margin-left: 30px">Reset</a>
                            </form>
                        </div>
                    </nav>
                  {{-- <h5 class="card-title">Student List (Total: {{ $getRecord->total() }})</h5> --}}
                  <!-- Dark Table -->
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col" style="font-size: 10px;">#</th>
                            <th scope="col" style="font-size: 10px;">Profile pic</th>
                            <th scope="col" style="font-size: 10px;">Teacher Name</th>
                            <th scope="col"style="font-size: 10px;">Email</th>
                            <th scope="col"style="font-size: 10px;">Gender</th>
                            <th scope="col"style="font-size: 10px;">Date of joining</th>
                            <th scope="col"style="font-size: 10px;">Note</th>
                            <th scope="col"style="font-size: 10px;">Mobile number</th>
                            <th scope="col"style="font-size: 10px;">Marital status</th>
                            <th scope="col"style="font-size: 10px;">Address</th>
                            <th scope="col"style="font-size: 10px;">Qualification</th>
                            <th scope="col"style="font-size: 10px;">Work experience</th>
                            <th scope="col"style="font-size: 10px;">Status</th>
                            <th scope="col"style="font-size: 10px;">Create-at</th>
                            <th scope="col"style="font-size: 10px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value )
                            <tr>    
                                <th>{{ $value->id }}</th>
                                <th>
                                  @if (!empty($value->getProfile()))
                                    <img src="{{ $value->getProfile() }}" alt="" style="width: 50px; height: 50px; border-radius: 30px">
                                    
                                  @endif
                                </th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->gender }}</td>
                                <td>{{ $value->date_of_join }}</td>    
                                <td>{{ $value->note }}</td>    
                                <td>{{ $value->mobile_number }}</td>    
                                <td>{{ $value->marital_status }}</td>    
                                <td>{{ $value->address }}</td>    
                                <td>{{ $value->qualification }}</td>    
                                <td>{{ $value->work_experience }}</td>    
                                <td>
                                    @if ($value->status == 0)
                                      Active
                                    @else
                                      InActive
                                    @endif
                                  </td>    
                                <td>{{ $value->created_at }}</td>    
                                <td>
                                    <a href="{{ url('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary" style="width: 40px; height: 20px; font-size: 10px; line-height: 5px">Edit</a>
                                    <a href="{{ url('admin/teacher/delete/'.$value->id) }}" class="btn btn-danger" style="width: 60px; height: 20px; font-size: 10px; line-height: 5px">Delete</a>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    <div style="padding: 10px;" class="d-flex justify-content-center">
                        {!! $getRecord->appends(\Request::except('page'))->links() !!}
                    </div>
                  <!-- End Dark Table -->
                </div>
              </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')