@extends('frontend.layout.layout')
@section('title','Контактная информация')
@section('content')
<div class="w-full h-96">
    <iframe class="min-w-full min-h-full " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2237.296786111418!2d37.44223841589683!3d55.89221198869861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b538f7c9dc2ae1%3A0x45ff20a3b631c0f5!2z0JrQvtC80LzRg9C90LjRgdGC0LjRh9C10YHQutCw0Y8g0YPQuy4sIDQsIDE4LCDQpdC40LzQutC4LCDQnNC-0YHQutC-0LLRgdC60LDRjyDQvtCx0LsuLCDQoNC-0YHRgdC40Y8sIDE0MTQwMg!5e0!3m2!1sru!2skg!4v1623349422238!5m2!1sru!2skg" style="border:0;" allowfullscreen="" loading="lazy"></iframe>            
</div>
    <section class="md:px-8 px-3 py-8">
        <div class="bg-white p-6 font-bold text-gray-800 flex flex-col justify-between shadow md:items-center rounded bg-opacity-20">
            <p>г.Химки, ул.Коммунистическая, д.4, оф.18, 8-499-685-44-30</p>
            <div class="flex flex-col md:flex-row text-sm font-light">
                <p class="mr-1">Время работы:</p>
                <p>пн-сб 9:00-18:00, вс - дежурный мастер</p>
            </div>
<div class="text-left space-y-2">
    <div class="text-gray-700 flex flex-row items-center space-x-1 text-sm font-bold tracking-tighter">
        <span>Юр.лица</span>
        <i class="far fa-envelope"></i>
         <a href="mailto:agalakov@orgcentr5.ru">agalakov@orgcentr5.ru</a>
     </div>
     <div class="text-gray-700 flex flex-row items-center space-x-1 text-sm font-bold tracking-tighter">
        <span>Физ.лица</span>
        <i class="far fa-envelope"></i>
         <a href="mailto:5143126@bk.ru">5143126@bk.ru</a>
     </div>
     <div class="flex flex-col space-y-2">
        <a href="tel:8(499)6854430" class="text-gray-700 text-sm font-bold tracking-tighter"><span>Юр.лица</span><i class="fal fa-phone-alt mx-2"></i>8(499)685 44 30</a>
        <a href="https://wa.me/+79262680370" target="_blank" class="text-gray-700 flex flex-row items-center space-x-1 text-sm font-bold tracking-tighter">
            <span>Юр.лица</span>
            <i class="fal fa-phone-alt px-1"></i> 
            <span>8(926)268 03 70</span>
            <img src="{{asset('img/social/whatsapp.svg')}}" class="w-4 h-4" alt="">
        </a>
        <a href="https://wa.me/+74955143126" target="_blank" class="text-gray-700 flex flex-row items-center space-x-1 text-sm font-bold tracking-tighter">
            <span>Физ.лица</span>
            <i class="fal fa-phone-alt px-1"></i> 
            <span>8(495)514 31 26</span>
            <img src="{{asset('img/social/whatsapp.svg')}}" class="w-4 h-4" alt="">
        </a>
    </div>
</div>
        </div>
    </section>
@endsection