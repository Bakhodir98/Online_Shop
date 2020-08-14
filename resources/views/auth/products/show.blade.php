@extends('auth.layouts.app')

@section('title', 'Товар: '. $product->name)

@section('content')
<div class="col-md-12">
    <h1>Товар {{$product->name}}</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{$product->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{$product->code}}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{$product->name}}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{$product->description}}</td>
            </tr>
            <tr>
                <td>Детали</td>
                <td>{{$product->details}}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{$product->price}}</td>
            </tr>
            <tr>
                <td>Старая цена</td>
                <td>{{$product->old_price}}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td>
                    <img src="{{Storage::url($product->image)}}" alt="" height="240px">
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection