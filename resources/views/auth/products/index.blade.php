@extends('auth.layouts.app')

@section('title', 'Продукты ')

@section('content')

<div class="col-md-12" style="text-align: center">
    <h1>Товары</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>#</th>
                <th>Код</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->code}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->Category->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{route('products.destroy',$product )}}" method="POST">
                            <a href="{{route('products.show', $product)}}" class="btn btn-success"
                                type="button">Открыть</a>
                            <a href="{{route('products.edit', $product)}}" class="btn btn-warning"
                                type="button">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Удалить" onclick="Confirm()">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <a href="{{route('products.create')}}" class="btn btn-success" type="button">Добавить товар</a>
</div>
@endsection