@extends('master')
@section('content')
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<h2>
				@if($category == 'mobile')
				Smartphones
				@elseif($category == 'laptop')
				Laptops
				@else
				Cameras
				@endif
				@foreach ($products as $product)
				{{dd($product)}}
				@include('card',compact('product'))
				@endforeach
			</h2>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@endsection