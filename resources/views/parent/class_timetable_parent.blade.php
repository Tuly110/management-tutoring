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
                    <h5 class="card-title">My Timetable</h5>
                        {{-- <div class="col-12"> --}}
                            {{-- <div class="card"> --}}
                                <h5>
                                    {{ $getClass->name }}- {{ $getSubject->name }}- {{ $getStudent->name }} {{ $getStudent->last_name }}
                                </h5>
                                <div class="card-body">
                                    <table class="table  table-striped">
                                        <thead>
                                        <tr>
                                            <th>Week</th>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            <th>Room number</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($getRecord as $valueW)
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
                </div>
              </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->