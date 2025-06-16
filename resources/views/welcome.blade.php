@extends('components.layouts.app.home-layout')

@section('content')
<div class="flex flex-col flex-1 w-full">
<div class="w-screen h-fit relative flex items-center justify-center bg-[var(--color-green-700)]">
    <img src="{{ asset("home.png") }}" class="max-w-full h-[90%]" />
    <div class="absolute top-[50%] left-[50%] translate-[-50%]">
        <div class="flex flex-col items-center">
            <p class="font-bold text-[70px] text-center text-white drop-shadow-lg">"Zero Carbon, Everlasting Impact</p>
            <p class="font-bold text-[70px] text-center text-white drop-shadow-lg">- Welcome to Zerobon!"</p>
            {{-- <div class="flex px-8 py-3 w-[822px] items-center justify-center bg-white rounded-[100px]">
                <input type="text" class="h-full text-[18px] flex-1 outline-none" placeholder="Search here"/>
                <i class="fa-solid fa-magnifying-glass text-[25px]"></i>
            </div> --}}
        </div>
    </div>
</div>
<div class="w-full min-h-[647px] flex items-center bg-white text-[var(--color-green-700)]">
    <div class="flex-1/2 flex flex-col box-border px-10 py-16 gap-10">
        <p class="font-semibold text-[44px]">Why Was Zerobon Created</p>
        <p class="text-[27px]">Climate change is an urgent global issue, affecting ecosystems, health, and daily life. Human activities—such as deforestation, industrial pollution, and excessive energy consumption—contribute to rising carbon dioxide (CO₂) emissions, accelerating global warming.</p>
    </div>
    <div class="flex-1/2">
        <img class="w-full" src="{{asset("./home-1.png")}}"/>
    </div>
</div>
<div class="w-full min-h-[647px] flex items-center bg-white text-[var(--color-green-700)]">
    <div class="flex-1/2">
        <img class="w-full" src="{{asset("./home-2.png")}}"/>
    </div>
    <div class="flex-1/2 flex flex-col box-border px-10 py-16 gap-10">
        <p class="font-semibold text-[44px]">Zerobon was created to empower change!</p>
        <p class="text-[27px]">This platform raises awareness and provides real solutions for reducing carbon footprints. Through interactive features, Zerobon helps individuals understand their impact and take action toward sustainability. Zerobon aims to connect eco-conscious individuals, activists, and organizations for collective impact. We also seek partnerships with companies, NGOs, and governments to expand green initiatives.</p>
    </div>
</div>
<div class="w-full min-h-[647px] flex items-center bg-white text-[var(--color-green-700)]">
    <div class="flex-1/2 flex flex-col box-border px-10 py-16 gap-10">
        <p class="font-semibold text-[44px]">Calculate Your Carbon Footprint</p>
        <p class="text-[27px]">Discover the impact of your daily activities on the environment! Our user-friendly Carbon Footprint Calculator helps you estimate your annual emissions in tons of CO2. Simply select and input your data, and get instant results with personalized tips for a greener lifestyle.</p>
        <p class="text-[27px]">Take the first step towards sustainability.</p>
        <a href="{{route("carbon-footprint")}}"><button class="hover:cursor-pointer border-2 border-[var(--color-green-700)] bg-white rounded-2xl text-[var(--color-green-700)] w-[386px] h-[60px] text-[20px] font-extrabold">Start Calculating Now</button></a>
    </div>
    <div class="flex-1/2">
        <img class="w-full" src="{{asset("./home-3.png")}}"/>
    </div>
</div>
<div class="flex flex-col items-center gap-10 w-full box-border px-[40px]">
    <p class="font-semibold text-[40px] text-[var(--color-green-700)]">Check Our Headlines!!</p>
    <div class="rounded-2xl overflow-hidden h-[450px] w-[1200px] flex">
        @foreach ($articles as $article)
            <div class="flex-1/3 h-full relative">
                <div class="h-full w-full">
                    <img class="h-full w-full object-cover" src="{{$article->photo}}"/>
                </div>
                <div class="absolute top-0 left-0 w-full h-full bg-black opacity-30"></div>
                <div class="top-0 left-0 absolute w-full h-full flex flex-col justify-end px-6 py-12 box-border">
                    <div class="flex flex-col gap-4">
                        <p class="font-bold text-[18px] text-white shadow-2xl">{{ $article->publish_date->format('j F Y') }}</p>
                        <p class="font-bold text-[25px] text-white">{{ $article->title }}</p>
                        <div class="w-full h-[1px] bg-white"></div>
                        <a href="{{route("articles.detail", $article->id)}}"><div class="h-[60px] flex items-center gap-6 hover:cursor-pointer">
                            <i class="fa-solid fa-arrow-right text-white text-[30px]"></i>
                            <p class="font-semibold text-[18px] text-white">Read More</p>
                        </div></a>
                    </div> 
                </div>
            </div>
        @endforeach
    </div>  
</div>
<div class="w-full h-full flex justify-center">
    <div class="w-fit h-fit relative">
        <img class="w-auto h-auto max-w-full max-h-[80vh]" src="{{ asset("./home-5.png") }}" />
        <div class="flex flex-col justify-center items-center px-[40px] absolute top-[50%] left-[50%] translate-[-50%] text-center gap-7">
            <p class="font-bold text-[clamp(35px,2.5vw,70px)] text-white drop-shadow-2xl">Support a Greener Future</p>
            <p class="font-bold text-[clamp(18px,1.7vw,36px)] text-white drop-shadow-2xl">Your donation can make a big impact. By planting a tree, you help combat climate change, enhance biodiversity, and improve air quality.</p>
            <a>
                <button class="w-[387px] h-[67px] bg-white border-4 border-[var(--color-green-700)] rounded-[40px] text-[var(--color-green-700)] font-extrabold text-[32px]">Donate Now</button>
            </a>
        </div>
    </div>
</div>
<div class="w-full h-[40px]"></div>
<div class="flex flex-col gap-5 items-center bg-[var(--color-cream-700)] py-5">
    <p class="font-semibold text-[40px] text-[var(--color-green-700)]">Check Our Products!!</p>
    <div class="flex gap-4 flex-wrap">
        @foreach ($products as $product)
            <div class="flex flex-col h-[450px] px-10 py-3 items-center">
                <img class="w-[232px] h-[277px]" src="{{ asset($product->image_filename) }}"/>
                <p class="font-semibold text-[29px]">{{ $product->name }}</p>
                <p class="font-extralight text-[20px]">Rp.{{ $product->price }}</p>
            </div>
        @endforeach
    </div>
    <a href="{{ route("products") }}"><button class="border-4 border-[var(--color-green-700)] w-[387px] h-[67px] rounded-3xl text-[36px] font-extrabold text-[var(--color-green-700)] bg-white hover:cursor-pointer">Go to EcoMarket</button></a>
</div>
</div>
@endsection 