@extends('admin.layout.master')
@section('page-title')
  Create Category
@endsection
@section('main-content')  
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <!-- form start -->
  <form name="formCreate" id="formCreate" method="POST" action="{{ Route('category.store') }}">
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
              
              <div class="form-group @error('title') has-error @enderror">
                <label for="title">Title <span class="text text-red">*</span></label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                  @error('title')
                    <div class="label label-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group @error('slug') has-error @enderror">
                <label for="slug">Slug <span class="text text-red">*</span></label>
                  <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
                  @error('slug')
                    <div class="label label-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
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
</form>
  <!-- form end -->

</section>
@endsection    