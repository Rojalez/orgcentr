@extends('frontend.layout.layout')
@section('title','Результаты поиска')
@section('head')
    <link rel="stylesheet" href="{{asset('css/ion.rangeSlider.min.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/ion.rangeSlider.min.js')}}"></script>
    <style>
        .irs-bar,
        .irs-from,
        .irs-to
       {
            background: rgb(0, 140, 255) !important;
        }
        .irs-handle i{
            background: rgb(0, 140, 255) !important;
        }
    
    </style>
@endsection
<style>
    .hide-title{
    display: none;
    background: transparent !important;
}

</style>
@section('content')
<section class="md:px-8 px-3 lg:py-8 py-3 flex lg:flex-row flex-col lg:space-x-2 space-x-0 lg:space-y-0 space-y-2">
    <div class="lg:w-1/4 w-full">
    <form action="/result" method="GET" >
        <input type="hidden" name="title" value="{{$title}}">
        <div class="flex flex-col space-y-1">
            <select id="category" name="category" value="{{$category}}" class="text-xs focus:ring-0 border-0 rounded bg-white bg-opacity-50">
                <option value="">Все</option>
                @foreach($categories as $category2)
                    <option @if($category == $category2->id) selected='selected' @endif value="{{$category2->id}}">{{$category2->name}}</option>
                @endforeach
            </select>
        <select id="priceFilter" name="priceFilter" class="text-xs focus:ring-0 border-0 rounded bg-white bg-opacity-50">
            <option @if($priceFilter == 'asc') selected='selected' @endif value="asc"> Цена по возрастанию</option>
            <option @if($priceFilter == 'desc') selected='selected' @endif value="desc">Цена по убыванию </option>
        </select>
        <div class="flex text-xs py-2 justify-between rounded pl-3 pr-2 bg-white bg-opacity-50 flex-row space-x-1">
            <label for="exists">Только в наличии</label>
            <input  name="nalichie" type="checkbox" @if($nalichie == 'on') checked @endif class="rounded text-blue-500 border-0 focus:ring-0 focus:outline-none" id="nalichie">
        </div>
            
        </div>
        <div class="bg-white bg-opacity-30 p-2 mt-2 rounded w-full">
            <div class="flex py-2 px-2 flex-col">
                <input type="text" id='js-range-slider' name="my_range" value=""
                data-type="double"
                data-min="0"
                data-max="200000"
                data-from="{{$price_from}}"
                data-to="{{$price_to}}"
                data-grid="true"
            />
        
            </div>
            <ul uk-accordion class="bg-white bg-opacity-60 rounded">
                <li class="p-2">
                    <a class="uk-accordion-title" href="#"><span class="text-xs">OEM-Бренд</span></a>
                    <div class="uk-accordion-content">
                    @foreach ($brands as $brand2)
                        <div class="flex text-xs py-2 rounded justify-between pl-3 pr-2 bg-white bg-opacity-50 flex-row space-x-1">
                            <label for="brand{{$brand2->brand}}">{{$brand2->brand}}</label>
                            <input type="checkbox" @if($brand != null && in_array($brand2->brand, $brand)) checked @endif value="{{$brand2->brand}}" class="rounded brand text-blue-500 border-0 focus:ring-0 focus:outline-none" name="brands[]" id="brand{{$brand2->brand}}">
                        </div>
                    @endforeach
                    </div>
                </li>
            </ul>
            <div class="flex mt-1 flex-row space-x-2 text-xs">
                <button type="submit" class="px-2 py-1 w-full bg-blue-600 hover:bg-blue-700 duration-150 ease-linear text-white rounded-sm focus:outline-none">Применить</button>
                <button type="button" id="sbros" class="px-2 py-1 w-full bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-sm duration-150 ease-linear focus:outline-none">Сбросить</button>
    
            </div>
        </div>
    </form>
    </div>
    <div class="lg:w-3/4 w-full bg-white bg-opacity-40 rounded">
        <div class="lg:flex hidden flex-col overflow-x-auto space-y-2 p-2">
            @foreach ($products as $product)
            <table class="text-xs table-fixed">
            
            <tr class="bg-white bg-opacity-60 hover:bg-opacity-30 duration-150 ease-linear">
                <td class="p-2 text-xe text-center font-light w-1/6">{{$product->art}}</td>
                <td class="p-2 w-1/6"><a href="{{route('product', $product->id)}}"><img src="{{asset($product->image)}}" class="h-16 w-auto rounded" alt="{{$product->name}}"></a></td>
                <td class="p-2 w-2/6 font-semibold "><a href="{{route('product', $product->id)}}" class="hover:text-amber-600 duration-150 ease-linear">{{$product->name}}</a></td>
                <td class="p-2 w-1/6 font-bold">{{$product->price}}<span class="ml-1">руб./шт</span></td>
                <td class="p-2 w-1/6">
                @if(session()->has('products') && array_key_exists($product->id,session()->get('products')))
                    <button data-id="{{$product->id}}" class="rounded plus has-{{$product->id}} bg-green-700 text-gray-50 py-1 px-4 font-bold focus:outline-none">В корзинe<i class="far fa-check ml-1"></i></button>
                    <button data-id="{{$product->id}}" class="rounded plus hasnt-{{$product->id}} bg-blue-700 text-white py-1 px-4 font-bold focus:outline-none hidden">В корзину</button>
                @else 
                    <button data-id="{{$product->id}}" class="rounded plus has-{{$product->id}} bg-green-700 text-gray-50 py-1 px-4 font-bold focus:outline-none hidden">В корзинe<i class="far fa-check ml-1"></i></button>
                    <button data-id="{{$product->id}}" class="rounded plus hasnt-{{$product->id}} bg-blue-700 text-white py-1 px-4 font-bold focus:outline-none">В корзину</button>
                @endif    
                </td>
            </tr>
            
            </table>
            @endforeach
            {{ $products->links() }}
        </div>
        <div class="lg:hidden grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-2 gap-2 p-2">
            @foreach ($products as $product)
            <div class="showhim text-xs relative flex flex-col justify-between items-center hover:bg-gray-100 p-2 space-y-2 bg-gray-50 bg-opacity-30">
                <a href="{{route('product', $product->id)}}"><img class="h-auto w-auto" src="{{$product->image}}"  alt="{{$product->name}}"></a>
                <a href="{{route('product', $product->id)}}" class="text-xe text-center break-words px-2 w-full">{{$product->name}}</a>
                <b>{{$product->price}} <span>руб.</span></b>
                @if($product->nalichie != 0)
                <span class="text-xs text-gray-700"><i class="fas fa-check text-green mr-1"></i> В наличии</span>
                @else 
                <span class="text-xs text-gray-700"><i class="fas fa-check text-green mr-1"></i> В наличии нет</span>
                @endif
                @if(session()->has('products') && array_key_exists($product->id,session()->get('products')))
                    <button data-id="{{$product->id}}" class="rounded plus has-{{$product->id}} bg-green-700 text-gray-50 py-1 px-4 font-bold focus:outline-none">В корзинe<i class="far fa-check ml-1"></i></button>
                    <button data-id="{{$product->id}}" class="rounded plus hasnt-{{$product->id}} bg-blue-700 text-white py-1 px-4 font-bold focus:outline-none hidden">В корзину</button>
                @else 
                    <button data-id="{{$product->id}}" class="rounded plus has-{{$product->id}} bg-green-700 text-gray-50 py-1 px-4 font-bold focus:outline-none hidden">В корзинe<i class="far fa-check ml-1"></i></button>
                    <button data-id="{{$product->id}}" class="rounded plus hasnt-{{$product->id}} bg-blue-700 text-white py-1 px-4 font-bold focus:outline-none">В корзину</button>
                @endif   
            </div>
            @endforeach
            
        </div>
       <div class="p-2 lg:hidden block">
        {{ $products->links() }}
       </div>
</div>

</section>
<script>
    $("#js-range-slider").ionRangeSlider();

    $('#sbros').click(function () {
        $('#category').val('');
        $('#nalichie').removeAttr('checked');
        $('.brand').removeAttr('checked');
    });


</script>
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