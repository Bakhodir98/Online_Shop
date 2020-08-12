@extends('auth.layouts.app')

@section('title', 'Категории')

@section('content')

<div class="col-md-12" style="text-align: center">
    <h1>Категории</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>#</th>
                <th>Код</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->code}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{route('categories.destroy',$category )}}" method="POST">
                            <a href="{{route('categories.show', $category)}}" class="btn btn-success"
                                type="button">Открыть</a>
                            <a href="{{route('categories.edit', $category)}}" class="btn btn-warning"
                                type="button">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Удалить">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <a href="{{route('categories.create')}}" class="btn btn-success" type="button">Добавить категорию</a>
</div>
@endsection