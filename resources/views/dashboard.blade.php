<!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div> -->
            <div class="p-6 mt-5 bg-white border-b border-gray-200">

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark: text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark: bg-gray-700 dark: text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Title
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Book ID
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Author
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Subtitle
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Small Thumbnail
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Thumbnail
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $data= DB::table('books')->where('user',Auth::id())->get();
                            @endphp

                            @foreach($data as $books)
                            <tr>
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-grey">
                                    {{ $books->title }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $books->book_id}}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $books->authors}}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $books->subtitle}}

                                </td>
                                <td class="py-4 px-6">
                                    <a href="{{$books->small_thumbnail}}" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Small Thumbnail</a>
                                </td>
                                <td class="py-4 px-6">
                                    <a href="{{$books->thumbnail}}" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Thumbnail</a>
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


<script>
    $(document).ready(function() {

        axios.post('https://run.mocky.io/v3/821d47eb-b962-4a30-9231-e54479f1fbdf', {
                headers: {
                    'Authorization': 'AppRinger'
                }
            }).then(function(response) {
                console.log(response.data.items)
                axios.post('store-books', {
                        books: response.data.items,
                    })
                    .then(function(res) {
                        // console.log(res)
                    })
            })
            .catch(function(error) {
                console.log(error);
            });

    })
</script>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>