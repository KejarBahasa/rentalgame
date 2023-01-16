<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4 flex justify-end">
                <x-primary-button class="text-right" type="button" onclick="window.location='{{route('game.create')}}'">
                    {{ __('Add') }}
                </x-primary-button>
            </div>
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
                                    Game name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($games as $game)  
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    {{$loop->iteration}}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{$game->name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$game->price}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$game->description}}
                                </td>
                                <td class="px-6 py-4 ">
                                    <a href="{{route('game.edit', $game->id)}}" class="font-medium text-blue-600 hover:underline mr-2">Edit</a>
                                    <form action="{{route('game.destroy', $game->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="font-medium text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
