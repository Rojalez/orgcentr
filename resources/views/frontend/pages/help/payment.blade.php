@extends('frontend.layout.layout')
@section('title','Оплата')
@section('content')

<section class="md:px-8 px-3">
   
        <div class="py-8">
            <h2 class="md:text-3xl flex items-center justify-center text-xl font-bold text-blue-grey-900 uppercase">Варианты оплаты:</h2>
            <div class="grid md:grid-cols-2 grid-cols-1 my-10 gap-4 items-stretch">
                @foreach ($payments as $payment)
                <div class="p-6 font-bold text-gray-700 w-auto shadow bg-white bg-opacity-20 rounded">
                    <p class="md:text-2xl text-xl pb-4">{{$payment->title}}</p>
                    {!!$payment->text!!}
                    <!-- <p class="md:text-lg font-semibold text-sm">Для ИП и юридических лиц</p>
                    <div class="md:text-lg font-light text-sm">
                        <p>Работаем с НДС и без.</p>
                        <p>Товар отгружаем по платежке.</p>
                        <p>Реквизиты присылайте нам на <a href="mailto:agalakov@orgcentr5.ru" class="underline">почту</a>.</p>
                    </div> -->
                </div>
                @endforeach

             
                <!-- <div class="p-6 font-bold text-gray-700 w-auto shadow bg-white bg-opacity-20 rounded ">
                    <p class="md:text-2xl text-xl pb-4">2. Онлайн</p>
                    <div class="md:text-lg font-light text-sm">
                        <p>Банковcкой картой на сайте</p>
                    </div>
                </div>
                <div class="p-6 font-bold text-gray-700 w-auto shadow bg-white bg-opacity-20 rounded ">
                    <p class="md:text-2xl text-xl pb-4">3. Банковcкой картой</p>
                    <div class="md:text-lg font-light text-sm">
                        <p>Оплата в нашем офисе.</p>
                    </div>
                </div>
                <div class="p-6 font-bold text-gray-700 w-auto shadow bg-white bg-opacity-20 rounded ">
                    <p class="md:text-2xl text-xl pb-4">4. Наличными</p>
                    <div class="md:text-lg font-light text-sm">
                        <p>Выдаем кассовый чек</p>
                    </div>
                </div>
                <div class="p-6 font-bold text-gray-700 w-auto shadow bg-white bg-opacity-20 rounded ">
                    <p class="md:text-2xl text-xl pb-2">5. Перевод на карту Сбербанк:</p>
                    <p class="md:text-lg font-semibold text-sm">4276 4000 6721 5096</p>
                    <p class="md:text-lg font-semibold text-sm pb-4">Кузнецов Виктор Владимирович</p>
                    <p class="md:text-2xl text-xl pb-2">или на карту Альфа-банка:</p>
                    <p class="md:text-lg font-semibold text-sm">4790 8723 2938 9298</p>
                    <p class="md:text-lg font-semibold text-sm">Кузнецов Виктор Владимирович</p>
                    <div class="md:text-lg font-light text-sm">
                        <p>Выдаем кассовый чек</p>
                    </div>
                </div> -->
               
            </div>
        </div>

</section>
@endsection