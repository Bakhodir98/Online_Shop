@extends('master')
@section('title', '| Бытовая техника, смартфоны, ноутбуки, телевизоры, доставка по
Ташкенту и всей Республики Узбекистан')

@section('content')
@include('collection')
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Новые товары</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Ноутбуки</a></li>
							<li><a data-toggle="tab" href="#tab1">Смартфоны</a></li>
							<li><a data-toggle="tab" href="#tab1">Камеры</a></li>
							<li><a data-toggle="tab" href="#tab1">Аксессуары</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->
		</div>
		<!-- Products tab & slick -->

		<div class="col-md-12">
			<div class="row">
				<div class="products-tabs">
					<!-- tab -->
					<div id="tab1" class="tab-pane active">
						<div class="products-slick" data-nav="#slick-nav-1">

							@foreach($products as $product)
							@include('card',compact('product'))
							@endforeach
						</div>
						<div id="slick-nav-1" class="products-slick-nav"></div>
					</div>
					<!-- /tab -->
				</div>
			</div>
		</div>
		<!-- Products tab & slick -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<!-- /SECTION -->
@include('hotdeals')
@endsection