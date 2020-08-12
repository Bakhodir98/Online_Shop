@extends('layouts/master')

@section('content')
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<h2>
				{{$category->name}}
				{{-- @foreach ($products as $product)
				{{dd($product)}}
				@include('card',compact('product'))
				@endforeach --}}

			</h2>
		</div>
		<!-- Products tab & slick -->
		<div class="col-md-12">
			<div class="row">
				<div class="products-tabs">
					<!-- tab -->
					<div id="tab1" class="tab-pane active">
						<div class="products-slick" data-nav="#slick-nav-1">

							@foreach($category->products as $product)
							@include('layouts/card',compact('product'))
							@endforeach
						</div>
						<div id="slick-nav-1" class="products-slick-nav"></div>
					</div>
					<!-- /tab -->
				</div>
			</div>
		</div>
		<!-- Products tab & slick -->
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@endsection