@extends('layouts.app');
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>My account</h1>
    </div><!-- End Page Title -->
    @include('_message')

    <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              {{-- <h5 class="card-title">Add Form</h5> --}}
              
              <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}  
                <div class="row mt-4">
                    <div class="form-group col-md-6">
                        <label class="form-label">First Name <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" id="inputNanme4" name="first_name" required>
                        <div class="text-danger"><b>{{ $errors->first('first_name') }}</b></div>
                      </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Last Name <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" value="{{ old('name', $getRecord->last_name) }}" id="inputNanme4" name="last_name" required>
                        <div class="text-danger"><b>{{ $errors->first('last_name') }}</b></div>
                    </div> 
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Mobile Number<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('mobile_number', $getRecord->mobile_number) }}" id="inputEmail4" name="mobile_number" required>
                    <div class="text-danger"><b>{{ $errors->first('mobile_number') }}</b></div>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Profile pic<span style="color: red">*</span></label>
                    <input type="file" class="form-control" value="{{ old('profile_pic') }}" name="profile_pic" >
                    <div class="text-danger"><b>{{ $errors->first('profile_pic') }}</b></div>
                    @if (!empty($getRecord->getProfile()))
                        <img src="{{ $getRecord->getProfile() }}" alt="" style="width: 100px">
                    @endif
                </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                      <label class="form-label">Occupation<span style="color: red">*</span></label>
                      <input type="text" class="form-control" value="{{ old('occupation', $getRecord->occupation) }}" id="inputEmail4" name="occupation" required>
                      <div class="text-danger"><b>{{ $errors->first('occupation') }}</b></div>
                    </div>
                    <div class="col-6">
                      <label class="form-label">Address<span style="color: red">*</span></label>
                      <input type="text" class="form-control" value="{{ old('address', $getRecord->address) }}" id="inputEmail4" name="address" required>
                      <div class="text-danger"><b>{{ $errors->first('address') }}</b></div>
                    </div>
                  </div>
                <div class="col-12">
                  <label class="form-label">Email<span style="color: red">*</span></label>
                  <input type="email" class="form-control" value="{{ old('email', $getRecord->email) }}" name="email" required>
                  <div class="text-danger"><b>{{ $errors->first('email') }}</b></div>
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