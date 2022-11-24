@extends('frontend.layout.layout')
@section('title', 'Корзина')
@section('content')
<section class="md:px-8 px-3 py-8">
    <div class="flex flex-col">
        <div class="w-full flex md:flex-row flex-col md:space-x-4 space-x-0  bg-white bg-opacity-60 p-2 rounded-t justify-between items-center">
            <div class="text-gray-600 lg:text-sm text-xs p-2 bg-gray-50 rounded bg-opacity-30">
                Товаров в корзине:
                <span id="count" class="ml-1">          
                    @if(session()->has('products'))
                    {{count(session()->get('products'))}}
                    @else
                    0
                    @endif
                </span>
            </div>
            <div class="flex p-2 lg:flex-row flex-col lg:space-y-0 space-y-2 lg:space-x-4 space-x-0 lg:text-left text-right lg:items-center items-end">
                <div class="flex flex-col space-y-1 lg:text-sm text-xs text-gray-600">
                @php
                $sum = 0;
                @endphp
                    <b class="md:block hidden">Итого: </b>
                    <span class="text-xs">Сумма НДС:<b class="px-1">0</b>руб.</span>
                </div>
                <div class="lg:text-xl lg:text-right text-center text-sm text-gray-800">
                    <b class="block md:hidden">Итого: </b>

                    <b id="sum" class="lg:px-2 ">
                    @if(session()->has('products'))
                    @foreach (session()->get('products') as $product)
                    @php
                      $sum+= (integer) $product->price * $product->count;
                    @endphp
                    @endforeach
                    {{$sum}}
                    @else
                    0
                    @endif 
                    </b>руб.
                </div>
                <div class="lg:text-sm text-xs">
                    <a href="/oformlenie" class="hover:bg-green-500 focus:outline-none bg-white bg-opacity-50 ring-1 ring-green-600 px-2 py-2 rounded text-green-600 tracking-tighter duration-150 ease-linear hover:text-white font-bold">Оформить заказ</a>
                </div>
            </div>
        </div>
        <div class="bg-opacity-30 rounded-b bg-white w-full">
                <div id="body2" class="lg:flex hidden flex-col overflow-x-auto space-y-2 p-2">
                    @if(session()->has('products'))
                        @foreach (session()->get('products') as $product)
                    <table  class="text-xs table-fixed">
                    
                        <tr class="bg-white bg-opacity-60 duration-150 ease-linear">
                            <td class="p-2 w-1/6"><a href="{{route('product', $product->id)}}"><img src="{{$product->image}}" class="h-16 w-auto rounded" alt=""></a></td>
                            <td class="p-2 w-2/6 font-semibold "><a href="{{route('product', $product->id)}}" class="hover:text-blue-600 duration-150 ease-linear">{{$product->name}}</a></td>
                            <td class="p-2 w-1/6 font-bold">{{$product->price}}<span class="ml-1">руб./шт</span></td>
                            <td class="p-2 w-1/6">        
                                <div class="number flex lg:flex-row flex-col lg:space-x-1 space-x-0 lg:space-y-0 space-y-1 items-center justify-center ">
                                    <div data-id="{{$product->id}}" class="minus bg-white bg-opacity-30 self-center rounded text-gray-600 px-2 py-2"><i class="fa fa-minus" aria-hidden="tdue"></i></div>
                                    <div  class="w-12 text-center focus:ring-0 text-xs rounded border-0 bg-gray-50 bg-opacity-30" type="text">{{$product->count}}</div>
                                    <div data-id="{{$product->id}}" class="plus bg-white bg-opacity-30 rounded text-gray-600 px-2 py-2"><i class="fa fa-plus" aria-hidden="tdue"></i></div>
                                </div>
                            </td>
                            <td class="p-2 w-1/6 font-bold">{{$product->price*$product->count}}<span class="ml-1">руб.</span></td>
                            <td class="p-2 w-1/6 font-bold"><button data-id="{{$product->id}}" class="focus:outline-none delete"><i class="fal fa-times"></i></button></td>
                        </tr>
    
                    </table>
                    @endforeach
                    @endif
                </div>
                <div id="body1" class="lg:hidden grid grid-cols-1 gap-2 p-2 h-full">
                @if(session()->has('products'))
                    @foreach (session()->get('products') as $product)
                    <div class="text-xs relative flex flex-col justify-between items-center hover:bg-gray-100 p-2 space-y-2 bg-gray-50 bg-opacity-30 hover:bg-opacity-40">
                        <a href="{{route('product', $product->id)}}"><img class="h-auto w-auto" src="{{$product->image}}"  alt="{{$product->name}}"></a>
                        <a href="{{route('product', $product->id)}}" class="text-xe text-center break-words px-2 w-full">{{$product->name}}</a>
                        <b>{{$product->price}} <span>руб./шт</span></b>
                        <div class="number flex flex-row space-x-1 items-center justify-center ">
                            <div data-id="{{$product->id}}" class="minus bg-white bg-opacity-30 self-center rounded text-gray-600 px-2 py-2"><i class="fa fa-minus" aria-hidden="tdue"></i></div>
                            <div class="w-12 text-center focus:ring-0 text-xs rounded border-0 bg-gray-50 bg-opacity-30" type="text">{{$product->count}}</div>
                            <div data-id="{{$product->id}}" class="plus bg-white bg-opacity-30 rounded text-gray-600 px-2 py-2"><i class="fa fa-plus" aria-hidden="tdue"></i></div>
                        </div>
                        <b>{{$product->price*$product->count}} <span>руб.</span></b>
                        <button data-id="{{$product->id}}" class="focus:outline-none py-2 delete text-gray-600 hover:text-blue-700 duration-150"><i class="far fa-times mr-1"></i>Удалить</button>
                    </div>
                    @endforeach
                @endif   
              
                </div>
  
        </div>
    </div>
