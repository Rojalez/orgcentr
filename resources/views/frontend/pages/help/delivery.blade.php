@extends('frontend.layout.layout')
@section('title','Доставка')
@section('content')
<section class="md:px-8 px-3">
   
        <div class="py-8">
            <h2 class="md:text-3xl flex items-center justify-center text-xl font-bold text-blue-grey-900 uppercase">Доставляем по всей России</h2>
            <h4 class="md:text-2xl pt-5 flex items-center justify-center text-lg font-bold text-blue-grey-700 uppercase">С нами доставка очень простая:</h4>
            <div class="grid md:grid-cols-1 grid-cols-1 my-10 gap-4 items-center">
                @foreach ($deliveries as $delivery )
                <div class="p-6 font-bold text-gray-700 shadow w-auto bg-white bg-opacity-20 rounded">
                    <p class="md:text-2xl text-xl pb-4">{{$delivery->title}}</p>
                    {!!$delivery->text!!}
                    {{-- <p class="md:text-lg font-semibold text-sm">Самовывоз - бесплатно</p>
                    <div class="md:text-lg font-light text-sm">
                        <span>Адрес:</span>
                        <p>г.Химки, ул.Коммунистическая, д.4, оф.18, 8-499-685-44-30</p>
                    </div> --}}
                </div>
                @endforeach
                
             
                {{-- <div class="p-6 font-bold text-gray-700 shadow w-auto bg-white bg-opacity-20 rounded ">
                    <p class="md:text-2xl text-xl pb-4">2 вариант</p>
                    <p class="md:text-lg font-semibold text-sm">Побыстрее, но подороже (до 1 дня)</p>
                    <div class="md:text-lg font-light text-sm">
                        <p>-В пределах МКАД - 490р.</p>
                        <p>-За МКАД - 490р + 20р за 1 км</p>
                    </div>
                </div>
                <div class="p-6 font-bold text-gray-700 shadow w-auto bg-white bg-opacity-20 rounded ">
                    <p class="md:text-2xl text-xl pb-4">3 вариант</p>
                    <p class="md:text-lg font-semibold text-sm">Подешевле, но подольше (до 3 дней)</p>
                    <div class="md:text-lg font-light text-sm">
                        <p>-Транспортной компанией (мы сообщим вам срок и стоимость доставки)</p>
                    </div>
                </div> --}}
               
            </div>
        </div>

</section>
@endsection