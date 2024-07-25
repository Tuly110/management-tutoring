@extends('layouts.app');
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Change password</h1>
    </div><!-- End Page Title -->
    @include('_message')
    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              {{-- <h5 class="card-title">Add Form</h5> --}}
              
              <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="">
                {{ csrf_field() }}
                <div class="col-12">
                  <label for="inputNanme4" class="form-label p-2">Old password</label>
                  <input type="password" required class="form-control" value="" id="inputNanme4" name="old_password" placeholder="Old password">
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label p-2">New Password</label>
                    <input type="password" required class="form-control" value="" id="inputNanme4" name="new_password" placeholder="New Password">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="add" >Update</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection('')