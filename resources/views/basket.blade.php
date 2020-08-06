@extends('master')
@section('content')
<div class="container">
    <div class="starter-template">
        <div class="justify-content-center">
            <h1>Корзина</h1>
            <p>Оформление закза</p>
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
                    @foreach ($order->products as $product)
                    <tr>
                        <td><a href="{{route('product',[$product->category->code,$product->name])}}"><img height="56px"
                                    src="">{{$product->name}}</a></td>
                        <td><span class="badge">1</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn_background"><span
                                        class="glyphicon glyphicon-minus"></span></button>
                                <button type="button" class="btn btn-info"><span
                                        class="glyphicon glyphicon-plus"></span></button>
                            </div>
                        </td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->price}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Общая Стоимость</td>
                        <td>1 200 000 сум</td>
                    </tr>

                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-danger btn_background" href="basket/place">ОФОРМИТЬ</a>
            </div>
        </div>

    </div>
</div>
@endsection