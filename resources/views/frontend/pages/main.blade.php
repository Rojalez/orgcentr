@extends('frontend.layout.layout')
@section('title', 'Orgcentr5')
<style>
    .hide-title{
        display: none;
        background: transparent !important;
    }
    .ti-cursor{
        display: none !important;
    }
</style>
@section('content')
<section class="md:px-8 px-3">
    <div class="py-2">
        <h1 class="md:text-4xl text-lg text-blue-grey-900 font-black text-center"><span class="">ORGCENTR</span> - это сервис, запчасти и все комплектующие!</h1>
    </div>
    {{-- <h2 class="md:text-4xl text-lg text-blue-grey-900 font-black text-center py-2">РАБОТАТЬ ИМЕННО С <span class="text-amber-800">ORGCENTR</span> ВЫГОДНЕЕ, ЭТО ФАКТ!</h2> --}}
        <div class="js-promo py-4">
        <div class="hidden">
            <h2 class="js-promo-first-string">РАБОТАТЬ ИМЕННО С <span class="md:text-4xl text-xl">ORGCENTR</span> ВЫГОДНЕЕ, ЭТО ФАКТ!</h2>
        </div>
        <div class="js-promo-hero md:text-3xl text-lg text-blue-grey-900 font-black text-center">
            <div class="js-promo-caption"></div>
            <div class="js-promo-text"></div>
        </div>
    </div>
    <div class=" bg-white bg-opacity-10 rounded-xl mx-auto my-6 max-w-5xl">
        <h4 class="md:text-3xl text-xl py-3 font-bold bg-white bg-opacity-40 rounded-t-md text-blue-grey-800 text-center">3 наших простых правила работы «под ключ»</h4>
        <div class="grid md:grid-cols-3 grid-cols-1 p-3 gap-4">
            <div class="p-2 rounded-md bg-white text-center bg-opacity-30">
                <p class="border-b-2 border-yellow-400 max-w-max mx-auto md:text-xl text-lg font-bold text-blue-grey-800">Всегда делаем дешевле</p>
                <p class="md:text-sm text-xs py-4 text-center">Если цена вас не устроила покажите счёт или КП от ваших поставщиков, мы сделаем ещё дешевле и заморозим эти цены для вас.</p>
            </div>
            <div class="p-2 rounded-md bg-white text-center bg-opacity-30"> 
                <p class="border-b-2 border-yellow-400 max-w-max mx-auto md:text-xl text-lg font-bold text-blue-grey-800">Принцип 1-го окна</p>
                <p class="md:text-sm text-xs py-4 text-center">Абсолютно весь ваш запрос на запчасти, расходник и сервис - исполним мы. (Не надо искать и заказывать у нескольких поставщиков.)</p> 
            </div>
            <div class="p-2 rounded-md bg-white text-center bg-opacity-30">
                <p class="border-b-2 border-yellow-400 max-w-max mx-auto md:text-xl text-lg font-bold text-blue-grey-800">Постоплата</p>
               <p class="md:text-sm text-xs py-4 text-center">Сначала привозим расходники, запчасти и делаем ремонт - потом вы платите. 
                Постоплата для всех до 50000 и для больших клиентов (от 50 устройств в вашей организации) до 300000 до 1 месяца. </p>
            </div>
        </div>
    </div>

    <div class=" bg-white bg-opacity-20 rounded-md space-y-1 text-center max-w-5xl items-center mx-auto my-6 p-3">
            <h4 class="md:text-2xl text-xl py-3 font-bold text-blue-grey-800">Кроме того с нами удобно работать потому, что:</h4>
            <div class="flex flex-col space-y-2 ">
                <p class="md:text-sm text-xs ">-Безнал с НДС и без</p>
                <p class="md:text-sm text-xs">-Личный менеджер, который не задает глупых вопросов и помогает в любой ситуации</p>
            </div>

    </div>


    {{-- <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 8:2; animation: push; autoplay: true; pause-on-hover: true" >
        <ul class="uk-slideshow-items shadow-xl lg:h-auto h-64 rounded">
            <li class="rounded">
                <img src="https://getuikit.com/docs/images/photo.jpg" uk-cover alt="">
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom text-white lg:text-sm text-xs">
                    <h3 class="uk-margin-remove lg:text-2xl text-xl font-black">Всегда делаем дешевле.</h3>
                    <p class="uk-margin-remove">Если цена вас не устроила покажите счёт или КП от ваших поставщиков, мы сделаем ещё дешевле и заморозим эти цены для вас.</p>
                </div>
            </li>
            <li class="rounded">
                <img src="https://getuikit.com/docs/images/dark.jpg" uk-cover alt="">
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom text-white lg:text-sm text-xs">
                    <h3 class="uk-margin-remove lg:text-2xl text-xl font-black">Принцип 1-го окна.</h3>
                    <p class="uk-margin-remove">Абсолютно весь ваш запрос на запчасти, расходник и сервис - исполним мы.</p>
                </div>
            </li>
            <li class="rounded"> 
                <img src="https://getuikit.com/docs/images/light.jpg" uk-cover alt="">
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom text-white lg:text-sm text-xs">
                    <h3 class="uk-margin-remove lg:text-2xl text-xl font-black">Сначала привозим расходники, запчасти и делаем ремонт - потом вы платите. </h3>
                    <p class="uk-margin-remove">Постоплата для всех до 50 000 и для больших клиентов (от 50 устройств в вашей организации) до 300 000 до 1 месяца.</p>
                </div>
            </li>
            <li class="rounded"> 
                <img src="https://cdn.pixabay.com/photo/2020/01/26/20/14/computer-4795762_1280.jpg" uk-cover alt="">
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom text-white lg:text-sm text-xs">
                    <h3 class="uk-margin-remove lg:text-2xl text-xl font-black">Кроме того с нами удобно работать потому-что:</h3>
                    <p class="uk-margin-remove">-Безнал с НДС и без
                    </p>
                    <p class="uk-margin-remove">-Личный менеджер, который не задает глупых вопросов и помогает в любой ситуации</p>
                </div>
            </li>
        </ul>
    </div> --}}
    <div class="text-3xl font-bold text-gray-800 my-8 text-center">Как начать с нами работать:</div>
    <div class="my-8 grid lg:grid-cols-3 grid-cols-1 max-w-5xl mx-auto  gap-4 justify-around">
        <div class="flex flex-col space-y-4  items-center">
            <img src="https://image.flaticon.com/icons/png/512/1256/1256652.png" class="h-28 w-28" alt="">
            <p class="text-center max-w-xs text-xs font-normal text-gray-700">
                <b class="text-gray-800 text-xl">1 вариант:</b> <br> 
                Позвоните по номеру <a href="tel:84996854430">8-499-685-44-30</a> или <a href="tel:89267662221">8-926-766-22-21</a> напрямую личному менеджеру.
        </div>
        <div class="flex flex-col space-y-4 items-center">
            <img src="https://image.flaticon.com/icons/png/512/937/937552.png" class="h-28 w-28" alt="">
            <p class="text-center max-w-xs text-xs font-normal text-gray-700">
                <b class="text-gray-800 text-xl">2 вариант:</b> <br> 
                Напишите в WhatsApp по номеру <a href="https://wa.me/+74955143126">8-495-514-31-26</a>
            </div>
        <div class="flex flex-col space-y-4  items-center">
            <img src="https://image.flaticon.com/icons/png/512/891/891581.png" class="h-28 w-28" alt="">
            <p class="text-center max-w-xs text-xs font-normal text-gray-700">
                <b class="text-gray-800 text-xl">3 вариант:</b> <br> 
                Выберите нужные вам товары> закиньте товары в корзину>сделайте заказ. С вами свяжется персональный менеджер и предложит отличные цены на выбранный вами товар, и если вас все устроит, то заморозим цены и привезем все в короткие сроки.</p>
        </div>

       
    </div>

        {{-- <div class="promo js-promo py-4 my-8 flex items-center justify-center rounded shadow-xl flex-col h-full max-h-48 bg-white bg-opacity-30">
            <div class="promo__strings hidden">
                  
                <span class="js-promo-first-string">1 вариант: Выберите нужные вам товары > закиньте товары в корзину >сделайте заказ.</span>
                <span class="js-promo-second-string">С вами свяжется персональный менеджер и предложит отличные цены на выбранный вами товар и если вас все устроит, то заморозим цены и привезем все в короткие сроки.</span>  
        
                <span class="js-promo-first-string">2 вариант: Позвоните по номеру 8-499-685-44-30 или </span>
                <span class="js-promo-second-string">8-926-766-22-21 напрямую личному менеджеру.</span>  
        
                <span class="js-promo-first-string">3 вариант: Напишите в WhatsApp </span>
                <span class="js-promo-second-string">по номеру 8-495-514-31-26</span>
        
            </div>
           
         <div class="promo__hero js-promo-hero md:text-2xl text-lg text-blue-grey-900 font-black text-center">
                <div class="promo__caption js-promo-caption"></div>
                <div class="promo__text js-promo-text"></div>
            </div>
        </div> --}}


    {{-- <div class="my-8 bg-white bg-opacity-30 shadow-2xl rounded">
        <ul class="uk-subnav uk-subnav-pill overflow-x-auto w-full" uk-switcher>
            <li class="font-bold lg:text-sm text-xs"><a class="duration-200 ease-linear" href="#">Хит</a></li>
            <li class="font-bold lg:text-sm text-xs"><a class="duration-200 ease-linear" href="#">Советуем</a></li>
            <li class="font-bold lg:text-sm text-xs"><a class="duration-200 ease-linear" href="#">Новинка</a></li>
        </ul>
        <ul class="uk-switcher">
            <li class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                
                <div class="showhim relative flex flex-col justify-between items-center hover:bg-opacity-50 p-2 space-y-2 bg-gray-50 bg-opacity-30">
                    <img class="h-auto w-auto" src="https://getuikit.com/docs/images/light.jpg"  alt="">
                    <span>Pantum1</span>
                    <span class="text-xe text-center break-words px-2 w-full">Фотобарабан HP CF226A/CF226X/CF228A/СF287A/CF259A/CF259X HP M402/M426/M506/M527/M404/M428 PROSTO</span>
                    <b>1 030 <span>руб.</span></b>
                    <span class="text-xs text-gray-700"><i class="fas fa-check text-green mr-1"></i> В наличии</span>
                    <a href="#!" class="showme absolute z-50 -bottom-10 left-0 w-full bg-amber-700 text-gray-800 font-bold rounded-b bg-opacity-90 text-center py-2 px-2">Подробнее</a>
                </div>
                <div class="showhim relative flex flex-col justify-between items-center hover:bg-opacity-50 p-2 space-y-2 bg-gray-50 bg-opacity-30">
                    <img class="h-auto w-auto" src="https://getuikit.com/docs/images/light.jpg"  alt="">
                    <span>Pantum1</span>
                    <span class="text-xe text-center break-words px-2 w-full">Фотобарабан HP CF226A/CF226X/CF228A/СF287A/CF259A/CF259X HP M402/M426/M506/M527/M404/M428 PROSTO</span>
                    <b>1 030 <span>руб.</span></b>
                    <span class="text-xs text-gray-700"><i class="fas fa-check text-green mr-1"></i> В наличии</span>
                    <a href="#!" class="showme absolute z-50 -bottom-10 left-0 w-full bg-amber-700 text-gray-800 font-bold rounded-b bg-opacity-90 text-center py-2 px-2">Подробнее</a>
                </div>
                <div class="showhim relative flex flex-col justify-between items-center hover:bg-opacity-50 p-2 space-y-2 bg-gray-50 bg-opacity-30">
                    <img class="h-auto w-auto" src="https://getuikit.com/docs/images/light.jpg"  alt="">
                    <span>Pantum1</span>
                    <span class="text-xe text-center break-words px-2 w-full">Фотобарабан HP CF226A/CF226X/CF228A/СF287A/CF259A/CF259X HP M402/M426/M506/M527/M404/M428 PROSTO</span>
                    <b>1 030 <span>руб.</span></b>
                    <span class="text-xs text-gray-700"><i class="fas fa-check text-green mr-1"></i> В наличии</span>
                    <a href="#!" class="showme absolute z-50 -bottom-10 left-0 w-full bg-amber-700 text-gray-800 font-bold rounded-b bg-opacity-90 text-center py-2 px-2">Подробнее</a>
                </div>
                <div class="showhim relative flex flex-col justify-between items-center hover:bg-opacity-50 p-2 space-y-2 bg-gray-50 bg-opacity-30">
                    <img class="h-auto w-auto" src="https://getuikit.com/docs/images/light.jpg"  alt="">
                    <span>Pantum1</span>
                    <span class="text-xe text-center break-words px-2 w-full">Фотобарабан HP CF226A/CF226X/CF228A/СF287A/CF259A/CF259X HP M402/M426/M506/M527/M404/M428 PROSTO</span>
                    <b>1 030 <span>руб.</span></b>
                    <span class="text-xs text-gray-700"><i class="fas fa-check text-green mr-1"></i> В наличии</span>
                    <a href="#!" class="showme absolute z-50 -bottom-10 left-0 w-full bg-amber-700 text-gray-800 font-bold rounded-b bg-opacity-90 text-center py-2 px-2">Подробнее</a>
                </div>
                <div class="showhim relative flex flex-col justify-between items-center hover:bg-opacity-50 p-2 space-y-2 bg-gray-50 bg-opacity-30">
                    <img class="h-auto w-auto" src="https://getuikit.com/docs/images/light.jpg"  alt="">
                    <span>Pantum1</span>
                    <span class="text-xe text-center break-words px-2 w-full">Фотобарабан HP CF226A/CF226X/CF228A/СF287A/CF259A/CF259X HP M402/M426/M506/M527/M404/M428 PROSTO</span>
                    <b>1 030 <span>руб.</span></b>
                    <span class="text-xs text-gray-700"><i class="fas fa-check text-green mr-1"></i> В наличии</span>
                    <a href="#!" class="showme absolute z-50 -bottom-10 left-0 w-full bg-amber-700 text-gray-800 font-bold rounded-b bg-opacity-90 text-center py-2 px-2">Подробнее</a>
                </div>
          
            </li>
            <li class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                
                <div class="showhim relative flex flex-col justify-between items-center hover:bg-opacity-50 p-2 space-y-2 bg-gray-50 bg-opacity-30">
                    <img class="h-auto w-auto" src="https://getuikit.com/docs/images/light.jpg"  alt="">
                    <span>Pantum2</span>
                    <span class="text-xe text-center break-words px-2 w-full">Фотобарабан HP CF226A/CF226X/CF228A/СF287A/CF259A/CF259X  HP M402/M426/M506/M527/M404/M428 PROSTO</span>
                    <b>1 030 <span>руб.</span></b>
                    <span class="text-xs text-gray-700"><i class="fas fa-check text-green mr-1"></i> В наличии</span>
                    <a href="#!" class="showme absolute -bottom-10 left-0 w-full bg-amber-700 text-gray-800 font-bold rounded-b bg-opacity-90 text-center py-2 px-2">Подробнее</a>
                </div>
          
            </li>
            <li class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                <div class="showhim relative flex flex-col justify-between items-center hover:bg-opacity-50 p-2 space-y-2 bg-gray-50 bg-opacity-30">
                    <img class="h-auto w-auto" src="https://getuikit.com/docs/images/light.jpg"  alt="">
                    <span>Pantum3</span>
                    <span class="text-xe text-center break-words px-2 w-full">Фотобарабан HP CF226A/CF226X/CF228A/СF287A/CF259A/CF259X HP M402/M426/M506/M527/M404/M428 PROSTO</span>
                    <b>1 030 <span>руб.</span></b>
                    <span class="text-xs text-gray-700"><i class="fas fa-check text-green mr-1"></i> В наличии</span>
                    <a href="#!" class="showme absolute -bottom-10 left-0 w-full bg-amber-700 text-gray-800 font-bold rounded-b bg-opacity-90 text-center py-2 px-2">Подробнее</a>
                </div>
          
            </li>
        </ul>
    </div> --}}


</section>
@endsection