</section>

<script>
        
  		$('body').on('click','.plus' ,function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: "/basket/to/"+id,
            success: function (data) {
                result(data);
            },
        });
		});


      $('body').on('click','.minus' ,function() {
				$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: "/basket/from/"+id,
            success: function (data) {
                result(data);
            },
        });
			});


      $('body').on('click','.delete' ,function() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: "/basket/delete/"+id,
            success: function (data) {
                result(data);
            },
        });
			});


      function result(data) {
        var count = Object.keys(data);
        var sum = 0;
        var body1 = '';
        var body2 = '';

        for (var i = 0; i < count.length; i++) {
            sum += data[count[i]].price * data[count[i]].count;

          body1+= '<div class="text-xs relative flex flex-col justify-between items-center hover:bg-gray-100 p-2 space-y-2 bg-gray-50 bg-opacity-30 hover:bg-opacity-40">'+
                        '<img class="h-auto w-auto" src="'+data[count[i]].image+'"  alt="'+data[count[i]].name+'">'+
                        '<span class="text-xe text-center break-words px-2 w-full">'+data[count[i]].name+'</span>'+
                        '<b>'+data[count[i]].price+' <span>руб./шт</span></b>'+
                        '<div class="number flex flex-row space-x-1 items-center justify-center ">'+
                            '<div data-id="'+data[count[i]].id+'" class="minus bg-white bg-opacity-30 self-center rounded text-gray-600 px-2 py-2"><i class="fa fa-minus" aria-hidden="tdue"></i></div>'+
                            '<div class="w-12 text-center focus:ring-0 text-xs rounded border-0 bg-gray-50 bg-opacity-30" type="text">'+data[count[i]].count+'</div>'+
                            '<div data-id="'+data[count[i]].id+'" class="plus bg-white bg-opacity-30 rounded text-gray-600 px-2 py-2"><i class="fa fa-plus" aria-hidden="tdue"></i></div>'+
                        '</div>'+
                        '<b>'+data[count[i]].price * data[count[i]].count+' <span>руб.</span></b>'+
                        '<button data-id="'+data[count[i]].id+'" class="focus:outline-none py-2 delete text-gray-600 hover:text-blue-700 duration-150"><i class="far fa-times mr-1"></i>Удалить</button>'+
                    '</div>';

          body2+= '<table class="text-xs table-fixed">'+
                            '<tr class="bg-white bg-opacity-60 duration-150 ease-linear">'+
                            '<td class="w-1/6 p-2"><a href="/product/'+data[count[i]].id+'"><img src="'+data[count[i]].image+'" class="h-16 w-auto rounded" alt="'+data[count[i]].name+'"></a></td>'+
                            '<td class="w-2/6 p-2 font-semibold "><a href="'+data[count[i]].id+'" class="hover:text-blue-600 duration-150 ease-linear">'+data[count[i]].name+'</a></td>'+
                            '<td class="w-1/6 p-2 font-bold">'+data[count[i]].price+'<span class="ml-1">руб./шт</span></td>'+
                            '<td class="w-1/6 p-2">'+        
                                '<div class="number flex lg:flex-row flex-col lg:space-x-1 space-x-0 lg:space-y-0 space-y-1 items-center justify-center ">'+
                                    '<div data-id="'+data[count[i]].id+'" class="minus bg-white bg-opacity-30 self-center rounded text-gray-600 px-2 py-2"><i class="fa fa-minus" aria-hidden="tdue"></i></div>'+
                                    '<div  class="w-12 text-center focus:ring-0 text-xs rounded border-0 bg-gray-50 bg-opacity-30" type="text">'+data[count[i]].count+'</div>'+
                                    '<div data-id="'+data[count[i]].id+'" class="plus bg-white bg-opacity-30 rounded text-gray-600 px-2 py-2"><i class="fa fa-plus" aria-hidden="tdue"></i></div>'+
                                '</div>'+
                            '</td>'+
                            '<td class="w-1/6 p-2 font-bold">'+data[count[i]].price * data[count[i]].count+'<span class="ml-1">руб.</span></td>'+
                            '<td  class="p-2 font-bold"><button data-id="'+data[count[i]].id+'" class="focus:outline-none delete"><i class="fal fa-times"></i></button></td>'+
                        '</tr>'+
                        '</table>';
        }
      

        $('#body1').html(body1);
        $('#body2').html(body2);
        $('#count').text(count.length);
        $('#sum').text(sum);

      }

  </script>
@endsection