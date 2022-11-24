@extends('frontend.layout.layout')
@section('title','Каталог')
@section('content')
<section class="md:px-8 px-3">
    <div class="flex lg:flex-row flex-col lg:space-x-4 space-x-0 lg:space-y-0 space-y-4">
        <div class="py-8 grid xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 grid-cols-1 gap-1 ">
            <a href="{{route('category', ['slug' => 'zapchasti-dlya-printerov'])}}" class="flex flex-row space-x-2 bg-white group bg-opacity-60 rounded hover:shadow-2xl  duration-150 ease-linear">
                <div class="p-2 w-1/4">
                    <img src="https://image.flaticon.com/icons/png/512/342/342366.png" alt="">
                </div>           
                <div class="flex w-3/4 items-center p-2">
                    <div class="font-bold max-w-max group-hover:text-blue-500 duration-200 ease-linear">Запчасти для принтеров</div>
                </div>  
            </a>
            <a href="{{route('category', ['slug' => 'chipy'])}}" class="flex flex-row space-x-2 bg-white group bg-opacity-60 rounded hover:shadow-2xl  duration-150 ease-linear">
            <div class="p-2 w-1/4" >
                    <img src="https://image.flaticon.com/icons/png/512/141/141007.png" alt="">
                </div>           
                <div class="flex w-3/4 items-center p-2">
                    <div class="font-bold max-w-max group-hover:text-blue-500 duration-200 ease-linear">Чипы</div>
                </div>  
            </a>
            <a href="{{route('category', ['slug' => 'kartridzhi'])}}" class="flex flex-row space-x-2 bg-white group bg-opacity-60 rounded hover:shadow-2xl  duration-150 ease-linear">
                <div class="p-2 w-1/4" >
                        <img src="https://image.flaticon.com/icons/png/512/1507/1507782.png" alt="">
                    </div>           
                    <div class="flex w-3/4 items-center p-2">
                        <div class="font-bold max-w-max group-hover:text-blue-500 duration-200 ease-linear">Картриджи</div>
                    </div>  
                </a>
                    <a href="{{route('category', ['slug' => 'zapchasti-dlya-kartridzhej'])}}" class="flex flex-row space-x-2 bg-white group bg-opacity-60 rounded hover:shadow-2xl  duration-150 ease-linear">
                        <div class="p-2 w-1/4" >
                                <img src="https://image.flaticon.com/icons/png/512/4143/4143106.png" alt="">
                            </div>           
                            <div class="flex w-3/4 items-center p-2">
                                <div class="font-bold max-w-max group-hover:text-blue-500 duration-200 ease-linear">Запчасти для картриджей</div>
                            </div>  
                        </a>
                        <a href="{{route('category', ['slug' => 'zapchasti-v-teh-upakovke'])}}" class="flex flex-row space-x-2 bg-white group bg-opacity-60 rounded hover:shadow-2xl  duration-150 ease-linear">
                            <div class="p-2 w-1/4" >
                                    <img src="https://image.flaticon.com/icons/png/512/3921/3921636.png" alt="">
                                </div>           
                                <div class="flex w-3/4 items-center p-2">
                                    <div class="font-bold max-w-max group-hover:text-blue-500 duration-200 ease-linear">Запчасти в тех.упаковке</div>
                                </div>  
                            </a>
                            <a href="{{route('category', ['slug' => 'tonery'])}}" class="flex flex-row space-x-2 bg-white group bg-opacity-60 rounded hover:shadow-2xl  duration-150 ease-linear">
                                <div class="p-2 w-1/4" >
                                        <img src="https://image.flaticon.com/icons/png/512/1763/1763181.png" alt="">
                                    </div>           
                                    <div class="flex w-3/4 items-center p-2">
                                        <div class="font-bold max-w-max group-hover:text-blue-500 duration-200 ease-linear">Тонеры</div>
                                    </div>  
                                </a>
                                <a href="{{route('category', ['slug' => 'zapravka-kartridzhej'])}}" class="flex flex-row space-x-2 bg-white group bg-opacity-60 rounded hover:shadow-2xl  duration-150 ease-linear">
                                    <div class="p-2 w-1/4" >
                                            <img src="https://image.flaticon.com/icons/png/512/2891/2891569.png" alt="">
                                        </div>           
                                        <div class="flex w-3/4 items-center p-2">
                                            <div class="font-bold max-w-max group-hover:text-blue-500 duration-200 ease-linear">Заправка картриджей</div>
                                        </div>  
                                    </a>
                                    <a href="{{route('repair')}}" class="flex flex-row space-x-2 bg-white group bg-opacity-60 rounded hover:shadow-2xl  duration-150 ease-linear">
                                        <div class="p-2 w-1/4" >
                                                <img src="https://image.flaticon.com/icons/png/512/712/712842.png" alt="">
                                            </div>           
                                            <div class="flex w-3/4 items-center p-2">
                                                <div class="font-bold max-w-max group-hover:text-blue-500 duration-200 ease-linear">Ремонт техники</div>
                                            </div>  
                                        </a>
    
        </div>
    </div>

</section>
@endsection