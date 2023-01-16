<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Games') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
            <section>
              <header>
                  <h2 class="text-lg font-medium text-gray-900">
                      {{ __('Edit Data Games') }}
                  </h2>
              </header>
          
          
              <form method="post" action="{{ route('game.update', $game->id) }}" class="mt-6 space-y-6">
                  @csrf
                  @method('patch')
          
                  <div>
                      <x-input-label for="name" :value="__('Name')" />
                      <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" :value="$game->name" />
                      <x-input-error class="mt-2" :messages="$errors->get('name')" />
                  </div>

                  <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" required autofocus autocomplete="price" :value="$game->price"/>
                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                  </div>

                  <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-area id="description" name="description" type="number" class="mt-1 block w-full" required autofocus autocomplete="description">
                      {{$game->description}}
                    </x-text-area>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                  </div>
          
                  <div class="flex items-center gap-4">
                      <x-secondary-button type="button" onclick="window.location='{{route('game.index')}}'">{{ __('Back') }}</x-secondary-button>
                      <x-primary-button>{{ __('Update') }}</x-primary-button>
                  </div>
              </form>
          </section>
          </div>
      </div>
      </div>
  </div>
</x-app-layout>
