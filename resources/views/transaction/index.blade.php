<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Transaction') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="relative overflow-x-auto">
                  <table class="w-full text-sm text-left text-gray-500">
                      <thead
                          class="text-xs text-gray-700 uppercase bg-gray-50 ">
                          <tr>
                              <th scope="col" class="px-6 py-3">
                                  No
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Game
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Status
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Action
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($loans as $loan)  
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">
                                {{$loop->iteration}}
                            </td>
                            <td class="px-6 py-4">
                                {{$loan->game->name}}
                            </td>
                            <td class="px-6 py-4">
                              @if($loan->paid === 1)
                                @if ($loan->status === 1)
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Returned</span>
                                @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Not Returned</span>
                                @endif
                              @else
                              <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Not Paid</span>
                              @endif
                            </td>
                           
                            <td class="px-6 py-4 ">
                              @if($loan->paid === 1)
                                @if ($loan->status === 1)
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Clear</span>
                                @else
                                <form action="{{route('transaction.update', $loan->id)}}" method="post">
                                  @csrf
                                  @method('patch')
                                  <button type="submit" onclick="return confirm('Are you sure?')" class="font-medium text-green-600 hover:underline">Return</button>
                                </form>
                                @endif
                              @else
                                <a href="https://wa.me/62811826151?text=Mau+Bayar+dong+orderan+rental" target="_blank"class="font-medium text-green-600 hover:underline">Pay</a>
                              @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4" colspan="5" align="center" >No data</td>
                        </tr>
                    @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
