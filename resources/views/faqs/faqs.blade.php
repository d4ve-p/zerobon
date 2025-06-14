@extends('components.layouts.app.home-layout')

@section('content')
<div class="min-h-screen bg-[#fdf7eb] px-4 py-10 md:px-20">
    <a href="#" class="text-green-700 text-sm mb-4 inline-block">&larr; Back to Home</a>

    <h1 class="text-3xl font-bold text-green-900 mb-6 text-center">Frequently Asked Questions</h1>

    <h2 class="text-2xl font-bold text-green-900 mb-5">General</h2>

    <div class="space-y-4">
        {{-- FAQ Item --}}
        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">What is Zerobon?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                Zerobon is a web-based platform that helps users calculate, monitor and reduce their carbon footprint with a variety of exciting features.
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">Who can use Zerobon?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                Zerobon can be used by everyone in Indonesia, especially those who care about the environment and want to contribute to reducing carbon emissions.
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">Does Zerobon have a mobile app?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                No, Zerobon is web-based for flexibility and can be accessed without the need to download an app.
            </p>
        </div>
    </div>

     <h2 class="text-2xl font-bold text-green-900 mt-8 mb-5">Account and Membership</h2>

    <div class="space-y-4">
        {{-- FAQ Item --}}
        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">How to register as a member?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                To become a member, users must make a membership payment, and will then receive an email with an account activation link.
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">What are the benefits of being a member versus a guest?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                Members get access to exclusive features such as carbon footprint reduction challenges, reward points, discount vouchers, and opportunities to participate in social activities.
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">How much does Zerobon membership cost?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                Membership costs Rp10,000 per month to gain access to exclusive features, including carbon footprint reduction challenges, reward points, and attractive vouchers.
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">What is the membership renewal process?</h3>
    
           
            <li class="text-green-700 font-semibold text-mtext-justify">
                Every month, Zerobon will send an email notification regarding membership renewal.
            </li>
            <li class="text-green-700 font-semibold text-m text-justify">
               In the email, users will be given a link to make payment for the next membership period.
            </li>
            <li class="text-green-700 font-semibold text-m text-justify">
                If the payment is not made before the specified deadline, the user's account will be temporarily deactivated, so they cannot access member features such as challenges, reward points, and vouchers.
            </li>
            <li class="text-green-700 font-semibold text-m text-justify">
               To reactivate a deactivated account, users simply need to make a membership payment via the link sent.
            </li>
        </div>
    </div>

    <h2 class="text-2xl font-bold text-green-900 mt-8 mb-5">Website Features</h2>
    
    <div class="space-y-4">
        {{-- FAQ Item --}}
        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">How do I calculate my carbon footprint?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                Use the carbon footprint calculator available on the website to calculate the carbon footprint of transportation, electricity, food, and household appliances.
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">Can I read articles without logging in?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                Yes, articles related to the environment, climate change, and emissions can be accessed by both guests and members without logging in
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">How to make a tree donation on Zerobon?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                Select the number of trees you wish to donate or specify a voluntary donation amount, then make the payment. E-certificate will be sent via email.
            </p>
        </div>
    </div>

    <h2 class="text-2xl font-bold text-green-900 mt-8 mb-5">Ecomarket and Challenge</h2>
       
  <div class="space-y-4">
        {{-- FAQ Item --}}
        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">What is EcoMarket?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                EcoMarket is an e-commerce feature in Zerobon that sells eco-friendly products such as totebags, tumblers and more.
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">How to get a discount voucher?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                Members can collect reward points from carbon footprint reduction challenges and redeem them for discount vouchers.
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1 text-justify">What is the refund system if I cancel my order at EcoMarket?</h3>
            <p class="text-green-700 font-semibold text-m text-justify">
                Cancellation and refund can only be done within 1x24 hours after the transaction.
            </p>
        </div>
    </div>


    <h2 class="text-2xl font-bold text-green-900 mt-8 mb-5">Green Activities and Support Center</h2>
      <div class="space-y-4">
        {{-- FAQ Item --}}
        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1">How to join green activities through Zerobon?</h3>
            <p class="text-green-700 font-semibold text-m">
               Members can view the list of available social activities and register according to the available quota.
            </p>
        </div>

        <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm">
            <h3 class="text-green-700 font-bold text-xl mb-1">How to contact Zerobon's support team?</h3>
            <p class="text-green-700 font-semibold text-m">
                Users can contact Zerobon through the support email available on the website.
            </p>
        </div>
    </div>

</div>
@endsection
