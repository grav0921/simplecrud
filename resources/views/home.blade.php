@extends('css.layout')

@section('isi')
<div class="container my-2">
<h1>home</h1>
<a href="/create">create an item</a>
<br>
<a href="/show/item">Show item</a>
@if (\Session::has('created'))
<p>{!! \Session::get('created') !!}</p>
@elseif (\Session::has('updated'))
<p>{!! \Session::get('updated') !!}</p>
@elseif (\Session::has('deleted'))
<p>{!! \Session::get('deleted') !!}</p>
@endif

@if ($title === 'create')
	<div>
		<form method="post" action="/create/proses">
	@csrf
	<div class="w-50">
	<div class="mb-3">
    	<label for="exampleInputEmail1" class="form-label">title</label>
    	<input type="text" class="form-control" name="title" placeholder="input title" value="">

    	@error('title')
    	<div class="invalid-feedback"></div>
    	{{$message}}
    	@enderror

    	<br>
    	<label for="exampleInputEmail1" class="form-label">deskripsi</label>
    	<!-- <input type="text"  name="" placeholder="input deskripsi"> -->
    	<textarea type="text" class="form-control" name="description" rows="4" cols="50"></textarea>

    	@error('description')
    	<div class="invalid-feedback"></div>
    	{{$message}}
    	@enderror

    	<br>
    	<label class="form-label">rating</label>
    	<select name="rate" class="">
    		@php $n = 5; @endphp 
    		@for($i=1; $i<=$n; $i++)
    		<option value="{{$i}}">{{$i}}</option>
    		@endfor
    		<!-- <option value="5">5</option>
    		<option value="4">4</option>
    		<option value="3">3</option>
    		<option value="2">2</option>
    		<option value="1">1</option> -->
    	</select>
  	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
	</form>
		@if ($errors->any())
		<div class="alert alert-danger">
	    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach

    	</ul>
		</div>
		@endif

	</div>

@elseif ($title === 'edit')
	<div>
		<form method="post" action="/edit/proses/{{$task->id}}">
		@csrf
		<div class="w-50">
		<div class="mb-3">

		<label for="exampleInputEmail1" class="form-label">titles</label>
		<input type="text" class="form-control" name="title" placeholder="{{$task->title}}" value="{{$task->title}}">

		<br>

		<label for="exampleInputEmail1" class="form-label">deskripsi</label>
		<textarea type="text" class="form-control" name="description" rows="4" cols="50">{{$task->description}}</textarea>

		<br>

		<label class="form-label">rating</label>
    	<select name="rate" class="">
    		<option value="" disabled selected>-- {{$task->rate}} --</option>
    		<option value="5">5</option>
    		<option value="4">4</option>
    		<option value="3">3</option>
    		<option value="2">2</option>
    		<option value="1">1</option>
    	</select>

		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		</div>

		@if ($errors->any())
		<div class="alert alert-danger">
	    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach

    </ul>
	</div>
	@endif

@elseif ($title === 'show')
	<div class="card mt-5">
            <div class="card-body">
                
                <h4 class="text-center my-4">Detail nama</h4>
                @if(!count($task))
                <h5 class="text-center my-4">Kosong</h5>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Merk</th>
                            <th>Deskripsi</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($taskhigh as $sb)
                        <tr>
                        <td>{{$sb->title}}</td>
                        <td>{{$sb->description}}</td>
                        <td>{{$sb->rate}}</td>
                        <td>
                        	<a href="/edit/item/{{$sb->id}}">Edit</a>
                            <a href="/hapus/item/{{$sb->id}}">Hapus</a>
                        </td>
                    	</tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
@endif
</div>
@endsection