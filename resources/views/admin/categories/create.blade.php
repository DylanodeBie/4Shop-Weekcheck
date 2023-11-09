@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-center my-5"> 

	<form action="{{ route('admin.categories.create') }}" method="PUT" style="min-width: 320px;" enctype="multipart/form-data">
		
		<h4>Nieuwe Categorie</h4>

		<div class="form-group">
			<label for="title">Titel</label>
			<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
		</div>

		<button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
		{{ csrf_field() }}
	</form>
</div>

@endsection
