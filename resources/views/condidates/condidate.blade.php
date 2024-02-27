<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>

<body>

    <nav class="bg-white border-gray-200 dark:bg-gray-200 dark:border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-black">Flowbite</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ $condidates->getFirstMediaUrl('user') }}" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-00 dark:divide-gray-00"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->fullname }}</span>
                        <span
                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-00 dark:hover:bg-gray-00 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-00 dark:text-gray-200 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-00 dark:text-gray-200 dark:hover:text-white">Favoris</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-00 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 dark:bg-gray-00 md:dark:bg-gray-00 ">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-900 md:dark:hover:text-blue-00 dark:hover:bg-gray-00 dark:hover:text-gray-900 md:dark:hover:bg-transparent ">Profile</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-900 md:dark:hover:text-blue-00 dark:hover:bg-gray-00 dark:hover:text-gray-900 md:dark:hover:bg-transparent ">Favoris</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container mx-auto py-10">
        <div
            class="bg-gray-200 rounded-lg shadow-lg flex flex-col md:flex-row justify-center items-center md:space-x-8 p-6">
            <div class="md:w-1/3">
                <img src="{{ $condidates->getFirstMediaUrl('user') }}"
                    class="rounded-full w-60 h-60 md:w-72 md:h-72 shadow-xl" alt="">
            </div>
            <div class="flex flex-col justify-evenly gap-10 md:w-2/3 md:pl-8 pt-4 md:pt-0 ">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800"> {{ $condidates->fullname }}</h1>
                </div>
                <div class="flex flex-col md:flex-row justify-between mt-2 text-gray-600">
                    <h3 class="mt-2 md:mt-0 md:ml-1"><span class="text-gray-900 text-lg">Address :</span>
                        {{ $condidates->address }}</h3>
                    <h3 class="mt-2 md:mt-0 md:ml-1"><span class="text-gray-900 text-lg">Phone : </span>
                        {{ $condidates->phone }}</h3>
                </div>
            </div>
            <div>
                <a href="{{ route('condidate.update', $condidates->id) }}"> <button type="button"
                        class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
                </a>
            </div>
        </div>

        <div class="container mx-auto py-10">
            <h1 class="text-3xl font-bold mb-4">Information</h1>
            {{--  ==================================== experience --}}


            <div
                class="bg-gray-200 rounded-lg shadow-lg flex flex-col md:flex-col justify-start items-center md:space-x-8 p-6">

                <div class="border-b border-gray-200 pb-4">
                    <button class="font-semibold text-left w-full focus:outline-none"
                        onclick="toggleAnswer(event)">Experience</button>
                    <div class="max-w bg-white flex flex-row rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                        {{--  <button class="bg-green-500 hover:bg-green-700 text-white font-bold h-10 w-20 rounded">Add</button> </div>  --}}
                        <div class="md:flex">
                            @foreach ($experiences as $experience)

                                <div class="p-8">
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Name
                                    </div>
                                    <div class="mt-1 text-gray-900">{{ $experience->name }}</div>
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">
                                        Start Date</div>
                                    <div class="mt-1 text-gray-900">{{ $experience->start_date }}</div>
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">End
                                        Date</div>
                                    <div class="mt-1 text-gray-900">{{ $experience->end_date }}</div>
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">
                                        Company Name</div>
                                    <div class="mt-1 text-gray-900">{{ $experience->company_name }}</div>
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">
                                        Description</div>
                                    <div class="mt-1 text-gray-900">{{ $experience->description }}</div>
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">
                                        Task</div>
                                    <div class="mt-1 text-gray-900">{{ $experience->task }}</div>
                                </div>

                            <div class="flex justify-end px-5 py-3">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-10 w-20 rounded mr-2">Update</button>
                                <button
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold h-10 w-20 rounded">Add</button>
                            </div>
                           @endforeach

                        </div>
                    </div>
                </div>
                {{--  ==================================== Formation --}}
                <div class="border-b border-gray-200 pb-4">
                    <button class="font-semibold text-left w-full focus:outline-none" onclick="toggleAnswer(event)">Formation</button>
                    <div class="max-w-md mx-auto bg-white flex flex-row rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                        <div class="md:flex">
                            @foreach ($condidates->formations as $formation)
                                <div class="p-8">
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Name
                                    </div>
                                    <div class="mt-1 text-gray-900">{{ $formation->name }}</div>
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">
                                        Start Date</div>
                                    <div class="mt-1 text-gray-900">{{ $formation->start_date }}</div>
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">End
                                        Date</div>
                                    <div class="mt-1 text-gray-900">{{ $formation->end_date }}</div>
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">
                                        Etablissement</div>
                                    <div class="mt-1 text-gray-900">{{ $formation->etablissement }}</div>
                                </div>
                            @endforeach

                            <div class="flex justify-end px-5 py-3">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Update</button>
                                <button
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  ================================ Experience --}}
                <div class="space-y-4">
                    <div class="border-b border-gray-300 pb-4">
                        <button class="font-semibold text-left w-full focus:outline-none" onclick="toggleAnswer(event)">Competence</button>
                        <div class="md:flex">
                            @foreach ($Skills as $Skill)
                            <div class="p-8">
                                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Name </div>
                                <div class="mt-1 text-gray-900">{{ $Skill->name }}</div>
                            </div>
                            @endforeach

                            <div class="flex justify-end px-5 py-3">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Update</button>
                                <button
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function toggleAnswer(event) {
                    const answer = event.target.nextElementSibling;
                    answer.classList.toggle('hidden');
                }
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
