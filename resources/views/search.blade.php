@extends('app')

@section('content')

	<h1>blah blah blah</h1>
	<h1>blah blah blah</h1>
	<h1>blah blah blah</h1>

	@foreach ($dishesForMap as $dishForMap)
		{{ $dishForMap->name }}
	@endforeach
bcxvbxcvbxc
@endsection