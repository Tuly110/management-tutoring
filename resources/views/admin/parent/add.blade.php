@extends('layouts.app');
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add new Parent</h1>
    </div><!-- End Page Title -->
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
                        <input type="text" class="form-control" value="{{ old('name') }}" id="inputNanme4" name="first_name" required>
                        <div class="text-danger"><b>{{ $errors->first('first_name') }}</b></div>
                      </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Last Name <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" value="{{ old('name') }}" id="inputNanme4" name="last_name" required>
                        <div class="text-danger"><b>{{ $errors->first('last_name') }}</b></div>
                    </div> 
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <label class="form-label">Mobile Number<span style="color: red">*</span></label>
                    <input type="text" class="form-control" value="{{ old('mobile_number') }}" id="inputEmail4" name="mobile_number" required>
                    <div class="text-danger"><b>{{ $errors->first('mobile_number') }}</b></div>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Gender<span style="color: red">*</span></label>
                    <select class="form-control" name="gender" id="" required> 
                      <option value="">Select gender</option>
                      <option {{ (old('gender') == 'Male') ? 'selected' : ''  }} value="Male">Male</option>
                      <option {{ (old('gender') == 'Female') ? 'selected' : ''  }} value="Female">Female</option>
                      <option {{ (old('gender') == 'Other') ? 'selected' : ''  }} value="Other">Other</option>
                    </select>
                    <div class="text-danger"><b>{{ $errors->first('gender') }}</b></div>
                  </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                      <label class="form-label">Occupation<span style="color: red">*</span></label>
                      <input type="text" class="form-control" value="{{ old('occupation') }}" id="inputEmail4" name="occupation" required>
                      <div class="text-danger"><b>{{ $errors->first('occupation') }}</b></div>
                    </div>
                    <div class="col-6">
                      <label class="form-label">Address<span style="color: red">*</span></label>
                      <input type="text" class="form-control" value="{{ old('address') }}" id="inputEmail4" name="address" required>
                      <div class="text-danger"><b>{{ $errors->first('address') }}</b></div>
                    </div>
                  </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">Status</label>
                        <select class="form-control" name="status" required>
                            <option {{ (old('status') == 0) ? 'selected' : ''  }} value="0">Active</option>
                            <option {{ (old('status') == 1) ? 'selected' : ''  }} value="1">InActive</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Profile pic<span style="color: red">*</span></label>
                        <input type="file" class="form-control" value="{{ old('profile_pic') }}" name="profile_pic" required>
                        <div class="text-danger"><b>{{ $errors->first('profile_pic') }}</b></div>
                    </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Email<span style="color: red">*</span></label>
                  <input type="email" class="form-control" value="{{ old('email') }}" name="email" required>
                  <div class="text-danger"><b>{{ $errors->first('email') }}</b></div>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password<span style="color: red">*</span></label>
                  <input type="password" class="form-control" id="inputPassword4" name="password" required>
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