@extends('admin.layout.master')
@section('page-title')
    Manage Author
@endsection
@section('main-content')
<section class="content">
        <!-- /.row -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a id="activeAllStatus" class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
                    <a id="deactiveAllStatus" class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
                    <a id="deleteAll" class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
                    <a href="{{ Route('author.create') }}" class="btn btn-default btn-xm"><i class="fa fa-plus"></i></a>
                </h3>
                <div class="box-tools">
                    <form method="get" action="/admin/author">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="s" class="form-control pull-right" placeholder="Search" value="{{ request('s') ? request('s') : null }}">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
		   </form>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if($authors)
		<form name="formView" id="formView">
                <table class="table table-bordered">
                    <thead style="background-color: #F8F8F8;">
                        <tr>
                            <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                            <th width="20%">Title</th>
                            <th width="20%">Designation</th>
                            <th width="20%">Author Image</th>
                            <th width="10%">Status</th>
                            <th width="10%">Manage</th>
                        </tr>
                    </thead>
                    @foreach($authors as $author)
                    <tr>
                        <td><input type="checkbox" name="checkAll[]" value="{{ $author->id }}" class="checkSingle"></td>
                        <td>{{ $author->title }}</td>
                        <td>{{ $author->designation }}</td>
                        <td>
                            @if($author->author_img == 'No image found')
                                <img src="/uploads/no-img.jpg" width="100" height="100" class="img-thumbnail" alt="No image found">
                            @else
                                <img src="/uploads/{{ $author->author_img }}" width="100" height="100" class="img-thumbnail" alt="{{ $author->title }}">
                            @endif
                        </td>
                        <td>
                            @if($author->status == 'DEACTIVE')
                                <a href="{{ Route('author.status', $author->id) }}" class="btn btn-danger btn-sm singleStatus"><i class="fa fa-thumbs-down"></i></a>
                            @else           
                                <a href="{{ Route('author.status', $author->id) }}" class="btn btn-info btn-sm singleStatus"><i class="fa fa-thumbs-up"></i></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ Route('author.edit', $author->id) }}" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>                            
                            <a href="{{ Route('author.destroy', $author->id) }}" class="btn btn-danger btn-flat btn-sm singleDelete"> <i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
		</form>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                            Showing {{($authors->currentpage()-1)*$authors->perpage()+1}} to {{$authors->currentpage()*$authors->perpage()}}
                            of {{$authors->total()}} entries
                        </span>
                    </div>
                    <div class="col-sm-6 text-right">
                        {{ $authors->links() }}
                    </div>
                </div>
            </div>
            @else
                <div class="alert alert-danger">No record found!</div>
            @endif
        </div>
        <!-- /.box-body -->
</div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
            
    // SINGLE STATUS AJAX
    $(".singleStatus").on('click', function(event) {
        event.preventDefault(); // disable link functionality.

        var self = $(this);
        var href = self.attr('href');

        self.html('<img src="/assets/admin/dist/img/ajax-loader.gif">');

        $.get(href, function(data) {
            if (data == 'ACTIVE')
            {
                self.closest('a').removeClass('btn btn-danger btn-sm');
                self.closest('a').addClass('btn btn-info btn-sm');
                self.html('<i class="fa fa-thumbs-up"></i>');
            }
            else
            {
                self.closest('a').removeClass('btn btn-info btn-sm');
                self.closest('a').addClass('btn btn-danger btn-sm');
                self.html('<i class="fa fa-thumbs-down"></i>');
            }
        });
    });    

    // SINGLE DELETE AJAX
    $(".singleDelete").on('click', function(event) {
        event.preventDefault();
        
        var self = $(this);
        var href = self.attr('href');

        if (confirm('Are you sure you want to delete this?')) 
        {
            $.get(href, function(data) {
                if (data == 'true') 
                {
                    self.closest('tr').css('background-color', 'red').fadeOut(1000);
                    self.remove();
                }
            });
        }
        else
        {
            return false;
        }

    });

    // ACTIVE ALL STATUS AJAX 
    $("#activeAllStatus").on('click', function(event) {
    	event.preventDefault();
	if($(".checkSingle:checked").length > 0) 
	{
		var formSerials = $("#formView").serialize();
		$.get('{{ Route('author.active.all.status') }}', formSerials, function(data) {
			if (data > 0 ) 
                        window.location.href = '/admin/author';
		});
	}
	else
	{
		alert("Select atleast one!");
	}
	
     });    

    // DEACTIVE ALL STATUS AJAX 
    $("#deactiveAllStatus").on('click', function(event) {
    	event.preventDefault();
	if($(".checkSingle:checked").length > 0) 
	{
		var formSerials = $("#formView").serialize();
		$.get('{{ Route('author.deactive.all.status') }}', formSerials, function(data) {
			if (data > 0 ) 
                        window.location.href = '/admin/author';
		});
	}
	else
	{
		alert("Select atleast one!");
	}
	
     });
    
     // DELETE ALL AJAX
    $("#deleteAll").on('click', function(event) {
    	event.preventDefault();
	if($(".checkSingle:checked").length > 0) 
	{
		if(confirm('Are you sure you want to delete this?'))
		{
			var formSerials = $("#formView").serialize();
			$.get('{{ Route('author.delete.all') }}', formSerials, function(data) {
				if (data > 0 ) 
                        	window.location.href = '/admin/author';
			});	
		}
		else
		{
		  return false;
		}
	}
	else
	{
		alert("Select atleast one!");
	}
	
     });



    });
</script>
@endsection