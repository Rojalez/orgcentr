<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('uikit/css/uikit.css')}}">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    
    <script src="{{asset('uikit/js/uikit.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('head')
</head>
<style>
    .showme {
    display: none;
    }
    input[type=text]::-ms-clear {  display: none; width : 0; height: 0; }
input[type=text]::-ms-reveal {  display: none; width : 0; height: 0; }
input[type="search"]::-webkit-search-decoration,
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-results-button,
input[type="search"]::-webkit-search-results-decoration { display: none; }



.showhim:hover .showme {
display: block;
}
.text-xe{
        font-size: 9px;
        letter-spacing: 0.1px;
    }
body {
    -webkit-tap-highlight-color:transparent;
}


</style>
<body class="bg-gradient-to-r  w-full h-full from-light-blue-500 to-blue-600 relative ">
    {{-- Круглая фикс. кнопка --}}
<div x-data="{ callbackOpen : false }">
    <button @click="callbackOpen = !callbackOpen" class="animate__animated  focus:outline-none fixed bottom-3 right-2 bg-yellow-500 focus:bg-yellow-600 hover:shadow-lg shadow p-5 z-50 rounded-full text-blue-grey"><i class="fas fa-phone text-xl animate__animated animate__jello animate__infinite  animate__slow"></i></button>
    <div :class="{ 'flex animate__jello' : callbackOpen , 'hidden' : !callbackOpen}"  class=" overflow-x-hidden animate__animated mx-auto w-full overflow-y-auto fixed z-50 outline-none focus:outline-none">
        <div class="relative w-auto my-6 mx-auto z-50 max-w-xl md:px-0 px-2 " @click.away="callbackOpen = false" >
          <!--content-->
          <div class="border-0 rounded-lg mt-4 z-50 flex flex-col items-center justify-center w-full bg-blue-300 md:bg-opacity-60 bg-blur-2xl outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
              <h3 class="md:text-2xl text-white text-xl font-semibold">
                Оставьте заявку на звонок сейчас
              </h3>
              <button @click="callbackOpen = false" class="absolute top-3 right-0 p-1 ml-auto bg-transparent border-0 text-white -mt-1 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" >
                <span class="bg-transparent text-white h-6 w-6 text-2xl block outline-none focus:outline-none">
                  ×
                </span>
              </button>
            </div>
            <!--body-->
            <form action="/call" method="POST">
                <div class="relative p-2 z-50 flex-auto">
                    <h4 class="text-sm text-white text-center font-bold">и наш менеджер перезвонит<br>Вам в течение 10 минут</h4>
                  <div class="my-4 text-blue-grey-500 flex flex-col space-y-4 md:px-2 px-2 text-lg leading-relaxed">
                        <input name="name" type="text" class="rounded  shadow w-full border-0 py-3 px-2 md:text-sm text-xs focus:ring-0" required placeholder="Ваше имя или название компании">
                        <input name="phone" type="text" class="rounded  shadow w-full border-0 py-3 px-2 md:text-sm text-xs focus:ring-0 tel" required placeholder="Ваш телефон">
                            @csrf
                            <div class="flex text-xs my-4 flex-row items-center justify-center text-white space-x-1">
                                <input id="checkCall" type="checkbox" class="rounded-sm text-blue-500 focus:outline-none focus:ring-0" checked name="checkbox" >
                                <label for="">Согласен на <a href="/terms-of-use" class="text-yellow-500 underline">обработку</a> персональных данных</label>
                            </div>
                    </div>
                </div>
                <!--footer-->
                <div class="flex items-center justify-center p-6 border-t rounded-b">
                    <button id="activeCall" class="bg-yellow-500 text-blue-grey-800 hover:bg-yellow-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                      Оставить заявку
                    </button>
                    <button id="disabledCall" class="bg-gray-300 hidden text-blue-grey-800 font-bold uppercase text-sm px-6 py-3 rounded-full shadow outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                      Оставить заявку
                    </button>
                  </div>
            </form>
          </div>
        </div>
      </div>
      
