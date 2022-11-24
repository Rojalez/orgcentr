@extends('frontend.layout.layout')
@section('title', 'Личный кабинет')
@section('content')
    <section class="md:px-8 px-3">
        <div class="py-8">
            <div class=" bg-white bg-opacity-30 flex flex-col space-y-4 shadow-2xl p-4 rounded">
                <div class="rounded-xl shadow-lg bg-white bg-opacity-50 max-w-full">
                    <div class="relative flex md:flex-row flex-col items-center justify-between p-3">
                        <div class="flex flex-col space-y-2 my-2">
                            <div class="flex flex-row bg-gray-100 bg-opacity-50 rounded-full shadow-lg space-x-1 md:mb-0 mb-4 items-center px-2">
                                <div class="w-12 h-12  flex items-center justify-center ">
                                    <i class="fal fa-user text-xl"></i>                            
                                </div>
                                <div class="text-center">
                                    <div class="font-medium text-base">{{$user->name}}</div>
                                </div>
                            </div>
                            <div class="flex flex-row bg-gray-100 bg-opacity-50 rounded-full shadow-lg space-x-1 md:mb-0 mb-4 items-center px-2">
                                <div class="w-12 h-12  flex items-center justify-center ">
                                    <i class="fal fa-envelope text-xl"></i>                            
                                </div>
                                <div class="text-center">
                                    <div class="font-medium text-sm">{{$user->email}}</div>
                                </div>
                            </div>
                            <div class="flex flex-row bg-gray-100 bg-opacity-50 rounded-full shadow-lg space-x-1 md:mb-0 mb-4 items-center px-2">
                                <div class="w-12 h-12  flex items-center justify-center ">
                                    <i class="fal fa-calendar text-xl"></i>                            
                                </div>
                                <div class="text-center">
                                    <div class="font-light text-xs">{{$user->created_at->format('d-m-y')}}</div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="flex md:flex-row flex-col md:space-x-4 space-x-0 md:space-y-0 space-y-4 text-sm">
                            <!--<a href="user/profile" class="flex flex-row hover:bg-opacity-50 text-gray-600 bg-white bg-opacity-30 rounded-sm p-2 items-center space-x-1">-->
                            <!--    <i class="fal fa-edit"></i>-->
                            <!--    <span>Редактировать профиль</span>-->
                            <!--</a>-->
                            <a href="/catalog" class="flex flex-row hover:bg-opacity-50 text-gray-600 bg-white bg-opacity-30 rounded-sm p-2 items-center space-x-1">
                                <i class="fal fa-arrow-left"></i>
                                <span>Вернуться к покупкам</span>
                            </a>
                          
                            <form action="{{route('logout')}}" class="" method='post'>
                                @csrf
                                <button class="flex flex-row hover:bg-opacity-50 md:w-auto w-full text-gray-600 bg-white bg-opacity-30 rounded-sm p-2 items-center space-x-1">
                                    <i class="fal fa-sign-out"></i>
                                    <span>Выйти</span>
                                </button>
                            </form>    

                        </div>
                    </div>
                    
                </div>
                {{-- <div class="rounded-xl shadow-lg bg-white bg-opacity-50 flex-auto">
                    <div class="relative border-b border-gray-300 flex items-center p-6">
                        <div class="mr-auto">
                            <div class="font-medium text-base"><i class="fal fa-shopping-bag text-xl mr-1"></i>История заказов</div>
                        </div>
                    </div>
                    <div class="flex flex-col p-5 space-y-4">
                        <ul uk-accordion class="">
                            @foreach ($orders as $order)
                            <li class="p-2 bg-white bg-opacity-30 rounded">
                               
                                <a class="uk-accordion-title " href="#">
                                    <div class="text-xs mt-2 grid gap-2 grid-cols-3">
                                        <div>{{$order->created_at->format('d-m-y')}}</div>
                                        <div>#{{$order->id}}</div>
                                        <div>
                                            @foreach (session()->get('products') as $product)
                                            {{$product->price*$product->count}}<span class="ml-1">руб.</span>
                                            @endforeach

                                        </div>
                                    </div>
                                </a>
                                <div class="uk-accordion-content">
                                   <div class="flex flex-col mt-2 space-y-3">
                                    @foreach (session()->get('products') as $product)
                                    <div class="text-xs bg-white bg-opacity-70 items-center break-words p-2 gap-4 grid grid-cols-4">
                                        <div>
                                            <a href="{{route('product', $product->id)}}">{{$product->name}}</a>
                                        </div>
                                        <div>Артикул  {{$product->art}}</div>
                                        <div>{{$product->count}}<span class="ml-1">шт.</span></div>
                                        <div>{{$product->price}}<span class="ml-1">руб.</span></div>
                                    </div>
                                    @endforeach
                                   </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
