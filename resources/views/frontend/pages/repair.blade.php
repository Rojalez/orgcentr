@extends('frontend.layout.layout')
@section('title',  $repairs->title)
@section('content')
<section class="md:px-8 px-3 py-4">
   
    <div class="py-8 px-8 bg-white bg-opacity-60 rounded">
        {!!$repairs->text!!}
    </div>
</section>
@endsection