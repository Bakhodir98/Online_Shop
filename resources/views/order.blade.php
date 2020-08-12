@extends('layouts/master')

@section('title','Корзина')
@section('content')
<!-- SECTION -->
<div class="section">
    <div class="starter-template">
        <div class="header justify-content-center">
            <h1>Подтвердите заказ:</h1>
        </div>

        <!-- container -->
        <div class="container justify-content-center">
            <!-- row -->
            <div class="row ">
                <p>Общая стоимость заказа: <b>{{$order->getFullPrice()}} сум</b></p>
                <form action="{{route('basket-confirm')}}" method="POST">
                    <div>
                        <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вам связаться:</p>
                        <div class="container order-place">

                            <div class="form-group">
                                <label for="name" class="control-label col-log-offset-3 col-lg-2">Имя:</label>
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="control-label col-log-offset-3 col-lg-2">Номер
                                    телефона:</label>
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        {{-- <input type="hidden" name="_tokern" value="qsvmdfjknbdmfmfldsfvlssdvfkmhrlkmtg"> --}}
                        @csrf
                        <input type="submit" class="btn btn-danger btn_background" href="#" value="Подтвердите заказ">
                    </div>
                </form>
            </div> <!-- /row -->
        </div>
        <!-- /container -->
    </div>
</div>
<!-- /SECTION -->
@endsection