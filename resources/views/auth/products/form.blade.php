@extends('auth.layouts.app')

@isset($product)
@section('title', 'Редактировать товар '.$product->name)
@else
@section('title', 'Добавить товар')
@endisset


@section('content')
<div class="col-md-12">
    @isset($product)
    <h1>Редактировать товар <b>{{$product->name}}</b></h1>
    @else
    <h1>Добавить товар</h1>

    @endisset
    <form method="POST" enctype="multipart/form-data" @isset($product) action="{{route('products.update', $product)}}"
        @else action="{{route('products.store')}}">
        @endisset
        <div>
            @isset($product)
            @method('PUT')
            @endisset
            @csrf
            <div class="input-group row">
                <label for="code" class="col-sm-2 col-form-label">Код: </label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'code'])
                    <input type="text" class="form-control" name="code" id="code"
                        value="@isset($product){{$product->code}}@endisset">
                </div>
            </div>
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Название: </label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'name'])
                    <input type="text" class="form-control" name="name" id="name"
                        value="@isset($product){{$product->name}}@endisset">
                </div>
            </div>
            <div class="input-group row">
                <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'category_id'])
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" @isset($product) @if($category->id == $product->category_id)
                            selected
                            @endif
                            @endisset
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="input-group row">
                <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'price'])
                    <input type="text" class="form-control" name="price" id="price"
                        value="@isset($product){{$product->price}}@endisset">
                </div>
            </div>
            <div class="input-group row">
                <label for="old_price" class="col-sm-2 col-form-label">Старая цена: </label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'old_price'])
                    <input type="text" class="form-control" name="old_price" id="old_price"
                        value="@isset($product){{$product->old_price}}@endisset">
                </div>
            </div>
            <div class="input-group row">
                <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'description'])
                    <textarea name="description" id="description" cols="61"
                        rows="7">@isset($product){{$product->description}}@endisset</textarea>
                </div>
            </div>
            <div class="input-group row">
                <label for="details" class="col-sm-2 col-form-label">Детали: </label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'details'])
                    <textarea name="details" id="details" cols="61"
                        rows="7">@isset($product){{$product->details}}@endisset</textarea>
                </div>
            </div>
            <div class="input-group row">

                <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                <div class="col-sm-10">
                    @include('auth.layouts.error', ['fieldName' => 'image'])
                    <label class="btn btn-default btn-file">
                        Загрузить
                        <input type="file" style="display:none" name="image" id="image">
                    </label>
                </div>
            </div>

            @foreach ([
            'new' => 'Новинки',
            'popular' => 'топ-продоваемые'
            ] as $field => $title)
            <div class="input-group row">
                <label for="code" class="col-sm-2 col-form-label">{{$title}}</label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => $field])
                    <input type="checkbox" class="form-control" name="{{$field}}" id="{{$field}}" @if(isset($product) &&
                        $product->$field)
                    checked="checked"
                    @endif
                    >
                </div>
            </div>
            @endforeach
            <div class="input-group row">
                <label for="sale" class="col-sm-2 col-form-label">Распродажа</label>
                <div class="col-sm-12 justify-content-center">
                    @include('auth.layouts.error', ['fieldName' => 'sale'])
                    <input type="text" class="form-control" name="sale" id="sale"
                        value="@isset($product){{$product->sale}}@endisset">
                </div>
            </div>
            <button class="btn btn-success">Сохранить</button>
        </div>
    </form>
</div>
@endsection