<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Loans') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
            <section>
              <header>
                  <h2 class="text-lg font-medium text-gray-900">
                      {{ __('Add Loan') }}
                  </h2>
              </header>
          
          
              <form method="post" action="{{ route('loan.store') }}" class="mt-6 space-y-6">
                  @csrf
          
                  <div>
                      <x-input-label for="name" :value="__('Game')" />
                      <select id="countries" name="game_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Select Game</option>
                        @foreach ($games as $item)
                            <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                      <x-input-error class="mt-2" :messages="$errors->get('name')" />
                  </div>

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
                      <x-secondary-button type="button" onclick="window.location='{{route('loan.index')}}'">{{ __('Back') }}</x-secondary-button>
                      <x-primary-button>{{ __('Save') }}</x-primary-button>
                  </div>
              </form>
          </section>
          </div>
      </div>
      </div>
  </div>
</x-app-layout>
