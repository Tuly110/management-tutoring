@extends('layouts.app');
@section('content')
  <main id="main" class="main">

    <div class="d-flex bd-highlight mb-3">
      <div class="pagetitle p-2 bd-highlight" style="text-align: left">
        <h1>My Student Subject <span class="text-primary">{{ $getUser->name }}{{ $getUser->last_name }}</span></h1>    
      </div><!-- End Page Title -->
      
    </div>
    
    @include('_message')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Student Subject </h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Subject Type</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value )
                  <tr>    
                      <td>{{ $value->subject_name }}</td>
                      <td>
                        @if ($value->subject_type == 0)
                        Theory
                      @else
                        Practical
                      @endif
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