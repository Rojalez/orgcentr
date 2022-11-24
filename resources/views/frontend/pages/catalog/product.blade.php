@extends('frontend.layout.layout')
@section('title', $product->name)
@section('content')
<section class="md:px-8 px-3 py-8">
    <div class="bg-white flex lg:flex-row flex-col lg:space-x-2 space-x-0 lg:space-y-0 space-y-2 bg-opacity-30 rounded w-full p-2">
       <div class="lg:w-1/3 w-full showhim">
            <a class="relative h-96 w-96" href="#modal-center" uk-toggle>
                <img class="h-full w-full rounded lg:mx-0 mx-auto" src="{{asset($product->image)}}" alt="">
            </a>
            <div id="modal-center" class="uk-flex-top " uk-modal>
                <div class="uk-modal-dialog rounded uk-width-auto uk-margin-auto-vertical">

                    <button class="uk-modal-close-default" type="button" uk-close></button>

                    <img class="h-auto w-full rounded mx-auto" src="{{asset($product->image)}}" alt="">

                </div>
            </div>
        </div>
       <div class="lg:w-2/3 w-full ">
       

            <div class="flex flex-col py-4 lg:items-start items-center space-y-4">
                <div class="lg:text-xs text-xs font-light text-gray-600">Артикул: <span class="ml-1">{{$product->art}}</span></div>
                <div class="lg:text-base text-sm font-semibold lg:text-left text-center">{{$product->name}}</div>
                <div class="border-b border-gray-400"></div>
                <div class="lg:text-2xl text-xl font-bold">{{$product->price}} руб./шт</div>
                @if($product->nalichie != 0)
                <a  class="text-sm text-gray-700"><i class="far fa-check text-green-500 mr-1"></i> <span class="hover:text-gray-900 border-b border-dotted border-gray-900">В наличии</span></a>
                @else 
                <a  class="text-sm text-gray-700"><i class="far fa-times-circle text-gray-500 mr-1"></i> <span class="hover:text-gray-900 border-b border-dotted border-gray-900">Нет в наличии</span></a>
                @endif
                <div class=" flex md:flex-row flex-col md:space-x-2 space-x-0 space-y-2 md:space-y-0">
                    @if(session()->has('products') && array_key_exists($product->id,session()->get('products')))
                    <button data-id="{{$product->id}}" class="rounded plus has-{{$product->id}} bg-green-700 text-gray-50 py-1 px-4 font-bold focus:outline-none">В корзинe<i class="far fa-check ml-1"></i></button>
                    <button data-id="{{$product->id}}" class="rounded plus hasnt-{{$product->id}} bg-blue-700 text-white py-1 px-4 font-bold focus:outline-none hidden">В корзину</button>
                @else 
                    <button data-id="{{$product->id}}" class="rounded plus has-{{$product->id}} bg-green-700 text-gray-50 py-1 px-4 font-bold focus:outline-none hidden">В корзинe<i class="far fa-check ml-1"></i></button>
                    <button data-id="{{$product->id}}" class="rounded plus hasnt-{{$product->id}} bg-blue-700 text-white py-1 px-4 font-bold focus:outline-none">В корзину</button>
                @endif   

                </div>
            </div>
            
       </div>
    </div>

    <div class="my-8 bg-white bg-opacity-30 shadow-2xl rounded">
        <ul class="uk-subnav uk-subnav-pill overflow-x-auto w-full" uk-switcher>
            {{-- <li class="font-bold lg:text-sm text-xs"><a class="duration-200 ease-linear" href="#">Наличие</a></li> --}}
            <li class="font-bold lg:text-sm text-xs"><a class="duration-200 ease-linear" href="#">Характеристики</a></li>
        </ul>
        <ul class="uk-switcher">
            {{-- <li class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                
            </li> --}}
            <li class="">
                <ul class="flex flex-col space-y-2">
                    <li class="flex flex-row justify-between items-center space-x-4 text-gray-600 text-xs">
                        <div class="">Производитель</div>
                        <div class="w-full border-b border-dotted border-gray-400"></div>
                        <div class="text-right">{{$product->brand}}</div>
                    </li>
                    <li class="flex flex-row justify-between items-center space-x-4 text-gray-600 text-xs">
                        <div class="">Принтеры номенклатуры</div>
                        <div class="w-full border-b border-dotted border-gray-400"></div>
                        <div class="text-right">
                        @if ($product->description != null)
                            {{$product->description}}
                        @else 
                            {{$product->name}}
                        @endif
                        </div>
                    </li>
                </ul>
            </li>
    
        </ul>
    </div>
</section>
<script>
    $('.plus').click(function () {
        var id = $(this).attr('data-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/basket/to/"+id,
            success: function (data) {
                var count = Object.keys(data);
                $('#basket-link').html('<a class="relative text-white dark:text-gray-200 items-center flex flex-row space-x-2 hover:text-blue-500" href="/basket">'+
                '<i class="far fa-shopping-cart text-xl"></i>'+
                '<span class="font-semibold md:block hidden text-sm">Корзина</span>'+
                '<span class="absolute bottom-3 left-0 h-4 w-4 font-normal ring-2  ring-white ring-opacity-20 text-center text-xs text-white bg-blue-500 rounded-full"><small id="basket-count">'+count.length+'</small></span></a>');
                $('.has-'+id).removeClass('hidden');
                $('.hasnt-'+id).addClass('hidden');
            },
        });
    });
</script>
@endsection