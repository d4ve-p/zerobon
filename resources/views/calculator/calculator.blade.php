@extends('components.layouts.app.home-layout')
@section('content')
<div class="relative">
    <div id="main-page" class="w-full flex flex-col lg:flex-row bg-white rounded-lg overflow-hidden shadow-md min-h-max">
        <div class="w-full lg:w-1/2 flex justify-center items-center bg-white p-[2.5rem]">
            <img src="{{ asset('carboncalculator.png') }}" alt="CO2 Illustration" class="max-w-full h-auto">
        </div>

        <div class="w-full lg:w-1/2 bg-[#FFF6E7] p-[5rem] flex flex-col gap-[1.5rem]">
            <h2 class="lg:text-[2.75rem] font-bold text-[#228B22] leading-tight text-center">
                Discover How Your Daily<br />
                Choices Impact the Planet
            </h2>
            <p class="text-[1.25rem] lg:text-[1.625rem] text-[#228B22] leading-relaxed text-justify px-[2.5rem] mt-[1.25rem]">
                Ever wondered how your daily choices affect the planet? With our Carbon Footprint Calculator, you can measure the environmental impact of your lifestyle. Whether it’s your travel habits, energy use, or diet, this tool helps you see where you stand – and how you can make simple changes to reduce your carbon emissions.
            </p>
            <button id="open-calculator" class="w-9/10 mx-auto bg-green-600 text-center text-white text-[1.125rem] font-semibold px-[1.5rem] py-[1rem] rounded-md hover:bg-green-800 transition-all mt-[2rem]">
                Calculate Now
            </button>
        </div>
    </div>

    <div id="page-2" class="hidden w-full flex flex-col items-center justify-center min-h-screen bg-[#FFF8E8] p-10 rounded-lg shadow-md">
        <div class="flex gap-6 mt-7 px-4 overflow-x-auto">
            <div data-key="land" class="category-btn text-center border-3 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('land.png') }}" alt="Land Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Land Transportation</p>
            </div>
            <div data-key="air" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('air.png') }}" alt="Air Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Air Transportation</p>
            </div>
            <div data-key="power" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('power.png') }}" alt="Household Power" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Power</p>
            </div>
            <div data-key="appliances" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition ">
                <img src="{{ asset('appliances.png') }}" alt="Household Appliances" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Appliances</p>
            </div>
            <div data-key="food" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('food.png') }}" alt="Food" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Food</p>
            </div>
        </div>

        <div class="text-center mt-10">
            <h2 class="text-[2rem] text-[#228B22] font-bold mb-10 mt-10">Filling Progress</h2>
            <div class="w-300 mx-auto bg-gray-300 h-10 rounded-full">
                <div class="bg-[#FFEA7B] h-10 rounded-full text-[#936853] text-[1rem] font-bold flex items-center justify-center" style="width: 15%">15 %</div>
            </div>
        </div>

        <h3 class="text-center text-[2rem] text-[#228B22] font-bold mt-10">LAND TRANSPORTATION</h3>
        <div id="vehicles-container" class="w-[90%] flex flex-col gap-10 mt-10 mx-auto rounded-lg p-6"></div>

        <div class="w-[90%] mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 mt-10 mb-20 text-center">
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Sum (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] emission-sum-land flex justify-center items-center">
                    0.00
                </div>
            </div>
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Total (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] emission-total flex justify-center items-center">
                    0.00
                </div>
            </div>
        </div>

        <div class="flex gap-5 mt-8">
            <button id="prev-btn-page2" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Previous</button>
            <button id="add-vehicle" class="bg-green-700 text-white font-semibold px-10 py-3 rounded-xl hover:bg-green-800 transition">
                Add Vehicle
            </button>
            <button id="next-btn-page2" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Next</button>
        </div>
    </div>

    <div id="page-3" class="hidden w-full flex flex-col items-center justify-center min-h-screen bg-[#FFF8E8] p-10 rounded-lg shadow-md">
        <div class="flex gap-6 mt-7 px-4 overflow-x-auto">
            <div data-key="land" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('land.png') }}" alt="Land Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Land Transportation</p>
            </div>
            <div data-key="air" class="category-btn text-center border-3 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('air.png') }}" alt="Air Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Air Transportation</p>
            </div>
            <div data-key="power" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('power.png') }}" alt="Household Power" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Power</p>
            </div>
            <div data-key="appliances" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition ">
                <img src="{{ asset('appliances.png') }}" alt="Household Appliances" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Appliances</p>
            </div>
            <div data-key="food" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('food.png') }}" alt="Food" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Food</p>
            </div>
        </div>

        <div class="text-center mt-10">
            <h2 class="text-[2rem] text-[#228B22] font-bold mb-10 mt-10">Filling Progress</h2>
            <div class="w-300 mx-auto bg-gray-300 h-10 rounded-full">
                <div class="bg-[#FFEA7B] h-10 rounded-full text-[#936853] text-[1rem] font-bold flex items-center justify-center" style="width: 30%">30 %</div>
            </div>
        </div>

        <h3 class="text-center text-[2rem] text-[#228B22] font-bold mt-10">AIR TRANSPORTATION</h3>
        <div class="w-[70%] mx-auto rounded-lg p-6">
            <div class="bg-[#EFDCC9] p-8">
                <h3 class="text-center text-[1.5rem] text-[#228B22] font-bold mb-8">Seat Type</h3>
                <div class="flex justify-around gap-6" id="seat-type-buttons">
                    @foreach ([
                        'Business Class' => 'business-class',
                        'Economy Class' => 'economy-class',
                    ] as $label => $img)
                        <div class="seat-type-btn text-center border-3 border-[#674636] rounded-xl p-4 w-[200px] h-[250px] bg-white hover:shadow-lg transition cursor-pointer" data-seat-type="{{ strtolower(str_replace(' ', '-', $label)) }}">
                            <img src="{{ asset($img . '.png') }}" alt="{{ $label }}" class="mx-auto h-25 rounded-md">
                            <p class="mt-10 font-bold text-[1.5rem]">{{ $label }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-[#F7EDD7] p-8 hidden" id="trip-type-section">
                <h3 class="text-center text-[1.5rem] text-[#228B22] font-bold mb-8">Trip Type</h3>
                <div class="flex justify-around gap-6" id="trip-type-buttons">
                    @foreach ([
                        'One-Way' => 'one-way',
                        'Round Trip' => 'round-trip',
                    ] as $label => $img)
                        <div class="trip-type-btn text-center border-3 border-[#674636] rounded-xl p-4 w-[200px] h-[250px] bg-white hover:shadow-lg transition cursor-pointer" data-trip-type="{{ strtolower(str_replace(' ', '-', $label)) }}">
                            <img src="{{ asset($img . '.png') }}" alt="{{ $label }}" class="mx-auto h-25 rounded-md">
                            <p class="mt-10 font-bold text-[1.5rem]">{{ $label }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-[#EFDCC9] p-8 hidden" id="flight-frequency-section">
                <h3 class="text-center text-[1.5rem] text-[#228B22] font-bold mb-8">Flight Frequency in a Year</h3>
                <div class="flex justify-center gap-12" id="flight-frequency-buttons">
                    @foreach (range(1, 5) as $number)
                        <div class="flight-frequency-btn text-center cursor-pointer">
                            <div class="w-16 h-16 border-4 border-[#674636] rounded-full flex items-center justify-center bg-white hover:bg-[#F2E0CC] transition">
                                <p class="font-bold text-[1.5rem] text-[#674636]">{{ $number }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-[#EFDCC9] p-8 flex-col items-center justify-center hidden" id="distance-section">
                <div class="mb-8 text-center w-full flex flex-col items-center">
                    <h4 class="text-[#228B22] font-bold text-[1.5rem] mb-8">Distance Traveled (KM/Day)</h4>
                    <div class="w-full max-w-3xl mb-5">
                        <div class="flex justify-between text-sm text-black font-medium mt-2">
                            <span>0km</span>
                            <span>14000km</span>
                        </div>
                        <input type="range" min="0" max="14000" value="0" class="w-full appearance-none bg-transparent distance-slider-air">
                    </div>
                    <div class="distance-value-air mt-8 border-2 border-[#5c3b1e] rounded-xl px-6 py-3 text-xl font-semibold text-[#5c3b1e] w-[250px]">0</div>
                </div>
            </div>
        </div>

        <div class="w-[90%] mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 mt-10 mb-20 text-center">
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Sum (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] emission-sum-air flex justify-center items-center">
                    0.00
                </div>
            </div>
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Total (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] emission-total flex justify-center items-center">
                    0.00
                </div>
            </div>
        </div>

    <div class="flex gap-5 mt-8">
            <button id="prev-btn-page3" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Previous</button>
            <button id="next-btn-page3" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Next</button>
        </div>
    </div>

    <div id="page-4" class="hidden w-full flex flex-col items-center justify-center min-h-screen bg-[#FFF8E8] p-10 rounded-lg shadow-md">
        <div class="flex gap-6 mt-7 px-4 overflow-x-auto">
            <div data-key="land" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('land.png') }}" alt="Land Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Land Transportation</p>
            </div>
            <div data-key="air" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('air.png') }}" alt="Air Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Air Transportation</p>
            </div>
            <div data-key="power" class="category-btn text-center border-3 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('power.png') }}" alt="Household Power" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Power</p>
            </div>
            <div data-key="appliances" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition ">
                <img src="{{ asset('appliances.png') }}" alt="Household Appliances" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Appliances</p>
            </div>
            <div data-key="food" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('food.png') }}" alt="Food" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Food</p>
            </div>
        </div>

        <div class="text-center mt-10">
            <h2 class="text-[2rem] text-[#228B22] font-bold mb-10 mt-10">Filling Progress</h2>
            <div class="w-300 mx-auto bg-gray-300 h-10 rounded-full">
                <div class="bg-[#FFEA7B] h-10 rounded-full text-[#936853] text-[1rem] font-bold flex items-center justify-center" style="width: 50%">50 %</div>
            </div>
        </div>

        <h3 class="text-center text-[2rem] text-[#228B22] font-bold mt-10">HOUSEHOLD POWER</h3>

        <div class="w-[70%] mx-auto flex flex-col mt-10">
            {{-- Number of People at Home? --}}
            <div class="bg-[#EFDCC9] p-8 flex items-center h-[300px]">
                <img src="{{ asset('home-people.png') }}" alt="Household" class="h-full object-contain mr-12 ml-[20px]">
                <h2 class="text-[2.25rem] text-black font-bold flex-grow text-center">Number of People at Home?</h2>
                <input type="number" id="num-people-input" class="border-3 border-[#876656] rounded-lg p-2 w-[180px] h-[70px] text-center text-[2rem] font-bold mr-[40px] bg-[#FFF8E8]" value="0" min="0">
            </div>

            {{-- Power Source --}}
            <div class="bg-[#F7EDD7] p-8">
                <h3 class="text-center text-[1.5rem] text-[#228B22] font-bold mb-8">Power Source</h3>
                <div class="flex justify-around gap-6" id="power-source-buttons">
                    @foreach ([
                        '100% PLN' => '100-pln',
                        '100% Clean Energy' => '100-clean-energy',
                        'Hybrid' => 'hybrid',
                    ] as $label => $img)
                        <div class="power-source-btn text-center border-3 border-[#674636] rounded-xl p-4 w-[200px] h-[250px] bg-white hover:shadow-lg transition cursor-pointer" data-source-type="{{ strtolower(str_replace(['%', ' '], ['', '-'], $label)) }}">
                            <img src="{{ asset($img . '.png') }}" alt="{{ $label }}" class="mx-auto h-25 rounded-md">
                            <p class="mt-10 font-bold text-[1.5rem]">{{ $label }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="pln-inputs" class="flex flex-col hidden">
                {{-- Current Power Installed (VA)? --}}
                <div id="power-installed-div" class="bg-[#EFDCC9] p-8 flex items-center justify-between">
                    <h4 class="text-[1.5rem] text-black font-bold">Current Power Installed (VA)?</h4>
                    <input type="number" id="power-installed-input" class="rounded-lg p-2 w-[500px] h-[70px] text-center text-[1.25rem] font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>

                {{-- Electricity Bill (Rp/month)? --}}
                <div id="electricity-bill-div" class="bg-[#EFDCC9] p-8 flex items-center justify-between">
                    <h4 class="text-[1.5rem] text-black font-bold">Electricity Bill (Rp/month)?</h4>
                    <input type="number" id="electricity-bill-input" class="rounded-lg p-2 w-[500px] h-[70px] text-center text-[1.25rem] font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>

                {{-- Electricity consumption (kwh/month)? --}}
                <div id="electricity-consumption-div" class="bg-[#EFDCC9] p-8 flex items-center justify-between">
                    <h4 class="text-[1.5rem] text-black font-bold">Electricity consumption (kwh/month)?</h4>
                    <input type="number" id="electricity-consumption-input" class="rounded-lg p-2 w-[500px] h-[70px] text-center text-[1.25rem] font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>
            </div>

            <div id="clean-energy-inputs" class="flex flex-col hidden">
                {{-- If you use a clean energy source, what energy is used? --}}
                <div id="clean-energy-source-type-div" class="bg-[#EFDCC9] p-8 flex items-center justify-between">
                    <h4 class="text-[1.5rem] text-black font-bold">If you use a clean energy source,<br>what energy is used?</h4>
                    <select id="clean-energy-source-type-select" class="rounded-lg p-2 w-[500px] h-[70px] text-center text-[1.25rem] font-bold bg-[#FFF8E8]">
                        <option value="solar">Solar PV</option>
                        <option value="wind">Wind Power</option>
                        <option value="hydro">Hydropower</option>
                        <option value="geothermal">Geothermal</option>
                        <option value="biomass">Biomass (Sustainable)</option>
                        <option value="other_clean">Other Clean Energy</option>
                    </select>
                </div>

                {{-- How many kWh are generated from clean energy sources? (kWh/month)? --}}
                <div id="kwh-generated-div" class="bg-[#EFDCC9] p-8 flex items-center justify-between">
                    <h4 class="text-[1.5rem] text-black font-bold">How many kWh are generated from<br>clean energy sources? (kWh/month)?</h4>
                    <input type="number" id="kwh-generated-input" class="rounded-lg p-2 w-[500px] h-[70px] text-center text-[1.25rem] font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>
            </div>
        </div>

        <div class="w-[90%] mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 mt-10 mb-20 text-center">
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Sum (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] emission-sum-power flex justify-center items-center">
                    0.00
                </div>
            </div>
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Total (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] emission-total flex justify-center items-center">
                    0.00
                </div>
            </div>
        </div>

        <div class="flex gap-5 mt-8">
            <button id="prev-btn-page4" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Previous</button>
            <button id="next-btn-page4" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Next</button>
        </div>
    </div>

    <div id="page-5" class="hidden w-full flex flex-col items-center justify-center min-h-screen bg-[#FFF8E8] p-10 rounded-lg shadow-md">
        <div class="flex gap-6 mt-7 px-4 overflow-x-auto">
            <div data-key="land" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('land.png') }}" alt="Land Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Land Transportation</p>
            </div>
            <div data-key="air" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('air.png') }}" alt="Air Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Air Transportation</p>
            </div>
            <div data-key="power" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('power.png') }}" alt="Household Power" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Power</p>
            </div>
            <div data-key="appliances" class="category-btn text-center border-3 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition ">
                <img src="{{ asset('appliances.png') }}" alt="Household Appliances" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Appliances</p>
            </div>
            <div data-key="food" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('food.png') }}" alt="Food" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Food</p>
            </div>
        </div>

        <div class="text-center mt-10">
            <h2 class="text-[2rem] text-[#228B22] font-bold mb-10 mt-10">Filling Progress</h2>
            <div class="w-300 mx-auto bg-gray-300 h-10 rounded-full">
                <div class="bg-[#FFEA7B] h-10 rounded-full text-[#936853] text-[1rem] font-bold flex items-center justify-center" style="width: 70%">70 %</div>
            </div>
        </div>

        <h3 class="text-center text-[2rem] text-[#228B22] font-bold mt-10">HOUSEHOLD APPLIANCES</h3>

        <div class="w-[80%] mx-auto flex flex-col mt-10">
            <div class="relative flex justify-center items-center w-full gap-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 w-full max-w-5xl">
                    <div class="appliance-item bg-[#EFDCC9] rounded-xl p-6 flex flex-col items-center justify-center text-center h-96">
                        <img src="{{ asset('lighting.png') }}" alt="Lighting" class="h-40 object-contain mb-4">
                        <p class="font-bold text-[1.5rem] text-black mb-20">Lighting</p>
                        <input type="checkbox" data-appliance="lighting" class="appliance-checkbox w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22]">
                    </div>
                    <div class="appliance-item bg-[#EFDCC9] rounded-xl p-6 flex flex-col items-center justify-center text-center h-96">
                        <img src="{{ asset('air-conditioner.png') }}" alt="Air Conditioner" class="h-40 object-contain mb-4">
                        <p class="font-bold text-[1.5rem] text-black mb-20">Air Conditioner</p>
                        <input type="checkbox" data-appliance="air-conditioner" class="appliance-checkbox w-10 h-10 rounded-3xl bg-[#FFF8E8] checked:bg-[#228B22]">
                    </div>
                    <div class="appliance-item bg-[#EFDCC9] rounded-xl p-6 flex flex-col items-center justify-center text-center h-96">
                        <img src="{{ asset('refrigerator.png') }}" alt="Refrigerator" class="h-40 object-contain mb-4">
                        <p class="font-bold text-[1.5rem] text-black mb-20">Refrigerator</p>
                        <input type="checkbox" data-appliance="refrigerator" class="appliance-checkbox w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] ">
                    </div>
                </div>
            </div>
        </div>

        <div class="w-[90%] mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 mt-10 mb-20 text-center">
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Sum (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] emission-sum-appliances flex justify-center items-center">
                    0.00
                </div>
            </div>
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Total (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] emission-total flex justify-center items-center">
                    0.00
                </div>
            </div>
        </div>

        <div class="flex gap-5 mt-8">
            <button id="prev-btn-page5" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Previous</button>
            <button id="next-btn-page5" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Next</button>
        </div>
    </div>

    <div id="lighting-popup-template" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl w-1/2 flex"> 
            <div class="w-1/3 flex justify-center items-center pr-8"> 
                <img src="{{ asset('lighting.png') }}" alt="Lighting" class="h-60 object-contain"> 
            </div>
            <div class="w-2/3 flex flex-col justify-between"> 
                <h2 class="text-2xl font-bold mb-4 text-center">Lighting</h2>
                <div class="mb-4 w-full">
                    <h2 class="block text-black text-lg font-bold mb-3 text-xl">What type of light do you use?</h2>
                    <div class="flex justify-around gap-2 mb-4 lighting-type-buttons">
                        <div class="lighting-type-btn text-center border-1 border-[#674636] rounded-xl p-4 w-[150px] h-[175px] bg-white hover:shadow-lg transition cursor-pointer" data-light-type="incandescent">
                            <img src="{{ asset('incandescent.png') }}" alt="Incandescent" class="mx-auto h-20 object-contain">
                            <p class="mt-2 font-bold text-[1rem]">Incandescent</p>
                        </div>
                        <div class="lighting-type-btn text-center border-1 border-[#674636] rounded-xl p-4 w-[150px] h-[175px] bg-white hover:shadow-lg transition cursor-pointer" data-light-type="neon">
                            <img src="{{ asset('neon.png') }}" alt="Neon" class="mx-auto h-20 object-contain">
                            <p class="mt-2 font-bold text-[1rem]">Neon</p>
                        </div>
                        <div class="lighting-type-btn text-center border-1 border-[#674636] rounded-xl p-4 w-[150px] h-[175px] bg-white hover:shadow-lg transition cursor-pointer" data-light-type="led">
                            <img src="{{ asset('led.png') }}" alt="LED" class="mx-auto h-20 object-contain">
                            <p class="mt-2 font-bold text-[1rem]">LED</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4 w-full">
                    <h2 for="lighting-count" class="block text-black text-lg font-bold mb-3 text-xl">How many lights do you use?</h2>
                    <input type="number" id="lighting-count" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>
            <div class="mb-6 w-full">
                    <h2 for="lighting-usage" class="block text-black text-lg font-bold mb-3 text-xl">How long is your average usage (Hours/Day)?</h2>
                    <input type="number" id="lighting-usage" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>
                <button class="appliance-apply-btn bg-green-600 text-white font-semibold px-8 py-3 rounded-xl hover:bg-green-800 transition" data-appliance="lighting">Apply</button>
            </div>
        </div>
    </div>
    
    <div id="air-conditioner-popup-template" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl w-1/2 flex">
            <div class="w-1/3 flex justify-center items-center pr-8">
                <img src="{{ asset('air-conditioner.png') }}" alt="Air Conditioner" class="h-60 object-contain">
            </div>

            <div class="w-2/3 flex flex-col justify-between">
                <h2 class="text-2xl font-bold mb-4 text-center">Air Conditioner</h2>
                <div class="mb-4 w-full">
                    <h2 for="ac-inverter-tech" class="block text-black text-lg font-bold mb-3 text-xl">Have you used AC with inverter technology?</h2>
                    <select id="ac-inverter-tech" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="mb-4 w-full">
                    <label for="ac-count" class="block text-black text-lg font-bold mb-3 text-xl">How many air conditioners are used?</h2>
                    <input type="number" id="ac-count" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>
                
                <div class="mb-6 w-full">
                    <h2 for="ac-usage" class="block text-black text-lg font-bold mb-3 text-xl">How long is your average usage (Hours/Day)?</h2>
                    <input type="number" id="ac-usage" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>
                
                <button class="appliance-apply-btn bg-green-600 text-white font-semibold px-8 py-3 rounded-xl hover:bg-green-800 transition" data-appliance="air-conditioner">Apply</button>
            </div>
        </div>
    </div>

        
    <div id="refrigerator-popup-template" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl w-1/2 flex">
            <div class="w-1/3 flex justify-center items-center pr-8">
                <img src="{{ asset('refrigerator.png') }}" alt="Refrigerator" class="h-60 object-contain">
            </div>

            <div class="w-2/3 flex flex-col justify-between">
                <h2 class="text-2xl font-bold mb-4 text-center">Refrigerator</h2>
                <div class="mb-4 w-full">
                    <h2 for="refrigerator-inverter-tech" class="block text-black text-lg font-bold mb-3 text-xl">Have you used a refrigerator with Inverter technology?</h2>
                    <select id="refrigerator-inverter-tech" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="mb-4 w-full">
                    <label for="refrigerator-count" class="block text-black text-lg font-bold mb-3 text-xl">How many refrigerators are used?</h2>
                    <input type="number" id="refrigerator-count" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>
                
                <div class="mb-6 w-full">
                    <h2 for="refrigerator-usage" class="block text-black text-lg font-bold mb-3 text-xl">How long is your average usage (Hours/Day)?</h2>
                    <input type="number" id="refrigerator-usage" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]" value="0" min="0">
                </div>
                
                <button class="appliance-apply-btn bg-green-600 text-white font-semibold px-8 py-3 rounded-xl hover:bg-green-800 transition" data-appliance="refrigerator">Apply</button>
            </div>
        </div>
    </div>

    <div id="page-6" class="hidden w-full flex flex-col items-center justify-center min-h-screen bg-[#FFF8E8] p-10 rounded-lg shadow-md">
        <div class="flex gap-6 mt-7 px-4 overflow-x-auto">
            <div data-key="land" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('land.png') }}" alt="Land Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Land Transportation</p>
            </div>
            <div data-key="air" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('air.png') }}" alt="Air Transportation" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Air Transportation</p>
            </div>
            <div data-key="power" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('power.png') }}" alt="Household Power" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Power</p>
            </div>
            <div data-key="appliances" class="category-btn text-center border-1 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition ">
                <img src="{{ asset('appliances.png') }}" alt="Household Appliances" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Household Appliances</p>
            </div>
            <div data-key="food" class="category-btn text-center border-3 border-[#674636] rounded-lg p-4 w-[200px] h-[200px] hover:shadow-lg transition">
                <img src="{{ asset('food.png') }}" alt="Food" class="mx-auto h-30 rounded-md">
                <p class="font-bold mt-1 text-black text-[1rem]">Food</p>
            </div>
        </div>

        <div class="text-center mt-10">
            <h2 class="text-[2rem] text-[#228B22] font-bold mb-10 mt-10">Filling Progress</h2>
            <div class="w-300 mx-auto bg-gray-300 h-10 rounded-full">
                <div class="bg-[#FFEA7B] h-10 rounded-full text-[#936853] text-[1rem] font-bold flex items-center justify-center" style="width: 90%">90 %</div>
            </div>
        </div>
        
        
        <h3 class="text-center text-[2rem] text-[#228B22] font-bold mt-10">FOOD</h3>
        <div class="w-[80%] mx-auto flex flex-col mt-10">
            <div class="relative flex justify-center items-center w-full gap-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 w-full max-w-5xl">
                    <div class="bg-[#EFDCC9] rounded-xl p-6 flex flex-col justify-between items-center text-center h-96">
                        <div>
                            <img src="{{ asset('egg.png') }}" alt="Egg" class="h-40 object-contain mb-4 mt-10">
                            <p class="font-bold text-[1.5rem] text-black">Egg</p>
                        </div>
                        <input type="checkbox" class="w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] mt-auto food-checkbox" data-food-item="egg">
                    </div>
                    <div class="bg-[#EFDCC9] rounded-xl p-6 flex flex-col justify-between items-center text-center h-96">
                        <div>
                            <img src="{{ asset('milk.png') }}" alt="Milk" class="h-40 object-contain mb-4 mt-10">
                            <p class="font-bold text-[1.5rem] text-black">Milk</p>
                        </div>
                        <input type="checkbox" class="w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] mt-auto food-checkbox" data-food-item="milk">
                    </div>
                    <div class="bg-[#EFDCC9] rounded-xl p-6 flex flex-col justify-between items-center text-center h-96">
                        <div>
                            <img src="{{ asset('fish.png') }}" alt="Fish" class="h-40 object-contain mb-4 mt-10">
                            <p class="font-bold text-[1.5rem] text-black">Fish</p>
                        </div>
                        <input type="checkbox" class="w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] mt-auto food-checkbox" data-food-item="fish">
                    </div>
                    <div class="bg-[#EFDCC9] rounded-xl p-6 flex flex-col justify-between items-center text-center h-96">
                        <div>
                            <img src="{{ asset('rice.png') }}" alt="Rice" class="h-40 object-contain mb-4 mt-10">
                            <p class="font-bold text-[1.5rem] text-black">Rice</p>
                        </div>
                        <input type="checkbox" class="w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] mt-auto food-checkbox" data-food-item="rice">
                    </div>
                    <div class="bg-[#EFDCC9] rounded-xl p-6 flex flex-col justify-between items-center text-center h-96">
                        <div>
                            <img src="{{ asset('seafood.png') }}" alt="Seafood" class="h-40 object-contain mb-4 mt-10">
                            <p class="font-bold text-[1.5rem] text-black">Seafood</p>
                        </div>
                        <input type="checkbox" class="w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] mt-auto food-checkbox" data-food-item="seafood">
                    </div>
                    <div class="bg-[#EFDCC9] rounded-xl p-6 flex flex-col justify-between items-center text-center h-96">
                        <div>
                            <img src="{{ asset('poultry.png') }}" alt="Poultry" class="h-40 object-contain mb-4 mt-10">
                            <p class="font-bold text-[1.5rem] text-black">Poultry</p>
                        </div>
                        <input type="checkbox" class="w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] mt-auto food-checkbox" data-food-item="poultry">
                    </div>
                    <div class="bg-[#EFDCC9] rounded-xl p-6 flex flex-col justify-between items-center text-center h-96">
                        <div>
                            <img src="{{ asset('sheep.png') }}" alt="Sheep" class="h-40 object-contain mb-4 mt-10">
                            <p class="font-bold text-[1.5rem] text-black">Sheep</p>
                        </div>
                        <input type="checkbox" class="w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] mt-auto food-checkbox" data-food-item="sheep">
                    </div>
                    <div class="bg-[#EFDCC9] rounded-xl p-6 flex flex-col justify-between items-center text-center h-96">
                        <div>
                            <img src="{{ asset('meat.png') }}" alt="Meat" class="h-40 object-contain mb-4 mt-10">
                            <p class="font-bold text-[1.5rem] text-black">Meat</p>
                        </div>
                        <input type="checkbox" class="w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] mt-auto food-checkbox" data-food-item="meat">
                    </div>
                    <div class="bg-[#EFDCC9] rounded-xl p-6 flex flex-col justify-between items-center text-center h-96">
                        <div>
                            <img src="{{ asset('processed-milk.png') }}" alt="Process Milk" class="h-40 object-contain mb-4 mt-10">
                            <p class="font-bold text-[1.5rem] text-black">Process Milk</p>
                        </div>
                        <input type="checkbox" class="w-10 h-10 rounded-xl bg-[#FFF8E8] checked:bg-[#228B22] mt-auto food-checkbox" data-food-item="processedMilk">
                    </div>
                </div>
            </div>
        </div>

        <div class="w-[90%] mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 mt-10 mb-20 text-center">
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Sum (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] flex justify-center items-center emission-sum-food">
                    0.00
                </div>
            </div>
            <div>
                <h5 class="text-black font-bold text-[1.5rem]">Emission Total (ton CO2/Year)</h5>
                <div class="mt-5 border-3 border-[#674636] rounded-xl inline-block bg-[#FFF8E8] w-[375px] h-[50px] font-bold text-[1.5rem] emission-total flex justify-center items-center">
                    0.00
                </div>
            </div>
        </div>

        <div class="flex gap-5 mt-8">
            <button id="prev-btn-page6" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Previous</button>
            <button id="next-btn-page6" class="bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">Next</button>
        </div>
    </div>

    <div id="food-popup-template" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl w-1/3"> <h2 class="text-2xl font-bold mb-4 text-center food-popup-title">Food: <span id="food-item-name-display">[Food Type]</span></h2> <div class="flex flex-col items-center">
                <img src="" alt="Food Item" class="h-40 object-contain mb-4 food-popup-image"> 
                
                <div class="mb-4 w-full">
                    <label for="food-consumption-frequency" class="block text-gray-700 text-lg font-semibold mb-2">How often do you consume this food type?</label>
                    <select id="food-consumption-frequency" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]">
                        <option value="daily">Daily</option>
                        <option value="few_times_week">A Few Times A Week</option>
                        <option value="once_week">Once A Week</option>
                        <option value="monthly">Monthly</option>
                        <option value="rarely">Rarely</option>
                        <option value="never">Never</option>
                    </select>
                </div>
                
                <div class="mb-6 w-full">
                    <label for="food-portion-size" class="block text-gray-700 text-lg font-semibold mb-2">What is your average portion size?</label>
                    <select id="food-portion-size" class="border-3 border-[#876656] rounded-lg p-2 w-full h-12 text-center text-lg font-bold bg-[#FFF8E8]">
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                
                <button class="food-apply-btn bg-green-600 text-white font-semibold px-8 py-3 rounded-xl hover:bg-green-800 transition">Apply</button>
            </div>
        </div>
    </div>

    {{-- Confirmation Dialog --}}
    <div id="confirmation-dialog" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-[1000]">
        <div class="bg-white p-8 rounded-lg shadow-xl flex flex-col gap-5 text-center max-w-sm w-full">
            <p class="text-lg font-semibold text-gray-800">Are you sure you want to proceed to the final page?</p>
            <div class="flex justify-center gap-4">
                <button id="cancel-btn" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                    Cancel
                </button>
                <button id="save-btn" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                    Save
                </button>
            </div>
        </div>
    </div>  

    <div id="page-7" class="w-full flex flex-col items-center justify-center min-h-screen bg-[#FFF8E8] p-10 rounded-lg shadow-md mx-auto text-center">
        <h1 class="text-6xl font-bold text-[#124C12] mb-10">Your Carbon Footprint Result:</h1>
        <div class="mb-4">
            <img src="{{ asset('calculator.png') }}" alt="CO2 Footprint" class="w-75 h-75 mx-auto">
        </div>
        <div class="flex items-baseline justify-center gap-5 mb-10">
            <div class="text-6xl font-bold text-[#2E573F] emission-total">
                <span id="calculated-emission-value">0.00</span>
            </div>
            <div>
                <span class="text-4xl font-semibold text-[#2E573F]">Ton CO2-eq/Year/Capita</span>
            </div>
        </div>

        <div class="flex justify-around w-full max-w-[90%] pt-10">
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center min-w-[300px] mx-2 border-3 border-[#124C12]">
                <h2 class="text-3xl font-bold text-[#124C12] mb-2">Global Average</h2>
                <h4 class="text-2xl font-semibold text-[#228B22]">4.7 TonCO2-eq/Year/Capita</h4>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center min-w-[300px] mx-2 border-3 border-[#124C12]">
                <h2 class="text-3xl font-bold text-[#124C12] mb-2">ASEAN Average</h2>
                <h4 class="text-2xl font-semibold text-[#228B22]">4.1 TonCO2-eq/Year/Capita</h4>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center min-w-[300px] mx-2 border-3 border-[#124C12]">
                <h2 class="text-3xl font-bold text-[#124C12] mb-2">Indonesia Average</h2>
                <h4 class="text-2xl font-semibold text-[#228B22]">2.5 TonCO2-eq/Year/Capita</h4>
            </div>
        </div>

        <button id="back-to-calculator-btn" class="mt-12 bg-[#124C12] text-white px-8 py-4 rounded-lg font-bold text-xl hover:bg-[#228B22] transition duration-300 ease-in-out shadow-lg">
            Back to Main Calculator
        </button>
    </div>
</div>
@endsection

<script>
document.addEventListener("DOMContentLoaded", function () {
    const vehicleFuelMap = {
        car: ['electricity', 'gas', 'solar'],
        motorcycle: ['electricity', 'gas'],
        bus: ['solar', 'electricity'],
        train: ['solar', 'electricity']
    };

    let vehicleCount = 0;
    const container = document.getElementById("vehicles-container");
    const addBtn = document.getElementById("add-vehicle");

    const allEmissions = {
        land: 0,
        air: 0,
        power: 0,
        appliances: 0,
        food: 0
    };

    // Data storage for appliances 
    let applianceData = {
        'lighting': { type: '', count: 0, usage: 0 },
        'air-conditioner': { inverter: 'no', count: 0, usage: 0 },
        'refrigerator': { inverter: 'no', count: 0, usage: 0 }
    };

    function resetApplianceData() {
        applianceData = {
            'lighting': { type: '', count: 0, usage: 0 },
            'air-conditioner': { inverter: 'no', count: 0, usage: 0 },
            'refrigerator': { inverter: 'no', count: 0, usage: 0 }
        };

        document.querySelectorAll('.appliance-checkbox').forEach(checkbox => {
            checkbox.checked = false;
        });

        closeAppliancePopup();

        calculateAppliancesEmissions();
    }

    const ipccGridElectricityEmissionFactor = 0.85; 

    const applianceTypicalWattage = {
        lighting: {
            incandescent: 60, // Watts
            neon: 20,         // Watts
            led: 10           // Watts
        },
        'air-conditioner': {
            'no': 1000,  // Non-inverter AC, Watts (e.g., 1 PK = 1000W-ish)
            'yes': 700   // Inverter AC, Watts (more efficient)
        },
        refrigerator: {
            'no': 150,  // Non-inverter Refrigerator, Watts
            'yes': 100  // Inverter Refrigerator, Watts (more efficient)
        }
    };

    
    function updateTotalEmission() {
        let total = 0;
        for (const category in allEmissions) {
            total += allEmissions[category];
        }
        document.querySelectorAll(".emission-total").forEach(el => el.textContent = total.toFixed(2));
    }


    function createVehicleCard(index) {
        const wrapper = document.createElement("div");
        wrapper.className = "w-[80%] mx-auto rounded-lg p-6";
        wrapper.dataset.index = index;

        wrapper.innerHTML = `
            <div class="bg-[#EFDCC9] p-8">
                <h4 class="text-xl font-bold text-[#228B22] mb-4">Vehicle ${index + 1}</h4>
                <h3 class="text-center text-[1.5rem] text-[#228B22] font-bold mb-8">Transportation Type</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 justify-items-center">
                    ${['car', 'motorcycle', 'bus', 'train'].map(type => `
                        <button class="transport-btn text-center border-3 border-[#674636] rounded-xl p-4 w-[200px] h-[230px] bg-white hover:shadow-lg transition" data-type="${type}">
                            <img src="{{ asset('${type}.png') }}" class="mx-auto h-27.5 rounded-md">
                            <p class="mt-10 font-bold text-[1.5rem]">${type.charAt(0).toUpperCase() + type.slice(1)}</p>
                        </button>
                    `).join('')}
                </div>
            </div>

            <div class="bg-[#F7EDD7] p-8 fuel-section hidden">
                <h3 class="text-center text-[1.5rem] text-[#228B22] font-bold mb-8">Fuel Type</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 justify-items-center fuel-buttons"></div>
            </div>

            <div class="bg-[#EFDCC9] p-8 flex flex-col items-center justify-center distance-section hidden">
                <div class="mb-8 text-center w-full flex flex-col items-center">
                    <h4 class="text-[#228B22] font-bold text-[1.5rem] mb-8">Distance Traveled (KM/Day)</h4>
                    <div class="w-full max-w-3xl mb-5">
                        <div class="flex justify-between text-sm text-black font-medium mt-2">
                            <span>0km</span>
                            <span>100km</span>
                        </div>
                        <input type="range" min="0" max="100" value="0" class="w-full appearance-none bg-transparent distance-slider">
                    </div>
                    <div class="distance-value mt-8 border-2 border-[#5c3b1e] rounded-xl px-6 py-3 text-xl font-semibold text-[#5c3b1e] w-[250px]">0</div>
                </div>
                <div class="mt-8">
                    <button class="remove-btn mt-4 hidden font-semibold bg-red-600 text-white px-10 py-3 rounded-xl">Remove</button>
                </div>
            </div>
        `;

        container.appendChild(wrapper);
        attachEvents(wrapper);
        updateRemoveButtons();
        updateNavButtons();
    }

    function attachEvents(wrapper) {
        const transportButtons = wrapper.querySelectorAll(".transport-btn");
        const fuelSection = wrapper.querySelector(".fuel-section");
        const fuelButtonsDiv = wrapper.querySelector(".fuel-buttons");
        const distanceSection = wrapper.querySelector(".distance-section");
        const distanceSlider = wrapper.querySelector(".distance-slider");
        const distanceValue = wrapper.querySelector(".distance-value");
        const removeBtn = wrapper.querySelector(".remove-btn");

        let selectedTransport = null;
        let selectedFuel = null;

        transportButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                selectedTransport = btn.dataset.type;
                transportButtons.forEach(b => b.classList.remove("bg-green-300", "selected-btn"));
                btn.classList.add("bg-green-300", "selected-btn");

                const fuels = vehicleFuelMap[selectedTransport] || [];
                fuelButtonsDiv.innerHTML = fuels.map(fuel => `
                    <button class="fuel-btn text-center border-3 border-[#674636] rounded-xl p-4 w-[200px] h-[230px] bg-white hover:shadow-lg transition" data-fuel="${fuel}">
                        <img src="{{ asset('${fuel}.png') }}" class="mx-auto h-30 rounded-md">
                        <p class="mt-5 font-bold text-[1.5rem]">${fuel.charAt(0).toUpperCase() + fuel.slice(1)}</p>
                    </button>
                `).join('');

                fuelSection.classList.remove("hidden");
                distanceSection.classList.add("hidden");

                fuelButtonsDiv.querySelectorAll(".fuel-btn").forEach(fuelBtn => {
                    fuelBtn.addEventListener("click", () => {
                        selectedFuel = fuelBtn.dataset.fuel;
                        fuelButtonsDiv.querySelectorAll(".fuel-btn").forEach(b => b.classList.remove("bg-green-300", "selected-btn"));
                        fuelBtn.classList.add("bg-green-300", "selected-btn");
                        distanceSection.classList.remove("hidden");
                        calculateEmissions();
                    });
                });
                calculateEmissions();
            });
        });

        distanceSlider.addEventListener("input", () => {
            distanceValue.textContent = distanceSlider.value;
            calculateEmissions();
        });

        removeBtn.addEventListener("click", () => {
            wrapper.remove();
            vehicleCount--;
            refreshVehicleIndexes();
            updateRemoveButtons();
            updateNavButtons();
            calculateEmissions();
        });
    }

    const emissionFactors = {
        car: {
            gas: 0.184,        // kg CO2/km
            solar: 0.162,      // kg CO2/km
            electricity: 0.12 // kg CO2/km
        },
        motorcycle: {
            gas: 0.0575,        // kg CO2/km
            electricity: 0.024 // kg CO2/km
        },
        bus: {
            solar: 0.81,      // kg CO2/km
            electricity: 0.6 // kg CO2/km
        },
        train: {
            solar: 5.4,      // kg CO2/km
            electricity: 6.0 // kg CO2/km
        }
    };


    function refreshVehicleIndexes() {
        const wrappers = container.querySelectorAll("[data-index]");
        wrappers.forEach((w, idx) => {
            w.querySelector("h4").textContent = `Vehicle ${idx + 1}`;
            w.dataset.index = idx; // Update the data-index attribute
        });
    }

    function updateRemoveButtons() {
        const wrappers = container.querySelectorAll("[data-index]");
        wrappers.forEach((w, idx) => {
            const removeBtn = w.querySelector(".remove-btn");
            if (wrappers.length > 1 && idx !== wrappers.length - 1) {
                removeBtn.classList.remove("hidden");
            } else {
                removeBtn.classList.add("hidden");
            }
        });
    }

    function calculateEmissions() {
        let totalLandEmission = 0;
        const wrappers = container.querySelectorAll("[data-index]");

        wrappers.forEach(wrapper => {
            const transportBtn = wrapper.querySelector(".transport-btn.selected-btn");
            const fuelBtn = wrapper.querySelector(".fuel-btn.selected-btn");
            const distanceInput = wrapper.querySelector(".distance-slider");

            if (!transportBtn || !fuelBtn || !distanceInput) return;

            const type = transportBtn.dataset.type;
            const fuel = fuelBtn.dataset.fuel;
            const distance = parseFloat(distanceInput.value);

            const ef = emissionFactors[type]?.[fuel];
            if (!ef) return;

            const dailyEmission = distance * ef; // kg CO2/day
            const annualEmission = dailyEmission * 365 / 1000; // ton CO2/year

            totalLandEmission += annualEmission;
        });

        allEmissions.land = totalLandEmission;

        document.querySelector(".emission-sum-land").textContent = totalLandEmission.toFixed(2);
        updateTotalEmission();
    }

    const airEmissionFactors = {
        'domestic-regional': {
            'economy-class': {
                'per_km_per_passenger_CO2e': 0.26744 // kg CO2e/pkm
            },
            'business-class': {
                'per_km_per_passenger_CO2e': 0.26744
            }
        },
        'short-haul': {
            'economy-class': {
                'per_km_per_passenger_CO2e': 0.15845 // kg CO2e/pkm
            },
            'business-class': {
                'per_km_per_passenger_CO2e': 0.23767 // kg CO2e/pkm
            }
        },
        'long-haul': {
            'economy-class': {
                'per_km_per_passenger_CO2e': 0.15119 // kg CO2e/pkm
            },
            'business-class': {
                'per_km_per_passenger_CO2e': 0.43843 // kg CO2e/pkm
            },
            'first-class': {
                'per_km_per_passenger_CO2e': 0.60473 // kg CO2e/pkm
            }
        }
    };

    let selectedSeatType = null;
    let selectedTripType = null;
    let selectedFlightFrequency = null;
    let selectedAirDistance = 0;

    const seatTypeButtons = document.querySelectorAll(".seat-type-btn");
    const tripTypeSection = document.getElementById("trip-type-section");
    const tripTypeButtons = document.querySelectorAll(".trip-type-btn");
    const flightFrequencySection = document.getElementById("flight-frequency-section");
    const flightFrequencyButtons = document.querySelectorAll(".flight-frequency-btn");
    const distanceSectionAir = document.getElementById("distance-section");
    const distanceSliderAir = document.querySelector(".distance-slider-air");
    const distanceValueAir = document.querySelector(".distance-value-air");

    seatTypeButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            seatTypeButtons.forEach(b => b.classList.remove("bg-green-300", "selected-btn"));
            btn.classList.add("bg-green-300", "selected-btn");
            selectedSeatType = btn.dataset.seatType;
            tripTypeSection.classList.remove("hidden");
            calculateAirEmissions();
        });
    });

    tripTypeButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            tripTypeButtons.forEach(b => b.classList.remove("bg-green-300", "selected-btn"));
            btn.classList.add("bg-green-300", "selected-btn");
            selectedTripType = btn.dataset.tripType;
            flightFrequencySection.classList.remove("hidden");
            calculateAirEmissions();
        });
    });

    flightFrequencyButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            flightFrequencyButtons.forEach(b => {
                b.querySelector('div').classList.remove("bg-[#F2E0CC]", "border-green-500");
                b.querySelector('p').classList.remove("text-green-700");
            });
            btn.querySelector('div').classList.add("bg-[#F2E0CC]", "border-green-500");
            btn.querySelector('p').classList.add("text-green-700");
            selectedFlightFrequency = parseInt(btn.querySelector('p').textContent);
            distanceSectionAir.classList.remove("hidden");
            calculateAirEmissions();
        });
    });

    distanceSliderAir.addEventListener("input", () => {
        selectedAirDistance = parseFloat(distanceSliderAir.value);
        distanceValueAir.textContent = selectedAirDistance;
        calculateAirEmissions();
    });

    function calculateAirEmissions() {
        let currentAirEmission = 0;

        if (selectedSeatType && selectedTripType && selectedFlightFrequency !== null && selectedAirDistance !== null && selectedAirDistance >= 0) {

            let haulType = '';
            if (selectedAirDistance < 700) {
                haulType = 'domestic-regional';
            } else if (selectedAirDistance >= 700 && selectedAirDistance <= 3700) {
                haulType = 'short-haul';
            } else if (selectedAirDistance > 3700) {
                haulType = 'long-haul';
            } else {
                console.warn("Invalid selectedAirDistance for haul type categorization.");
                allEmissions.air = 0;
                document.querySelector(".emission-sum-air").textContent = "0.00";
                updateTotalEmission();
                return;
            }

            const baseFactorPerPkm = airEmissionFactors?.[haulType]?.[selectedSeatType]?.['per_km_per_passenger_CO2e'];

            if (baseFactorPerPkm === undefined) {
                console.warn(`Air emission factor not found for haulType: ${haulType} and seatType: ${selectedSeatType}`);
                allEmissions.air = 0;
                document.querySelector(".emission-sum-air").textContent = "0.00";
                updateTotalEmission();
                return;
            }

            let totalDistancePerTrip = selectedAirDistance;
            if (selectedTripType === 'round-trip') {
                totalDistancePerTrip *= 2;
            }
            const emissionPerTripKg = totalDistancePerTrip * baseFactorPerPkm;

            const annualEmissionKg = emissionPerTripKg * selectedFlightFrequency;

            currentAirEmission = annualEmissionKg / 1000;

        } else {
            currentAirEmission = 0;
        }

        allEmissions.air = currentAirEmission;
        document.querySelector(".emission-sum-air").textContent = currentAirEmission.toFixed(2);
        updateTotalEmission();
    }

    const powerSourceButtons = document.querySelectorAll(".power-source-btn");
    const numPeopleInput = document.getElementById("num-people-input");

    const plnInputsDiv = document.getElementById("pln-inputs");
    const powerInstalledInput = document.getElementById("power-installed-input");
    const electricityBillInput = document.getElementById("electricity-bill-input");
    const electricityConsumptionInput = document.getElementById("electricity-consumption-input");

    const cleanEnergyInputsDiv = document.getElementById("clean-energy-inputs");
    const cleanEnergySourceTypeSelect = document.getElementById("clean-energy-source-type-select");
    const kwhGeneratedInput = document.getElementById("kwh-generated-input");

    let selectedPowerSource = null; 

    function updatePowerInputsVisibility() {
        // Hide all input sections first
        plnInputsDiv.classList.add("hidden");
        cleanEnergyInputsDiv.classList.add("hidden");

        // Show relevant input sections based on selected power source
        if (selectedPowerSource === '100-pln') {
            plnInputsDiv.classList.remove("hidden");
        } else if (selectedPowerSource === '100-clean-energy') {
            cleanEnergyInputsDiv.classList.remove("hidden");
        } else if (selectedPowerSource === 'hybrid') {
            plnInputsDiv.classList.remove("hidden");
            cleanEnergyInputsDiv.classList.remove("hidden");
        }
        // Recalculate emissions whenever visibility changes
        calculatePowerEmissions();
    }

    // Add event listeners to power source buttons
    powerSourceButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            // Remove 'selected-btn' class from all buttons
            powerSourceButtons.forEach(b => b.classList.remove("selected-btn"));
            // Add 'selected-btn' class to the clicked button
            btn.classList.add("selected-btn");
            // Store the data-source-type value
            selectedPowerSource = btn.dataset.sourceType;
            // Update input field visibility
            updatePowerInputsVisibility();
        });
    });

    numPeopleInput.addEventListener("input", calculatePowerEmissions);
    powerInstalledInput.addEventListener("input", calculatePowerEmissions);
    electricityBillInput.addEventListener("input", calculatePowerEmissions);
    electricityConsumptionInput.addEventListener("input", calculatePowerEmissions);
    cleanEnergySourceTypeSelect.addEventListener("change", calculatePowerEmissions);
    kwhGeneratedInput.addEventListener("input", calculatePowerEmissions);


    const emissionFactorPower = {
        pln_kwh: 0.70, 
        solar: 0.045,      // Solar PV (average life-cycle emissions, around 45 gCO2e/kWh)
        wind: 0.011,       // Wind Power (average life-cycle emissions, around 11 gCO2e/kWh)
        hydro: 0.024,      // Hydropower (average life-cycle emissions, around 24 gCO2e/kWh, can vary widely based on reservoir type)
        geothermal: 0.045, // Geothermal (average life-cycle emissions, around 45 gCO2e/kWh)
        biomass: 0.230,    // Biomass (sustainable, can vary greatly based on feedstock, around 230 gCO2e/kWh. Note: Burning biomass can release CO2, but if sustainably sourced, it's considered carbon neutral over its lifecycle in some frameworks)
        other_clean: 0.020 // A generic low value for other clean sources, around 20 gCO2e/kWh
    };

    function calculatePowerEmissions() {
        let currentPowerEmission = 0; // Initialize emission for this category

        const electricityConsumptionKWH = parseFloat(electricityConsumptionInput.value) || 0;
        const kwhGeneratedClean = parseFloat(kwhGeneratedInput.value) || 0;
        // Get the selected clean energy type from the dropdown
        const selectedCleanEnergyType = cleanEnergySourceTypeSelect.value;

        if (selectedPowerSource) {
            if (selectedPowerSource === '100-pln') {
                // Emissions from 100% PLN usage
                // (kWh/month * kgCO2e/kWh * 12 months/year) / 1000 kg/ton
                currentPowerEmission = (electricityConsumptionKWH * emissionFactorPower.pln_kwh * 12) / 1000;
            } else if (selectedPowerSource === '100-clean-energy') {
                // Emissions from 100% clean energy usage
                // Get the specific emission factor for the selected clean energy type
                const cleanEnergyFactor = emissionFactorPower[selectedCleanEnergyType] || emissionFactorPower.other_clean;
                currentPowerEmission = (kwhGeneratedClean * cleanEnergyFactor * 12) / 1000;
            } else if (selectedPowerSource === 'hybrid') {
                // Calculate PLN consumption (total - clean generated, ensuring it's not negative)
                const plnConsumptionKWH = Math.max(0, electricityConsumptionKWH - kwhGeneratedClean);
                // Clean energy consumption is simply what's generated
                const cleanConsumptionKWH = kwhGeneratedClean;

                // Calculate emissions from PLN portion
                const plnEmission = (plnConsumptionKWH * emissionFactorPower.pln_kwh * 12) / 1000;

                // Calculate emissions from clean energy portion
                const cleanEnergyFactor = emissionFactorPower[selectedCleanEnergyType] || emissionFactorPower.other_clean;
                const cleanEmission = (cleanConsumptionKWH * cleanEnergyFactor * 12) / 1000;

                // Sum up both
                currentPowerEmission = plnEmission + cleanEmission;
            }
        }

        // Store the calculated emission in the global allEmissions object
        allEmissions.power = currentPowerEmission;
        // Update the displayed emission sum for power
        document.querySelector(".emission-sum-power").textContent = currentPowerEmission.toFixed(2);
        // Update the total emission across all categories
        updateTotalEmission();
    }

    // Appliance Pop-up Logic
    let currentPopup = null;

    function showAppliancePopup(applianceType) {
        let templateId = '';
        if (applianceType === 'lighting') {
            templateId = 'lighting-popup-template';
        } else if (applianceType === 'air-conditioner') {
            templateId = 'air-conditioner-popup-template';
        } else if (applianceType === 'refrigerator') {
            templateId = 'refrigerator-popup-template';
        }

        const template = document.getElementById(templateId);
        if (template) {
            currentPopup = template.cloneNode(true);
            currentPopup.id = `active-${applianceType}-popup`;
            currentPopup.classList.remove('hidden');
            document.body.appendChild(currentPopup);

            if (applianceData[applianceType]) {
                if (applianceType === 'lighting') {
                    const lightingTypeButtons = currentPopup.querySelectorAll('.lighting-type-btn');
                    lightingTypeButtons.forEach(btn => {
                        if (btn.dataset.lightType === applianceData[applianceType].type) {
                            btn.classList.add('selected-btn');
                        } else {
                            btn.classList.remove('selected-btn');
                        }
                    });
                    currentPopup.querySelector('#lighting-count').value = applianceData[applianceType].count;
                    currentPopup.querySelector('#lighting-usage').value = applianceData[applianceType].usage;
                } else if (applianceType === 'air-conditioner') {
                    currentPopup.querySelector('#ac-inverter-tech').value = applianceData[applianceType].inverter;
                    currentPopup.querySelector('#ac-count').value = applianceData[applianceType].count;
                    currentPopup.querySelector('#ac-usage').value = applianceData[applianceType].usage;
                } else if (applianceType === 'refrigerator') {
                    currentPopup.querySelector('#refrigerator-inverter-tech').value = applianceData[applianceType].inverter;
                    currentPopup.querySelector('#refrigerator-count').value = applianceData[applianceType].count;
                    currentPopup.querySelector('#refrigerator-usage').value = applianceData[applianceType].usage;
                }
            }

            // Add event listener to the apply button within the newly opened popup
            const applyBtn = currentPopup.querySelector('.appliance-apply-btn');
            applyBtn.addEventListener('click', () => {
                saveApplianceData(applianceType, currentPopup);
                closeAppliancePopup();
            });

            // Specific event listeners for lighting type buttons inside the popup
            if (applianceType === 'lighting') {
                const lightingTypeButtons = currentPopup.querySelectorAll('.lighting-type-btn');
                lightingTypeButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        lightingTypeButtons.forEach(b => b.classList.remove('selected-btn'));
                        btn.classList.add('selected-btn');
                    });
                });
            }
        }
    }

    function closeAppliancePopup() {
        if (currentPopup) {
            currentPopup.remove();
            currentPopup = null;
        }
    }

    function saveApplianceData(applianceType, popupElement) {
        if (applianceType === 'lighting') {
            const selectedLightTypeBtn = popupElement.querySelector('.lighting-type-btn.selected-btn');
            applianceData[applianceType].type = selectedLightTypeBtn ? selectedLightTypeBtn.dataset.lightType : '';
            applianceData[applianceType].count = parseFloat(popupElement.querySelector('#lighting-count').value) || 0;
            applianceData[applianceType].usage = parseFloat(popupElement.querySelector('#lighting-usage').value) || 0;
        } else if (applianceType === 'air-conditioner') {
            applianceData[applianceType].inverter = popupElement.querySelector('#ac-inverter-tech').value;
            applianceData[applianceType].count = parseFloat(popupElement.querySelector('#ac-count').value) || 0;
            applianceData[applianceType].usage = parseFloat(popupElement.querySelector('#ac-usage').value) || 0;
        } else if (applianceType === 'refrigerator') {
            applianceData[applianceType].inverter = popupElement.querySelector('#refrigerator-inverter-tech').value;
            applianceData[applianceType].count = parseFloat(popupElement.querySelector('#refrigerator-count').value) || 0;
            applianceData[applianceType].usage = parseFloat(popupElement.querySelector('#refrigerator-usage').value) || 0;
        }
        calculateAppliancesEmissions();
    }

    function calculateAppliancesEmissions() {
        let totalAppliancesEmission = 0; // in tons CO2e/year

        // Lighting
        if (applianceData.lighting.count > 0 && applianceData.lighting.usage > 0 && applianceData.lighting.type) {
            const wattage = applianceTypicalWattage.lighting[applianceData.lighting.type]; // Watts
            const dailyKWH = (applianceData.lighting.count * wattage * applianceData.lighting.usage) / 1000; // Convert Watts to kW, then to kWh
            const annualKWH = dailyKWH * 365;
            const emissions_kgCO2e = annualKWH * ipccGridElectricityEmissionFactor;
            totalAppliancesEmission += emissions_kgCO2e / 1000; // convert kg to tons
        }

        // Air Conditioner
        if (applianceData['air-conditioner'].count > 0 && applianceData['air-conditioner'].usage > 0) {
            const inverterStatus = applianceData['air-conditioner'].inverter;
            const wattage = applianceTypicalWattage['air-conditioner'][inverterStatus]; // Watts
            const dailyKWH = (applianceData['air-conditioner'].count * wattage * applianceData['air-conditioner'].usage) / 1000; // Convert Watts to kW, then to kWh
            const annualKWH = dailyKWH * 365;
            const emissions_kgCO2e = annualKWH * ipccGridElectricityEmissionFactor;
            totalAppliancesEmission += emissions_kgCO2e / 1000; // convert kg to tons
        }

        // Refrigerator
        if (applianceData.refrigerator.count > 0 && applianceData.refrigerator.usage > 0) {
            const inverterStatus = applianceData.refrigerator.inverter;
            const wattage = applianceTypicalWattage.refrigerator[inverterStatus]; // Watts
            const dailyKWH = (applianceData.refrigerator.count * wattage * applianceData.refrigerator.usage) / 1000; // Convert Watts to kW, then to kWh
            const annualKWH = dailyKWH * 365;
            const emissions_kgCO2e = annualKWH * ipccGridElectricityEmissionFactor;
            totalAppliancesEmission += emissions_kgCO2e / 1000; // convert kg to tons
        }

        allEmissions.appliances = totalAppliancesEmission;
        document.querySelector(".emission-sum-appliances").textContent = totalAppliancesEmission.toFixed(2);
        updateTotalEmission();
    }

    // Event listeners for appliance checkboxes
    document.querySelectorAll('.appliance-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const applianceType = this.dataset.appliance;
            if (this.checked) {
                if (applianceType === 'lighting' && applianceData[applianceType].count === 0) {
                    applianceData[applianceType].type = ''; // Default to LED
                    applianceData[applianceType].count = 0;
                    applianceData[applianceType].usage = 0;
                } else if (applianceType === 'air-conditioner' && applianceData[applianceType].count === 0) {
                    applianceData[applianceType].inverter = 'no'; // Default to non-inverter
                    applianceData[applianceType].count = 0;
                    applianceData[applianceType].usage = 0; 
                } else if (applianceType === 'refrigerator' && applianceData[applianceType].count === 0) {
                    applianceData[applianceType].inverter = 'no'; // Default to non-inverter
                    applianceData[applianceType].count = 0;
                    applianceData[applianceType].usage = 0; 
                }
                showAppliancePopup(applianceType);
            } else {
                // If unchecked, reset data for that specific appliance and recalculate
                if (applianceType === 'lighting') {
                    applianceData[applianceType] = { type: '', count: 0, usage: 0 };
                } else { // air-conditioner or refrigerator
                    applianceData[applianceType] = { inverter: 'no', count: 0, usage: 0 };
                }
                calculateAppliancesEmissions();
                // Close any open popup if it belongs to this appliance type
                if (currentPopup && currentPopup.id === `active-${applianceType}-popup`) {
                    closeAppliancePopup();
                }
            }
        });
    });
    // Data storage for food
    let foodData = {
        'egg': { frequency: 'never', portion: 'small' },
        'milk': { frequency: 'never', portion: 'small' },
        'fish': { frequency: 'never', portion: 'small' },
        'rice': { frequency: 'never', portion: 'small' },
        'seafood': { frequency: 'never', portion: 'small' },
        'poultry': { frequency: 'never', portion: 'small' },
        'sheep': { frequency: 'never', portion: 'small' },
        'meat': { frequency: 'never', portion: 'small' },
        'processedMilk': { frequency: 'never', portion: 'small' }
    };
    
    const foodEmissionFactors = {
        'egg': 2.7,
        'milk': 1.9,
        'fish': 5.1, // Wild-caught, varies greatly
        'rice': 2.7,
        'seafood': 11.0, // General seafood, can vary
        'poultry': 6.9, // Chicken, for example
        'sheep': 39.7, // Lamb/Mutton
        'meat': 27.0, // Beef, varies greatly
        'processedMilk': 2.4 // e.g., cheese
    };
    
    // Average portion sizes in kg (example values)
    const portionSizesKg = {
        'small': 0.1,
        'medium': 0.2,
        'large': 0.3
    };

    // Frequency multipliers for annual calculation
    const frequencyMultipliers = {
        'daily': 365,
        'few_times_week': 3 * 52, // 3 times a week
        'once_week': 52,
        'monthly': 12,
        'rarely': 4, // 4 times a year
        'never': 0
    };

    let currentFoodPopup = null;

    function showFoodPopup(foodType) {
        const template = document.getElementById('food-popup-template');
        if (template) {
            currentFoodPopup = template.cloneNode(true);
            currentFoodPopup.id = `active-${foodType}-popup`;
            currentFoodPopup.classList.remove('hidden');
            document.body.appendChild(currentFoodPopup);
            
            // Update popup content
            currentFoodPopup.querySelector('#food-item-name-display').textContent = foodType.replace(/([A-Z])/g, ' $1').replace(/^./, function(str){ return str.toUpperCase(); });
            currentFoodPopup.querySelector('.food-popup-image').src = `{{ asset('${foodType}.png') }}`;
            currentFoodPopup.querySelector('.food-popup-image').alt = foodType;

            // Set current values if they exist
            if (foodData[foodType]) {
                currentFoodPopup.querySelector('#food-consumption-frequency').value = foodData[foodType].frequency;
                currentFoodPopup.querySelector('#food-portion-size').value = foodData[foodType].portion;
            }

            // Add event listener to the apply button
            const applyBtn = currentFoodPopup.querySelector('.food-apply-btn');
            applyBtn.addEventListener('click', () => {
                saveFoodData(foodType, currentFoodPopup);
                closeFoodPopup();
            });
        }
    }

    function closeFoodPopup() {
        if (currentFoodPopup) {
            currentFoodPopup.remove();
            currentFoodPopup = null;
        }
    }
    
    function saveFoodData(foodType, popupElement) {
        foodData[foodType].frequency = popupElement.querySelector('#food-consumption-frequency').value;
        foodData[foodType].portion = popupElement.querySelector('#food-portion-size').value;
        calculateFoodEmissions();
    }
    
    function calculateFoodEmissions() {
        let totalFoodEmission = 0; // in tons CO2e/year
        
        for (const foodItem in foodData) {
            const data = foodData[foodItem];
            if (data.frequency !== 'never' && data.portion !== 'small') { // Only calculate if consumed
                const emissionFactor = foodEmissionFactors[foodItem]; // kg CO2e per kg
                const portionKg = portionSizesKg[data.portion];
                const annualConsumptionMultiplier = frequencyMultipliers[data.frequency];
                
                const annualEmissionsKgCO2e = emissionFactor * portionKg * annualConsumptionMultiplier;
                totalFoodEmission += annualEmissionsKgCO2e / 1000; // convert kg to tons
            }
        }
        allEmissions.food = totalFoodEmission;
        document.querySelector(".emission-sum-food").textContent = totalFoodEmission.toFixed(2);
        updateTotalEmission();
    }

    // Event listeners for food checkboxes
    document.querySelectorAll('.food-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const foodType = this.dataset.foodItem;
            if (this.checked) {
                showFoodPopup(foodType);
            } else {
                // If unchecked, reset data for that specific food item and recalculate
                foodData[foodType] = { frequency: 'never', portion: 'small' };
                calculateFoodEmissions();
                // Close any open popup if it belongs to this food type
                if (currentFoodPopup && currentFoodPopup.id === `active-${foodType}-popup`) {
                    closeFoodPopup();
                }
            }
        });
    });

    function updateNavButtons() {
        // Show/hide based on current page
        document.getElementById("prev-btn-page2").classList.toggle("hidden", currentPage !== 1);
        document.getElementById("next-btn-page2").classList.toggle("hidden", currentPage !== 1);
        document.getElementById("prev-btn-page3").classList.toggle("hidden", currentPage !== 2);
        document.getElementById("next-btn-page3").classList.toggle("hidden", currentPage !== 2);
        document.getElementById("prev-btn-page4").classList.toggle("hidden", currentPage !== 3);
        document.getElementById("next-btn-page4").classList.toggle("hidden", currentPage !== 3);
        document.getElementById("prev-btn-page5").classList.toggle("hidden", currentPage !== 4);
        document.getElementById("next-btn-page5").classList.toggle("hidden", currentPage !== 4);
        document.getElementById("prev-btn-page6").classList.toggle("hidden", currentPage !== 5);
        document.getElementById("next-btn-page6").classList.toggle("hidden", currentPage !== 5);
    }

    addBtn.addEventListener("click", () => {
        createVehicleCard(vehicleCount);
        vehicleCount++;
        calculateEmissions();
    });

    let currentPage = 0;
    const totalPages = 7; 

    const pages = [
        document.getElementById("main-page"),
        document.getElementById("page-2"),
        document.getElementById("page-3"),
        document.getElementById("page-4"),
        document.getElementById("page-5"),
        document.getElementById("page-6"),
        document.getElementById("page-7") 
    ];
    
    const confirmationDialog = document.getElementById("confirmation-dialog");
    const cancelBtn = document.getElementById("cancel-btn");
    const saveBtn = document.getElementById("save-btn");

    // Map page index to category data-key
    const pageCategoryMap = {
        1: 'land',
        2: 'air',
        3: 'power',
        4: 'appliances',
        5: 'food' 
    };

    function showPage(pageIndex) {
        pages.forEach((page, idx) => {
            if (page) {
                page.classList.toggle("hidden", idx !== pageIndex);
            }
        });
        currentPage = pageIndex;
        updateNavButtons();

        document.querySelectorAll(".category-btn").forEach(btn => {
            btn.classList.remove("border-3");
            btn.classList.add("border-1");
        });

        const currentCategoryKey = pageCategoryMap[currentPage];
        if (currentCategoryKey) {
            const activeCategoryBtn = document.querySelector(`#page-${currentPage + 1} .category-btn[data-key="${currentCategoryKey}"]`);
            if (activeCategoryBtn) {
                activeCategoryBtn.classList.remove("border-1");
                activeCategoryBtn.classList.add("border-3");
            } else {
                // Fallback for category buttons that might not be directly on the current page
                const globalActiveCategoryBtn = document.querySelector(`.category-btn[data-key="${currentCategoryKey}"]`);
                if (globalActiveCategoryBtn) {
                    globalActiveCategoryBtn.classList.remove("border-1");
                    globalActiveCategoryBtn.classList.add("border-3");
                }
            }
        }
    }

    document.getElementById("open-calculator").addEventListener("click", () => {
        showPage(1);
        if (vehicleCount === 0) {
            createVehicleCard(vehicleCount);
            vehicleCount++;
        }
    });

    document.getElementById("prev-btn-page2").addEventListener("click", () => {
        showPage(0);
    });

    document.getElementById("next-btn-page2").addEventListener("click", () => {
        showPage(2);
    });

    document.getElementById("prev-btn-page3").addEventListener("click", () => {
        showPage(1);
    });

    document.getElementById("next-btn-page3").addEventListener("click", () => {
        showPage(3);
    });

    document.getElementById("prev-btn-page4").addEventListener("click", () => {
        showPage(2);
    });

    document.getElementById("next-btn-page4").addEventListener("click", () => {
        showPage(4);
    });

    document.getElementById("prev-btn-page5").addEventListener("click", () => {
        showPage(3);
    });

    document.getElementById("next-btn-page5").addEventListener("click", () => {
        showPage(5); 
    });

    document.getElementById("prev-btn-page6").addEventListener("click", () => {
        showPage(4);
    });

    document.getElementById("next-btn-page6").addEventListener("click", () => {
        confirmationDialog.classList.remove("hidden"); 
    });

    cancelBtn.addEventListener("click", () => {
        confirmationDialog.classList.add("hidden"); 
    });

    saveBtn.addEventListener("click", () => {
        confirmationDialog.classList.add("hidden");
        showPage(6); 
    });

    document.getElementById("back-to-calculator-btn").addEventListener("click", () => {
        window.location.reload();
    });

    // Initial setup
    showPage(0); // Start on the main page
});
</script>

<style>

    
    input[type=range] {
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        height: 20px;
        background:#F7EDD7;
        border-radius: 25px;
        outline: none;
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        background: #5c3b1e;
        border-radius: 50%;
        cursor: pointer;
    }

    input[type=range]::-moz-range-thumb {
        width: 24px;
        height: 24px;
        background: #5c3b1e;
        border-radius: 50%;
        cursor: pointer;
    }

    .selected-btn {
        border: 4px solid #228B22 !important;
        box-shadow: 0 0 10px rgba(34, 139, 34, 0.5);
    }

</style>