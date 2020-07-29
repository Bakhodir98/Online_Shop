{{-- {{dd($product->image)}} --}}
<!-- product -->
<div class="product">
    <?php
    if($product->category_id == '1') $category = 'Смартфоны'; 
    elseif($product->category_id == '2')$category = 'Ноутбуки';
    elseif($product->category_id == '3')$category = 'Камеры';
    else $category =  'Аксессуар';
    ?>
    <a href='#'>
        <div class="product-img">
            <img src="{{ url('img/'.$product->image) }}" alt="">

            {{-- <div class="product-label">
            <span class="sale">-30%</span>
            <span class="new">NEW</span>
        </div> --}}
        </div>
    </a>
    <div class="product-body">
        <p class="product-category">Категория:{{$category}}
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
            <button class="quick-view" onclick="window.location='{{$category}}/{{$product->code}}'"><i
                    class="fa fa-eye"></i><span class="tooltipp">Посмотреть
                </span></button>
        </div>
    </div>
    <div class="add-to-cart">
        <button class="add-to-cart-btn" onclick="window.location='{{route('basket')}}'"><i
                class="fa fa-shopping-cart"></i>Добавить в корзину</button>
    </div>
</div>
<!-- /product -->