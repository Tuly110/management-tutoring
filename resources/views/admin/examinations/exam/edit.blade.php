@extends('layouts.app');
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit an Exam</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body" style="padding-top: 10px">
              <form class="row g-3" method="POST" action="">
                {{ csrf_field() }}
                <div class="col-12">
                  <label class="form-label">Exam Name</label>
                  <input type="text" class="form-control" value="{{old('name',  $getRecord->name)}}" name="name" placeholder="Exam name">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Note</label> 
                  <br>
                  <textarea class="form-control" name="note" id="" cols="85" rows="5" >
                    {{old('note',  $getRecord->note)}}
                  </textarea>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="add" >Submit</button>
                  <button type="reset" class="btn btn-secondary" name="reset ">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')