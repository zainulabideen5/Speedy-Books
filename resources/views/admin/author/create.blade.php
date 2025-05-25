@extends('admin.layout.master')
@section('page-title')
  Create Author
@endsection
@section('main-content')
<section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="formCreate" id="formCreate" method="POST" action="{{ Route('author.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          {{-- @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif --}}
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  <div class="form-group @error('title') has-error @enderror" >
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                      @error('title')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group @error('slug') has-error @enderror">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" readonly>
                      @error('slug')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group @error('designation') has-error @enderror">
                      <label for="designation">Designation <span class="text text-red">*</span></label>
                      <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
                      @error('designation')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group @error('dob') has-error @enderror">
                  <label for="dob">Date of birth: <span class="text text-red">*</span></label> 
                  <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
                  @error('dob')
                    <div class="label label-danger">{{ $message }}</div>
                  @enderror
                 </div>
 
                    <div class="form-group @error('email') has-error @enderror">
                      <label for="email">Email <span class="text text-red">*</span></label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                      @error('email')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group @error('country') has-error @enderror">
                      <label>Country <span class="text text-red">*</span></label>
                      <select name="country" id="country" class="form-control select2" style="width: 100%;">
                        @foreach($countries as $country)
                          <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                      </select>
                      @error('country')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                    </div>
 
                    <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                  </div>
                </div>
                  
                <div class="col-xs-6">
                   <div class="form-group @error('author_img') has-error @enderror">
                      <label for="author_img">Author Image <span class="text text-red">*</span></label>
                      <input type="file" name="author_img" class="form-control" id="author_img">
                      @error('author_img')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  <div class="form-group">
                      <label for="facebook_id">Facebook ID</label>
                      <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="Facebook ID">
                    </div>
 
                    <div class="form-group">
                      <label for="twitter_id">Twitter ID</label>
                      <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="Twitter ID">
                    </div>
 
                    <div class="form-group">
                      <label for="youtube_id">YouTube ID</label>
                      <input type="text" name="youtube_id" class="form-control" id="youtube_id" placeholder="YouTube ID">
                    </div>
                    <div class="form-group">
                      <label for="pinterest_id">Pinterest ID</label>
                      <input type="text" name="pinterest_id" class="form-control" id="pinterest_id" placeholder="Pinterest ID">
                    </div>
                    <div class="form-group">
                    <label>Author Feature</label>
                    <select name="author_feature" id="author_feature" class="form-control select2" style="width: 100%;">
                      <option value="no">NO</option>
                      <option value="yes">Yes</option>
                    </select>
                </div>
                </div>
            </div>
 
              <!-- row end -->
 
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
          </div>
      </div>
      <!-- /.box -->

      <!-- form end -->
      </form>

    </section>
@endsection
