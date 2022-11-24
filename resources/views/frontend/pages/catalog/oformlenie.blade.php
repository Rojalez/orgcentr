@extends('frontend.layout.layout')
@section('title', 'Оформление заказа')
@section('content')
<section class="md:px-8 px-3 py-8">
    <div class="flex md:flex-row flex-col-reverse md:space-x-4 space-x-0  md:space-y-0 space-y-4 relative">
        <div class="flex flex-col space-y-4 md:w-3/4 w-full">
        <form action="/oformlenie" method="POSt" id="oformlenie">
            <div class="bg-opacity-60 rounded mb-4 p-2 md:mt-0 mt-4 bg-white w-full">
                <ul uk-accordion>
                    <li class="uk-open">
                        <a class="uk-accordion-title" href="#">Регион доставки</a>
                        <div class="uk-accordion-content">
                            <div class="flex flex-col py-2">
                                <label class="text-xs md:text-sm text-gray-800">Тип плательщика</label>
                                <select name="platelshik" id="" class="rounded-sm bg-white bg-opacity-60 focus:ring-0 border-0 focus:border-gray-700 text-xs md:text-sm ">
                                    <option value="">Физическое лицо</option>
                                    <option value="">Юр. лицо, ИП плательщики НДС</option>
                                    <option value="">Юр. лицо, ИП без НДС</option>
                                </select>
                            </div>
                            <div class="flex flex-col py-2">
                                <label class="text-xs md:text-sm text-gray-800">Город доставки</label>
                                <select name="gorod_dostavki" id="" class="rounded-sm bg-white bg-opacity-60 focus:ring-0 border-0 focus:border-gray-700 text-xs md:text-sm ">
                                    <option value="">Город 1</option>
                                    <option value="">Город 2</option>
                                    <option value="">Город 3</option>
                                </select>
                            </div>
                            {{-- <div class="py-2 w-full flex justify-end">
                                <button class="bg-green rounded-sm px-4 py-1 text-white">Далее</button>
                            </div> --}}
                        </div>
                    </li>
                </ul>
            </div>
            <div class="bg-opacity-60 mb-4 rounded p-2 bg-white w-full">
                <ul uk-accordion>
                    <li class="">
                        <a class="uk-accordion-title" href="#">Доставка</a>
                        <div class="uk-accordion-content">
                            <div class="flex flex-col py-2">
                                <label class="text-xs md:text-sm text-gray-800">Вид доставки</label>
                                <select name="vid_dostavki" id="" class="rounded-sm bg-white bg-opacity-60 focus:ring-0 border-0 focus:border-gray-700 text-xs md:text-sm ">
                                    <option value="">Самовывоз (бесплатно)</option>
                                    <option value="">Побыстрее, но подороже (до 1 дня)</option>
                                    <option value="">Подешевле, но подольше (до 3 дней)</option>
                                </select>
                            </div>                       
                        </div>
                    </li>
                </ul>
            </div>
            <div class="bg-opacity-60 mb-4 rounded p-2 bg-white w-full">
                <ul uk-accordion>
                    <li class="">
                        <a class="uk-accordion-title" href="#">Оплата</a>
                        <div class="uk-accordion-content">
                            <div class="flex flex-col">
                                <select name="vid_oplaty" id="" class="rounded-sm bg-white bg-opacity-60 focus:ring-0 border-0 focus:border-gray-700 text-xs md:text-sm ">
                                    <option value="">Банковcкий перевод</option>
                                    <option value="">Онлайн</option>
                                    <option value="">Банковcкой картой</option>
                                    <option value="">Наличными</option>
                                    <option value="">Перевод в Сбербанк</option>
                                    <option value="">Перевод в Альфа-Банк</option>

                                </select>
                            </div>                        </div>
                    </li>
                </ul>
            </div>
            <div class="bg-opacity-60 mb-4 rounded p-2 bg-white w-full">
                <ul uk-accordion>
                    <li class="">
                        <a class="uk-accordion-title" href="#">Покупатель</a>
                        <div class="uk-accordion-content">
                            <div class="flex flex-col py-2">
                                <label class="text-xs md:text-sm text-gray-800">ФИО</label>
                                <input name="fio" class="rounded-sm bg-white bg-opacity-60 focus:ring-0 border-0 focus:border-gray-700 text-xs md:text-sm " type="text">
                            </div>
                            <div class="flex flex-col py-2">
                                <label class="text-xs md:text-sm text-gray-800">Email</label>
                                <input name="email"  class="rounded-sm bg-white bg-opacity-60 focus:ring-0 border-0 focus:border-gray-700 text-xs md:text-sm " type="text">
                            </div>
                            <div class="flex flex-col py-2">
                                <label class="text-xs md:text-sm text-gray-800">Телефон</label>
                                <input name="phone"  class="rounded-sm bg-white bg-opacity-60 focus:ring-0 border-0 focus:border-gray-700 text-xs md:text-sm " type="text">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="bg-opacity-60 mb-4 rounded p-2 bg-white w-full">
                <ul uk-accordion>
                    <li class="">
                        <a class="uk-accordion-title" href="#">Товары в корзине</a>
                        <div class="uk-accordion-content">

                            <div>
                                <div class="lg:flex hidden flex-col overflow-x-auto space-y-2 p-2">
                                @if(session()->has('products'))
                                    @foreach (session()->get('products') as $product)
                                        <table  class="text-xs table-fixed">
                                            <tr class="bg-white bg-opacity-60 duration-150 ease-linear">
                                                <td class="p-2 w-1/6"><a href="{{route('product', $product->id)}}"><img src="{{$product->image}}" class="h-16 w-auto rounded" alt=""></a></td>
                                                <td class="p-2 w-2/6 font-semibold "><a href="{{route('product', $product->id)}}" class="hover:text-blue-600 duration-150 ease-linear">{{$product->name}}</a></td>
                                                <td class="p-2 w-1/6 font-bold">{{$product->price}}<span class="ml-1">руб./шт</span></td>
                                                <td class="p-2 w-1/6">        
                                                    <div class="number flex lg:flex-row flex-col lg:space-x-1 space-x-0 lg:space-y-0 space-y-1 items-center justify-center ">
                                                        <div  class="w-12 text-center focus:ring-0 text-xs rounded border-0 bg-gray-50 bg-opacity-30" type="text">{{$product->count}}</div>
                                                    </div>
                                                </td>
                                                <td class="p-2 w-1/6 font-bold">{{$product->price*$product->count}}<span class="ml-1">руб.</span></td>
                                            </tr>
                                        </table>
                                    @endforeach
                                @endif
                                </div>
                                <div class="lg:hidden grid grid-cols-1 gap-2 p-2 h-full">
                                @if(session()->has('products'))
                                    @foreach (session()->get('products') as $product)
                                    <div class="text-xs relative flex flex-col justify-between items-center hover:bg-gray-100 p-2 space-y-2 bg-gray-50 bg-opacity-30 hover:bg-opacity-40">
                                        <a href="{{route('product', $product->id)}}"><img class="h-auto w-auto" src="{{$product->image}}"  alt="{{$product->name}}"></a>
                                        <a href="{{route('product', $product->id)}}" class="text-xe text-center break-words px-2 w-full">{{$product->name}}</a>
                                        <b>{{$product->price}} <span>руб./шт</span></b>
                                        <div class="number flex flex-row space-x-1 items-center justify-center ">
                                            <div class="w-12 text-center focus:ring-0 text-xs rounded border-0 bg-gray-50 bg-opacity-30" type="text">{{$product->count}}</div>
                                        </div>
                                        <b>{{$product->price*$product->count}} <span>руб.</span></b>
                                    </div>
                                    @endforeach
                                @endif   
                                </div>
                            </div> 
                        </div>
                    </li>
                </ul>
            </div>
        </form>
        </div>
        
        <div class="md:sticky static md:top-16 md:max-h-60 md:w-1/4 w-full bg-white bg-opacity-30 rounded">
            <div class="w-full flex flex-row space-x-4 bg-white text-gray-700 bg-opacity-50 p-2 py-4 rounded-t justify-between items-center">
                <span class="font-bold">Ваш заказ</span>
                <a href="/basket"  class="text-green-600 text-sm">Изменить</a>
            </div>
            <div class="p-2">
                <div class="p-2 bg-white bg-opacity-60 rounded-t space-y-2 md:text-sm text-xs">
                    <div class="flex flex-row justify-between">
                        <span>Товаров на:</span>
                        <span><b> 
                    @php
                    $sum = 0;
                    @endphp                   
                    @if(session()->has('products'))
                    @foreach (session()->get('products') as $product)
                    @php
                      $sum+= (integer) $product->price * $product->count;
                    @endphp
                    @endforeach
                    {{$sum}}
                    @else
                    0
                    @endif</b> руб.</span>
                    </div>
                    <div class="flex flex-row justify-between">
                        <span>Доставка:</span>
                        <span class="text-green-600">Бесплатно</span>
                    </div>
                </div>
                <div class="p-2 bg-white bg-opacity-60 rounded-b md:text-xl flex flex-row justify-between tracking-tight text-lg">
                    <span class="font-semibold">Итого:</span>
                    <span><b>{{$sum}}</b> руб.</span>
                </div>
                <div class="lg:text-base text-sm  py-2 w-full">
                    <button form='oformlenie' class="hover:bg-green-500 uppercase min-w-full focus:outline-none bg-white bg-opacity-60 ring-1 ring-green-600 px-2 py-2 rounded text-green-600 tracking-tighter duration-150 ease-linear hover:text-white font-bold">Оформить заказ</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection