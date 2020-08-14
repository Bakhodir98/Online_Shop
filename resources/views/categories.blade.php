@extends('layouts/master')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-3">
                <h2>{{$category->name}}</h2>
                <div>
                    <a href="{{$category->code}}"><img class="image" src="{{Storage::url($category->image)}}"
                            alt=""></a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection