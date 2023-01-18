<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Chekout') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
          <div class="px-2 py-6 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Game Information</h3>
          </div>
          <div class="border-t border-gray-200">
            <dl>
              <div class="bg-gray-50 px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Game</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$game->name}}</dd>
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
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
            <section>
              <header>
                  <h2 class="text-lg font-medium text-gray-900">
                      {{ __('Add Chekout') }}
                  </h2>
              </header>
          
              <form method="post" action="{{ route('checkout.store') }}" class="mt-6 space-y-6">
                  @csrf
                  <x-text-input id="game_id" name="game_id" type="hidden" class="mt-1 block w-full" required autofocus autocomplete="game_id" value="{{ $game->id }}"/>
                  <div>
                    <x-input-label for="create_date" :value="__('Date Rental')" />
                    <x-text-input id="create_date" name="create_date" type="date" class="mt-1 block w-full" required autofocus autocomplete="create_date" value="{{ date('Y-m-d') }}" readonly/>
                    <x-input-error class="mt-2" :messages="$errors->get('create_date')" />
                  </div>

                  <div>
                    <x-input-label for="return_date" :value="__('Date Return')" />
                    <x-text-input id="return_date" name="return_date" type="date" class="mt-1 block w-full" required autofocus autocomplete="return_date" />
                    <x-input-error class="mt-2" :messages="$errors->get('return_date')" />
                  </div>
          
                  <div class="flex items-center gap-4">
                      <x-primary-button>{{ __('Save') }}</x-primary-button>
                  </div>
              </form>
          </section>
          </div>
        </div>
      </div>
  </div>
</x-app-layout>
