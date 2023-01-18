<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @hasrole('admin')
                <div class="p-6 text-gray-900">
                    {{ __("All activities that you do in this area are your full responsibility. Please do it carefully and correctly.") }}
                </div>
                @else
                <div class="mx-auto max-w-2xl py-4 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">All Games To Rental</h2>
                
                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @forelse($games as $game)
                        <div class="group relative">
                            <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                              <img src="{{url('uploads/'.$game->photo)}}" alt="{{$game->name}}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                              <div>
                                <h3 class="text-sm text-gray-700">
                                  <a href="{{ route('checkout.index', $game->id) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{$game->name}}
                                  </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{$game->description}}</p>
                              </div>
                              <p class="text-sm font-medium text-gray-900">IDR {{number_format($game->price)}}</p>
                            </div>
                          </div>
                        @empty
                        
                        @endforelse
                    
                
                      <!-- More products... -->
                    </div>
                  </div>
                @endhasrole
            </div>
        </div>
    </div>
</x-app-layout>
