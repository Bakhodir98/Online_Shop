{{-- {{dd($product->image)}} --}}
<!-- product -->
<div class="product">
    <a href='#'>
        <div class="product-img">
            <img src="{{ url('img/'.$product->image) }}" alt="">
        </div>
    </a>
    <div class="product-body">
        <p class="product-category">Категория:{{$category = $product->Category->name}}
        </p>
        <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
        <h4 class="product-price">{{$product->price}}<del class="product-old-price">{{$product->old_price}}</del>
        </h4>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div class="product-btns">
            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Добавить в
                    вишлист</span></button>
            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Сравнить
                </span></button>
            <button class="quick-view"
                onclick="window.location='{{route('product', [$product->category->code, $product->code])}}'"><i
                    class="fa fa-eye"></i><span class="tooltipp">Посмотреть
                </span></button>
        </div>
    </div>
    <form action="{{route('basket-add', $product)}}" method="POST">
        <div class="add-to-cart">
            <button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>
            @csrf
        </div>

    </form>
</div>
<!-- /product -->