</div>
        {{-- --- --}}
    {{-- верхний навбар --}}
    <nav class="fixed bg-blur-2xl bg-blue-300 bg-opacity-60 top-0 w-full z-50" x-data="{ zayavkaOpen : false }">
        <div class="flex flex-row max-w-7xl w-full xl:px-0 px-8 py-1 mx-auto md:justify-between justify-center">
            <div class="flex flex-row space-x-6 items-center py-1 tracking-tighter text-xs text-gray-50">
                {{-- <a href="/about" class="hover:text-gray-100">О компании</a>
                <a href="/partners" class="hover:text-gray-100">Наши партнеры</a>
                <a href="/help/payment" class="hover:text-gray-100">Главная</a>
                <a href="/help/payment" class="hover:text-gray-100">Каталог</a>
                <a href="/help/payment" class="hover:text-gray-100">Оплата</a>
                <a href="/help/delivery" class="hover:text-gray-100">Доставка</a>
                <a href="/help/delivery" class="hover:text-gray-100">Контакты</a> --}}

                <button @click="zayavkaOpen = !zayavkaOpen" class="bg-yellow-500 md:w-auto w-full text-blue-grey-800 focus:bg-yellow-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                    Оставить заявку
                </button>
            </div>
            <div class="md:flex hidden flex-row space-x-6 items-center py-1 lg:text-sm text-xs">
                <div class="flex flex-col self-start">
                    <a href="mailto:agalakov@orgcentr5.ru" class="text-white text-xs font-bold tracking-tighter"><span>agalakov@orgcentr5.ru</span></a>
                    <a href="#!" class="text-white text-xs font-bold tracking-tighter"><span>&nbsp;</span></a>
                    <a href="mailto:5143126@bk.ru" class="text-white text-xs font-bold tracking-tighter"><span>5143126@bk.ru</span></a>
                </div>
                <div class="flex flex-col">
                    <a href="tel:8(499)6854430" class="text-white text-xs font-bold tracking-tighter"><span>Юр.лица</span><i class="fal fa-phone-alt mx-2"></i>8(499)685 44 30</a>
                    <a href="https://wa.me/+79262680370" target="_blank" class="text-white flex flex-row items-center space-x-1 text-xs font-bold tracking-tighter">
                        <span>Юр.лица</span>
                        <i class="fal fa-phone-alt px-1"></i> 
                        <span>8(926)268 03 70</span>
                        <img src="{{asset('img/social/whatsapp.svg')}}" class="w-4 h-4" alt="">
                    </a>
                    <a href="https://wa.me/+74955143126" target="_blank" class="text-white flex flex-row items-center space-x-1 text-xs font-bold tracking-tighter">
                        <span>Физ.лица</span>
                        <i class="fal fa-phone-alt px-1"></i> 
                        <span>8(495)514 31 26</span>
                        <img src="{{asset('img/social/whatsapp.svg')}}" class="w-4 h-4" alt="">
                    </a>
                </div>
                @if (auth()->check())
                <a href="{{route('home')}}" class="text-white hover:text-gray-200"><i class="fas fa-user-circle text-4xl mr-2"></i></a>
                @else 
                <a href="/login" class="text-white hover:text-gray-200"><i class="far fa-lock-alt mr-2"></i>Войти</a>
                <a href="/register" class="text-white hover:text-gray-200"><i class="far fa-lock-alt mr-2"></i>Регистрация</a>
            @endif
            </div>
        </div>
        <div :class="{ 'flex animate__jello' : zayavkaOpen , 'hidden' : !zayavkaOpen}"  class="animate__animated overflow-x-hidden mx-auto w-full overflow-y-auto fixed z-50 outline-none focus:outline-none">
            <div class="relative w-auto my-6 mx-auto z-50 max-w-xl md:px-0 px-2 " @click.away="zayavkaOpen = false" >
              {{-- <!--content--> --}}
              <div class="border-0 rounded-lg mt-4 z-50  flex flex-col items-center justify-center w-full bg-blue-300 md:bg-opacity-60 bg-blur-2xl outline-none focus:outline-none">
                {{-- <!--header--> --}}
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                  <h3 class="md:text-2xl text-center text-xl text-white font-semibold">
                    Оставьте заявку на ремонт<br>или заправку картриджей
                  </h3>
                  <button @click="zayavkaOpen = false" class="p-1 ml-auto bg-transparent border-0 text-white absolute top-2 right-0 text-3xl leading-none font-semibold outline-none focus:outline-none" >
                    <span class="bg-transparent text-white h-6 w-6 text-2xl block outline-none focus:outline-none">
                      ×
                    </span>
                  </button>
                </div>
                {{-- <!--body--> --}}
                <form action="/feedback" method="post">
                    <div class="relative p-2 z-50 flex-auto">
                      <div class="my-4 text-blue-grey-500 flex flex-col space-y-4 md:px-2 px-2 text-lg leading-relaxed">
                            <input name="name" type="text" class="rounded  shadow w-full border-0 py-3 px-2 md:text-sm text-xs focus:ring-0" required placeholder="Ваше имя или название компании">
                            <input name="phone"  type="text" class="rounded  shadow w-full border-0 py-3 px-2 md:text-sm text-xs focus:ring-0 tel" required placeholder="Ваш телефон">
                            <textarea name="text" id="" class="rounded  shadow w-full border-0 py-3 px-2 md:text-sm text-xs focus:ring-0 h-40" required placeholder="Ваш комментарий"></textarea>
                            @csrf
                            <div class="flex text-xs my-4 flex-row items-center justify-center text-white space-x-1">
                                <input id="check" type="checkbox" class="rounded-sm text-blue-500 focus:outline-none focus:ring-0" checked name="checkbox" >
                                <label for="">Согласен на <a href="/terms-of-use" class="text-yellow-500 underline">обработку</a> персональных данных</label>
                            </div>
                        </div>
                    </div>
                    {{-- <!--footer--> --}}
                    <div class="flex items-center justify-center p-6 border-t rounded-b">
                      <button id="active" class="bg-yellow-500 text-blue-grey-800 hover:bg-yellow-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                        Оставить заявку
                      </button>
                      <button id="disabled" class="bg-gray-300 hidden text-blue-grey-800 font-bold uppercase text-sm px-6 py-3 rounded-full shadow outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                        Оставить заявку
                      </button>
                    </div>
                </form>
 
              </div>
            </div>
          </div>
    </nav>
    
    <div class="px-2 mt-16 py-2">
        <div class="max-w-7xl mx-auto relative bg-opacity-50 rounded-lg bg-white shadow-3xl">
            {{-- Нижний навбар --}}
            <header x-data="{ mobileMenuOpen : false }">
                <div class="w-full h-16 flex flex-row justify-between relative px-4 bg-blue-grey-900 rounded-t-lg shadow-md">
                    {{-- Мобильная версия навбара --}}
                    <div class="flex flex-row ">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden block focus:outline-none mr-2"><i class="fas fa-bars text-xl text-white"></i></button>
                        <a href="/" class="my-auto">
                            <img src="http://orgcentr5.ru/img/logo.png" class="h-10 w-auto transform hover:scale-105 duration-150 ease-linear" alt="">
                        </a>
                        <nav class="absolute md:relative top-16 left-0 z-20 md:hidden font-semibold tracking-tighter flex-col w-full bg-white shadow-md rounded-lg p-3 pt-0"
                        :class="{ 'flex' : mobileMenuOpen , 'hidden' : !mobileMenuOpen}"  @click.away="mobileMenuOpen = false"
                        >
                        <div x-data="{ mobileCatalogOpen : false }" class="py-3 border-b text-black flex flex-col justify-between">
                            <span class="flex flex-row justify-between items-center" @click="mobileCatalogOpen = !mobileCatalogOpen"><a href="/catalog">Каталог</a><i class="far fa-angle-down" aria-hidden="true"></i></span>
                            <div :class="{ 'flex' : mobileCatalogOpen , 'hidden' : !mobileCatalogOpen}"   @click.away="mobileCatalogOpen = false" class="text-black bg-white w-full">
                                <div class="flex flex-col w-full">
                                    <a href="{{route('category', ['slug' => 'zapchasti-dlya-printerov'])}}" class="flex flex-row text-sm hover:text-blue-500 items-center hover:bg-gray-50 space-x-2 ">
                                        <img class="h-16 p-3 w-16" src="https://image.flaticon.com/icons/png/512/342/342366.png"  alt="">
                                        <span>Запчасти для принтеров</span>
                                    </a>                                      
                                    <a href="{{route('category', ['slug' => 'chipy'])}}" class="flex flex-row text-sm hover:text-blue-500 items-center hover:bg-gray-50 space-x-2 ">
                                        <img class="h-16 p-3 w-16" src="https://image.flaticon.com/icons/png/512/141/141007.png"  alt="">
                                        <span>Чипы</span>
                                    </a>
                                    <a href="{{route('category', ['slug' => 'kartridzhi'])}}" class="flex flex-row text-sm hover:text-blue-500 items-center hover:bg-gray-50 space-x-2 ">
                                        <img class="h-16 p-3 w-16" src="https://image.flaticon.com/icons/png/512/1507/1507782.png"  alt="">
                                        <span>Картриджи</span>
                                    </a>
                                    <a href="{{route('category', ['slug' => 'zapchasti-dlya-kartridzhej'])}}" class="flex flex-row text-sm hover:text-blue-500 items-center hover:bg-gray-50 space-x-2 ">
                                        <img class="h-16 p-3 w-16" src="https://image.flaticon.com/icons/png/512/4143/4143106.png"  alt="">
                                        <span>Запчасти для картриджей</span>
                                    </a>
                                    <a href="{{route('category', ['slug' => 'zapchasti-v-teh-upakovke'])}}" class="flex flex-row text-sm hover:text-blue-500 items-center hover:bg-gray-50 space-x-2 ">
                                        <img class="h-16 p-3 w-16" src="https://image.flaticon.com/icons/png/512/3921/3921636.png"  alt="">
                                        <span>Запчасти в тех.упаковке</span>
                                    </a>
                                    <a href="{{route('category', ['slug' => 'tonery'])}}" class="flex flex-row text-sm hover:text-blue-500 items-center hover:bg-gray-50 space-x-2 ">
                                        <img class="h-16 p-3 w-16" src="https://image.flaticon.com/icons/png/512/1763/1763181.png"  alt="">
                                        <span>Тонеры</span>
                                    </a>
                                    <a href="{{route('category', ['slug' => 'zapravka-kartridzhej'])}}" class="flex flex-row text-sm hover:text-blue-500 items-center hover:bg-gray-50 space-x-2 ">
                                        <img class="h-16 p-3 w-16" src="https://image.flaticon.com/icons/png/512/2891/2891569.png"  alt="">
                                        <span>Заправка картриджей</span>
                                    </a>
                                    <a href="{{route('repair')}}" class="flex flex-row text-sm hover:text-blue-500 items-center hover:bg-gray-50 space-x-2 ">
                                        <img class="h-16 p-3 w-16" src="https://image.flaticon.com/icons/png/512/712/712842.png"  alt="">
                                        <span>Ремонт техники</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                            <a href="/payment" class="block py-3 border-b text-black">Оплата</a>
                            <a href="/delivery" class="block py-3 border-b text-black">Доставка</a>
                            <a href="/contact" class="block py-3 border-b text-black">Контакты</a>
                            <div class="flex flex-col py-3 space-y-4">
                                <span class="text-sm text-gray-600">Контактная информация</span>
                                <div class="flex flex-row items-center space-x-2 text-xs font-light text-gray-400 hover:text-blue-500">
                                    <a href="tel:+8(499)6854430" class="text-xs tracking-tighter"><i class="fal fa-phone-alt mr-2"></i><span>Юр.лица</span> 8(499)685 44 30</a>
                                 </div>
                                 <div class="flex flex-row items-center space-x-2 text-xs font-light text-gray-400 hover:text-blue-500">
                                    <img src="{{asset('img/social/whatsapp.svg')}}" class="w-4 h-4" alt="">
                                     <a href="https://wa.me/+79262680370" target="_blank"><span>Юр.лица</span> 8(926)268 03 70</a>
                                 </div>
                                 <div class="flex flex-row items-center space-x-2 text-xs font-light text-gray-400 hover:text-blue-500">
                                    <img src="{{asset('img/social/whatsapp.svg')}}" class="w-4 h-4" alt="">
                                     <a href="https://wa.me/+74955143126" target="_blank"><span>Физ.лица</span> 8(495)514 31 26</a>
                                 </div>
                                <div class="flex flex-row items-center space-x-2 text-xs font-light text-gray-400 hover:text-blue-500">
                                   <i class="far fa-envelope"></i>
                                    <a href="mailto:agalakov@orgcentr5.ru">agalakov@orgcentr5.ru</a>
                                </div>
                                <div class="flex flex-row items-center space-x-2 text-xs font-light text-gray-400 hover:text-blue-500">
                                    <i class="far fa-envelope"></i>
                                     <a href="mailto:5143126@bk.ru">5143126@bk.ru</a>
                                 </div>
                                 <div class="flex flex-row items-center space-x-2 text-xs font-light text-gray-400 hover:text-blue-500">
                                    <i class="far fa-map-marker-alt"></i>
                                    <span>г.Химки, ул.Коммунистическая, д.4, оф.18</span>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div  x-data="searchForm()"  class="w-full px-6 items-center md:flex hidden">
                        <div class="relative w-full" >
                            <input x-model="formData.title" @input="submitData"   type="search" class="w-full bg-gray-100 focus:bg-white bg-opacity-90 shadow-inner focus:outline-none focus:ring-0 border-0 rounded text-sm font-light" placeholder="Поиск" name="title" id="title">
                            <a :href="'/result?title='+formData.title" class="absolute top-2 right-2 focus:outline-none"><i class="far fa-search mt-0.5 text-xl text-gray-500 hover:text-blue-500"></i></a>
                        </div>
                        <div  x-show="showSearchBlock"  @click.away="showSearchBlock = false" class="absolute text-black text-left z-30 left-0 top-28 shadow-3xl font-normal text-sm bg-white bg-opacity-60 bg-blur-2xl rounded-b w-full h-auto">
                            <div class="flex flex-row w-full p-6">
                                <div class="w-1/3 flex flex-col space-x-6 border-r">
                                    <div class="flex flex-col space-y-2">
                                        <!-- <div class="flex flex-col space-y-4 max-w-max">
                                            <a href="#!" class="group flex flex-col space-y-2 text-xs text-gray-700">
                                                <span class="group-hover:text-gray-500" >259</span>
                                                <span>В категории <b class="group-hover:text-gray-500 ">Тонер для HP монохром</b></span>
                                            </a>
                                        </div> -->
                                        <span class="text-xs text-gray-400">часто ищут</span>
                                        <div class="flex flex-col space-y-3 max-w-max">
                                            <template x-for="value in searches" :key="value.id">
                                                <a :href="'/result?title='+value.title" class="hover:text-gray-500 text-xs text-gray-700" x-text="value.title">259</a>
                                            </template>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="w-2/3 grid grid-cols-4 gap-2 pl-2">
                                    <template x-for="product in products" >  
                                    <a href="#!" class="flex flex-col justify-between hover:text-gray-500 items-center hover:bg-opacity-90 hover:bg-white rounded p-2 space-y-2 bg-gray-50">
                                        <img class="h-auto w-auto" :src="product.image"  :alt="product.name">
                                        <span x-text="product.category.name">Pantum</span>
                                        <span class="text-xs break-words px-2 w-full" x-text="product.name">Тонер HP LJ M402/403/426/427/506/527, P4014/4015/4515, UT1922, 1 кг., Mitsubishi</span>
                                        <b><span x-text="product.price">1 030</span> <span>руб.</span></b>
                                    </a>
                                    </template>
                                    <a :href="'/result?title='+formData.title" class="text-sm py-2 text-left max-w-max flex items-center text-gray-600 underline hover:no-underline hover:text-gray-700">Смотреть все результаты</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-6 items-center flex-row justify-center">
                        <a href="tel:8-499-685-44-30" class="md:hidden block text-white hover:text-blue-500"><i class="far fa-phone-alt text-xl"></i></a>
                        <div id='basket-link'>
                        @if (session()->has('products') && count(session()->get('products')) > 0 && Route::currentRouteName() != 'basket')
                            <a class="relative text-white dark:text-gray-200 items-center flex flex-row space-x-2 hover:text-blue-500" href="{{route('basket')}}">
                            <i class="far fa-shopping-cart text-xl"></i>
                            <span class="font-semibold md:block hidden text-sm">
                                Корзина
                            </span>
                             <span class="absolute bottom-3 left-0 h-4 w-4 font-normal ring-2  ring-white ring-opacity-20 text-center text-xs text-white bg-blue-500 rounded-full"><small id="basket-count">{{count(session()->get('products'))}}</small></span>
                            </a>
                        @endif
                        </div>

                        
                        <a href="/home" class="md:hidden block text-white hover:text-blue-500"><i class="fas fa-user-circle text-4xl mr-2"></i></a>
                    </div>
                    <div x-data="searchForm()" class="w-full absolute -bottom-9 left-0 mx-auto md:hidden">
                        <input name="title" id="title" x-model="formData.title" @input="submitData"   type="search"  class="w-full bg-gray-100 focus:bg-white bg-opacity-90 shadow-inner focus:outline-none focus:ring-0 border-0 text-sm font-light" placeholder="Поиск">
                        <a :href="'/result?title='+formData.title" class="absolute top-2 right-2 focus:outline-none"><i class="far fa-search text-xl text-gray-500 hover:text-blue-500"></i></a>
                    </div>
                </div>
                {{-- Десктопная версия навбара --}}
                <div class="w-full md:grid hidden z-40 grid-cols-5 bg-gray-800 text-white font-bold relative ">
                    <a href="/" class="py-3 px-4 flex-auto border-r border-gray-900 hover:bg-gray-900"><i class="fas fa-home mr-4"></i> Главная</a>
                    <div class="showhim text-center group flex flex-row justify-between items-center h-auto border-r border-gray-900 hover:bg-gray-900  py-3 px-4 flex-auto">
                        <a href="/catalog" class="">Каталог</a>
                        <i class="fal fa-angle-down transform group-hover:rotate-180 duration-200" aria-hidden="true"></i>
                        <div class="showme absolute rounded-b text-black text-left left-0 top-12 shadow-3xl font-normal text-sm bg-white bg-opacity-60 bg-blur-2xl w-full h-auto">
                            <div class="grid grid-cols-4 p-6 items-center justify-between">
                                <a href="{{route('category', ['slug' => 'zapchasti-dlya-printerov'])}}" class="flex flex-row hover:text-gray-500 items-center hover:bg-gray-50 duration-150 rounded hover:bg-opacity-60 space-x-2 ">
                                    <img class="h-auto p-3 w-16" src="https://image.flaticon.com/icons/png/512/342/342366.png"  alt="">
                                    <span>Запчасти для принтеров</span>
                                </a>
                                <a href="{{route('category', ['slug' => 'chipy'])}}" class="flex flex-row hover:text-gray-500 items-center hover:bg-gray-50 duration-150 rounded hover:bg-opacity-60 space-x-2 ">
                                    <img class="h-auto p-3 w-16" src="https://image.flaticon.com/icons/png/512/141/141007.png"  alt="">
                                    <span>Чипы</span>
                                </a>
                                <a href="{{route('category', ['slug' => 'kartridzhi'])}}" class="flex flex-row hover:text-gray-500 items-center hover:bg-gray-50 duration-150 rounded hover:bg-opacity-60 space-x-2 ">
                                    <img class="h-auto p-3 w-16" src="https://image.flaticon.com/icons/png/512/1507/1507782.png"  alt="">
                                    <span>Картриджи</span>
                                </a>
                                <a href="{{route('category', ['slug' => 'zapchasti-dlya-kartridzhej'])}}" class="flex flex-row hover:text-gray-500 items-center hover:bg-gray-50 duration-150 rounded hover:bg-opacity-60 space-x-2 ">
                                    <img class="h-auto p-3 w-16" src="https://image.flaticon.com/icons/png/512/4143/4143106.png"  alt="">
                                    <span>Запчасти для картриджей</span>
                                </a>
                                <a href="{{route('category', ['slug' => 'zapchasti-v-teh-upakovke'])}}" class="flex flex-row hover:text-gray-500 items-center hover:bg-gray-50 duration-150 rounded hover:bg-opacity-60 space-x-2 ">
                                    <img class="h-auto p-3 w-16" src="https://image.flaticon.com/icons/png/512/3921/3921636.png"  alt="">
                                    <span>Запчасти в тех.упаковке</span>
                                </a>
                                <a href="{{route('category', ['slug' => 'tonery'])}}" class="flex flex-row hover:text-gray-500 items-center hover:bg-gray-50 duration-150 rounded hover:bg-opacity-60 space-x-2 ">
                                    <img class="h-auto p-3 w-16" src="https://image.flaticon.com/icons/png/512/1763/1763181.png"  alt="">
                                    <span>Тонеры</span>
                                </a>
                                <a href="{{route('category', ['slug' => 'zapravka-kartridzhej'])}}" class="flex flex-row hover:text-gray-500 items-center hover:bg-gray-50 duration-150 rounded hover:bg-opacity-60 space-x-2 ">
                                    <img class="h-auto p-3 w-16" src="https://image.flaticon.com/icons/png/512/2891/2891569.png"  alt="">
                                    <span>Заправка картриджей</span>
                                </a>
                                <a href="{{route('repair')}}" class="flex flex-row hover:text-gray-500 items-center hover:bg-gray-50 duration-150 rounded hover:bg-opacity-60 space-x-2 ">
                                    <img class="h-auto p-3 w-16" src="https://image.flaticon.com/icons/png/512/712/712842.png"  alt="">
                                    <span>Ремонт техники</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="/payment" class="py-3 px-4 flex-auto text-center border-r border-gray-900 hover:bg-gray-900">Оплата</a>
                    <a href="/delivery" class="py-3 px-4 flex-auto text-center border-r border-gray-900 hover:bg-gray-900">Доставка</a>

                    <div class="showhim relative text-center flex flex-row justify-between items-center h-auto border-r border-gray-900 hover:bg-gray-900 py-3 px-4 flex-auto group">
                        <a href="/contact" class="mx-auto">Контакты</a>
                        <i class="fal fa-angle-down transform group-hover:rotate-180 duration-200" aria-hidden="true"></i>
                        <div class="showme absolute text-black text-left left-0 top-12 shadow-3xl rounded-b bg-white bg-opacity-60 bg-blur-2xl w-full h-auto">
                            <div class="flex flex-col">
                                <div class="border-b hover:text-gray-500 rounded hover:bg-gray-50 hover:bg-opacity-60 font-normal py-4 text-gray-600 duration-150 ease-linear px-4 text-sm">
                                    <i class="fas fa-phone-alt"></i>
                                     <a href="tel:8(499)6854430">8(499)685 44 30</a>
                                 </div>
                                <div class="border-b hover:text-gray-500 rounded hover:bg-gray-50 hover:bg-opacity-60 font-normal py-4 text-gray-600 duration-150 ease-linear px-4 text-sm">
                                   <i class="far fa-envelope"></i>
                                    <a href="mailto:agalakov@orgcentr5.ru">agalakov@orgcentr5.ru</a>
                                </div>
                                 <div class=" hover:text-gray-500 rounded hover:bg-gray-50 hover:bg-opacity-60 font-normal py-4 text-gray-600 duration-150 ease-linear px-4 text-sm">
                                    <i class="fab fa-whatsapp"></i>
                                     <a href="https://wa.me/+79262680370" target="_blank">8(926)268 03 70</a>
                                 </div>
                                 <div class="border-b hover:text-gray-500 rounded hover:bg-gray-50 hover:bg-opacity-60 font-normal py-4 text-gray-600 duration-150 ease-linear px-4 text-sm">
                                    <i class="far fa-map-marker-alt"></i>
                                    <span>г.Химки, ул.Коммунистическая, д.4, оф.18</span>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </header>
            {{-- Основной контент --}}
            <div class="">
                <div class="flex flex-col bg-gray-50 bg-opacity-20 items-center md:mt-0 mt-8 space-y-2 p-2 hide-title">
                    <span class="lg:text-3xl text-gray-700 font-bold text-lg hide-title">
                        @yield('title')
                    </span>
                    {{-- Хлебные крошки --}}
                    @yield('slug')
                </div>
                @yield('content')

                <div class="fixed top-20 right-0">
                    @if (session()->has('message'))
                        <p>{{session()->get('message')}}</p>
                    @endif
                </div>
            </div>
        <footer class="flex flex-col items-center justify-between px-6 py-4 bg-blue-grey-900 rounded-b-lg sm:flex-row">
            <a href="#" class="text-xl font-bold text-gray-800 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"><img src="http://orgcentr5.ru/img/logo.png" class="h-10 w-auto transform hover:scale-105 duration-150 ease-linear" alt=""></a>
            
            <p class="py-2 text-white sm:py-0 font-bold">© Orgcentr 2021 - Все права защищены</p>

            <div class="flex -mx-2">
                <a href="tg://resolve?domain=rojalez" target="_blank" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300" aria-label="">
                    <img src="{{asset('img/social/telegram.svg')}}" alt="" class="w-8 h-8 transform hover:scale-105 duration-150 ease-linear">
                </a>
                <script type="text/javascript" src="https://suitecall.com:8980/static/script.js" async id="scw-63hsuwee8" data-token="eaee7d40dbf32368d782e36dcec9365a" data-position="left"  data-color="blue"  data-widgettype="0" ></script>
                <a href="https://wa.me/+74955143126" target="_blank" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300"
                    aria-label="">
                    <img src="{{asset('img/social/whatsapp.svg')}}" alt="" class="w-8 h-8 transform hover:scale-105 duration-150 ease-linear">
                </a>
            </div>
        </footer>

        </div>
    </div>

    <script type="text/javascript"  src="{{asset('js/template_179454ad5d0d9f5801b97bb3faf91b53.js@1552924493534079')}}"></script>

    <script>
        window.addEventListener("DOMContentLoaded", function() {
            [].forEach.call( document.querySelectorAll('.tel'), function(input) {
            var keyCode;
            function mask(event) {
                event.keyCode && (keyCode = event.keyCode);
                var pos = this.selectionStart;
                if (pos < 3) event.preventDefault();
                var matrix = "+7 (___) ___ __ __",
                    i = 0,
                    def = matrix.replace(/\D/g, ""),
                    val = this.value.replace(/\D/g, ""),
                    new_value = matrix.replace(/[_\d]/g, function(a) {
                        return i < val.length ? val.charAt(i++) || def.charAt(i) : a
                    });
                i = new_value.indexOf("_");
                if (i != -1) {
                    i < 5 && (i = 3);
                    new_value = new_value.slice(0, i)
                }
                var reg = matrix.substr(0, this.value.length).replace(/_+/g,
                    function(a) {
                        return "\\d{1," + a.length + "}"
                    }).replace(/[+()]/g, "\\$&");
                reg = new RegExp("^" + reg + "$");
                if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
                if (event.type == "blur" && this.value.length < 5)  this.value = ""
            }
        
            input.addEventListener("input", mask, false);
            input.addEventListener("focus", mask, false);
            input.addEventListener("blur", mask, false);
            input.addEventListener("keydown", mask, false)
        
          });
        
        });
    
          </script>


          <script>
            $('#check').change(function () {
              var val =  $(this).is(':checked');

              if (val) {
                  
                  $('#active').removeClass('hidden');
                  $('#disabled').addClass('hidden');
              } else {
                $('#active').addClass('hidden');
                $('#disabled').removeClass('hidden');
              }
            });
            
            $('#disabled').click(function () {
                var isClicked = 'Нужно ваше согласие на обработку персональных данных!';
                alert(isClicked);
            });

            $('#checkCall').change(function () {
              var val =  $(this).is(':checked');

              if (val) {
                  
                  $('#activeCall').removeClass('hidden');
                  $('#disabledCall').addClass('hidden');
              } else {
                $('#activeCall').addClass('hidden');
                $('#disabledCall').removeClass('hidden');
              }
            });
            
            $('#disabledCall').click(function () {
                var isClickedCall = 'Нужно ваше согласие на обработку персональных данных!';
                alert(isClickedCall);
            });


          </script>

<script>

    function searchForm() {
      return {
        formData: {
          title: '',
        },
        showSearchBlock:false,
        results: [],
        searches: [],
        products: [],
        submitData() {
            fetch('/ajax', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(this.formData)
            })
            .then((response) => response.json())
            .then((data) => {
                this.showSearchBlock = true;
                this.results = data;
                this.searches = this.results.searches;
                this.products = this.results.products;
            })
        }
      }
    }


    
</script>

</body>
</html>