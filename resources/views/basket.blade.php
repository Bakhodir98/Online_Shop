@extends('layouts/master')
@section('content')
<div class="container">
    <div class="starter-template">
        <div class="justify-content-center">
            <h1>Корзина</h1>
            <p>Оформление заказа</p>
        </div>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Стоимость</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if(!is_null($order->products)) --}}
                    @foreach ($order->products as $product)
                    <tr>
                        <td><a href="{{route('product',[$product->category->code,$product->name])}}">
                                <img height="56px" src="{{Storage::url($product->image)}}">{{$product->name}}</a>
                        </td>
                        <td><span class="badge">{{$product->pivot->count}}</span>
                            <div class="btn-group form-inline">
                                <form method="POST" action="{{route('basket-remove', $product)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn_background"><span
                                            class="glyphicon glyphicon-minus"></span></button>
                                </form>
                                <form method="POST" action="{{route('basket-add', $product)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-info"><span
                                            class="glyphicon glyphicon-plus"></span></button>
                                </form>
                            </div>
                        </td>
                        <td>{{$product->price}} сум.</td>
                        <td>{{$product->getPriceForCount()}} сум.</td>
                    </tr>
                    @endforeach
                    {{-- @endif --}}
                    <tr>
                        <td colspan="3">Общая Стоимость</td>
                        <td>{{$order->getFullPrice()}} сум</td>
                    </tr>

                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-danger btn_background" href="basket/place">Оформить</a>
            </div>
        </div>

    </div>
</div>
@endsection