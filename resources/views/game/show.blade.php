<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Games') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="my-4 flex justify-end">
              <x-primary-button class="text-right" type="button" onclick="window.location='{{route('game.index')}}'">
                  {{ __('Back') }}
              </x-primary-button>
          </div>
          <div class="flex justify-start">
            <div>
              <img src="{{url('uploads/'.$game->photo)}}" alt="game"/>
            </div>
            <div class="overflow-hidden bg-white shadow sm:rounded-lg" style="width: 80%">
              <div class="px-4 py-6 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Game Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Game details and picture.</p>
              </div>
              <div class="border-t border-gray-200">
                <dl>
                  <div class="bg-gray-50 px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Game</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$game->name}}</dd>
                  </div>
                  <div class="bg-white px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                      @if ($game->status === 0)
                      <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Available</span>
                      @else
                      <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Borrowed</span>
                      @endif
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Price</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">IDR {{ number_format($game->price)}}</dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$game->description}}</dd>
                  </div>
                  
                </dl>
              </div>
            </div>
          </div>
      </div>
  </div>
</x-app-layout>
