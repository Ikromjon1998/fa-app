<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Laravel 9 Cashier Stripe Subscription</h1>
                    <h3>PRICING</h3>
                </div>


            </div>
        </div>
    </div>
    <div class="row text-center align-items-end">
        <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="bg-white p-5 rounded-lg shadow">
                <h1 class="h6 text-uppercase font-weight-bold mb-4">FREE</h1>
                <h2 class="h1 font-weight-bold">$0<span class="text-small font-weight-normal ml-2">/ free</span></h2>

                <div class="custom-separator my-4 mx-auto bg-primary"></div>

                <ul class="list-unstyled my-5 text-small text-left">
                    <li class="mb-3">
                        <i class="fa fa-check mr-2 text-primary"></i> Lorem ipsum dolor sit amet</li>
                    <li class="mb-3">
                        <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis</li>
                    <li class="mb-3">
                        <i class="fa fa-check mr-2 text-primary"></i> At vero eos et accusamus</li>
                    <li class="mb-3 text-muted">
                        <i class="fa fa-times mr-2"></i>
                        <del>Nam libero tempore</del>
                    </li>
                    <li class="mb-3 text-muted">
                        <i class="fa fa-times mr-2"></i>
                        <del>Sed ut perspiciatis</del>
                    </li>
                    <li class="mb-3 text-muted">
                        <i class="fa fa-times mr-2"></i>
                        <del>Sed ut perspiciatis</del>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block shadow rounded-pill">Buy Now</a>
            </div>
        </div>

        {{--            @foreach($plans as $plan)--}}
        <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="bg-white p-5 rounded-lg shadow">
                <h1 class="h6 text-uppercase font-weight-bold mb-4">{{ $plan?->name ?? 'Premium plan' }}</h1>
                <h2 class="h1 font-weight-bold">${{ $plan?->price ?? '1 dollar' }}<span class="text-small font-weight-normal ml-2">/ month</span></h2>

                <div class="custom-separator my-4 mx-auto bg-primary"></div>

                <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                    <li class="mb-3">
                        <i class="fa fa-check mr-2 text-primary"></i> Lorem ipsum dolor sit amet</li>
                    <li class="mb-3">
                        <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis</li>
                    <li class="mb-3">
                        <i class="fa fa-check mr-2 text-primary"></i> At vero eos et accusamus</li>
                    <li class="mb-3">
                        <i class="fa fa-check mr-2 text-primary"></i> Nam libero tempore</li>
                    <li class="mb-3">
                        <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis</li>
                    <li class="mb-3 text-muted">
                        <i class="fa fa-times mr-2"></i>
                        <del>Sed ut perspiciatis</del>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block shadow rounded-pill">Buy Now</a>
            </div>
        </div>
        {{--            @endforeach--}}
    </div>
</x-app-layout>

