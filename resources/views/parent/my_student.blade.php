@extends('layouts.app');
@section('content')
  <main id="main" class="main">

    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>Data Tables</h1>    
      </div><!-- End Page Title -->
      <div class="ms-auto p-2 bd-highlight" style="text-align: right">
      </div> 
    </div>
    
    @include('_message')
    <section class="section">
      <div class="row">
        <div class="col-lg-12"> 
            <div class="card">
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Parent student List </h5>
                  <!-- Dark Table -->
                  <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Profile pic</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Create-at</th>
                            <th scope="col">Action</th>
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
                                <td>{{ $value->name }}{{ $value->last_name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->created_at }}</td>   
                                <td>
                                    <a href="{{ url('parent/my_student_subject/'.$value->id)}}" class="btn btn-primary btn-sm">Subject</a>
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