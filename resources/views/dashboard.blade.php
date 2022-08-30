<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="grid grid-cols-12 gap-4 m-10">
                    <div class="col-span-4 border rounded-md">
                        <h5 class="p-2 border-b bg-[#F3F4F6]">Add New Country</h5>
                        <form method="POST" action={{ route('country.store') }} class="p-6" id="newCountry">
                            @csrf
                            <div class="flex flex-col">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="flex flex-col">
                                <label for="ISO">ISO</label>
                                <input type="text" id="ISO" name="ISO" required>
                            </div>
                        </form>
                        <div class="w-full bg-[#F3F4F6] p-4 flex">
                            <button type="submit" class="bg-gray-800 text-white rounded-md px-6 py-2"
                                form="newCountry">SAVE</button>
                        </div>
                    </div>
                    <div class="col-span-8 border rounded-md">
                        <h5 class="p-2 border-b bg-[#F3F4F6]">List of countries</h5>
                        <table class="table-auto border-collapse border w-full">
                            <thead>
                                <tr class="border-b">
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        ISO
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $key => $country)
                                    <tr class="border-b">
                                        <td>
                                            <div class="flex justify-center">
                                                <p>{{ $key + 1 }}</p>
                                            </div>
                                        </td>
                                        <form action={{ route('country.update', $country->id) }} method="post">
                                            @csrf
                                            @method('PUT')
                                            <td>
                                                <div class="flex justify-center">
                                                    <input type="text" value={{ $country->name }} name="name">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-center">
                                                    <input type="text" value={{ $country->ISO }} name="ISO">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-center">
                                                    <button type="submit"
                                                        class="border bg-blue-500 text-white rounded-md p-2">Edit</button>
                                                </div>
                                            </td>
                                        </form>
                                        <td>
                                            <div class="flex justify-center">
                                                <form action={{ route('country.destroy', $country->id) }}
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
