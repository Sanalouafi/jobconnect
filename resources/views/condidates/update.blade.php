<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">


    <nav class="bg-white border-gray-200 dark:bg-gray-200 dark:border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-black">Flowbite</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full" src="{{ $condidate->getFirstMediaUrl('user') }}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-00 dark:divide-gray-00" id="user-dropdown">
              <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->fullname }}</span>
                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
              </div>
              <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-00 dark:hover:bg-gray-00 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-00 dark:text-gray-200 dark:hover:text-white">Profile</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-00 dark:text-gray-200 dark:hover:text-white">Favoris</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-00 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                </li>
              </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 dark:bg-gray-00 md:dark:bg-gray-00 ">
            <li>
              <a href="#" class="block py-2 px-3 text-gray-900 bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
            </li>
            <li>
              <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-900 md:dark:hover:text-blue-00 dark:hover:bg-gray-00 dark:hover:text-gray-900 md:dark:hover:bg-transparent ">Profile</a>
            </li>
            <li>
              <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-900 md:dark:hover:text-blue-00 dark:hover:bg-gray-00 dark:hover:text-gray-900 md:dark:hover:bg-transparent ">Favoris</a>
            </li>

          </ul>
        </div>
        </div>
      </nav>
    {{--  ======================  --}}
    <div class="container mx-auto py-10">
        <div>
            <a href="{{ route('condidate.index') }}"> <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Back to the Profile</button>
            </a>
         </div>
        <div class="bg-gray-200 rounded-lg shadow-lg flex flex-col md:flex-row justify-center items-center md:space-x-8 p-6">
            <div class="md:w-1/3">
                <img src="{{ $condidate->getFirstMediaUrl('user') }}" class="rounded-full w-60 h-60 md:w-72 md:h-72 shadow-xl" alt="">
                </div>
               <form action="{{ route('condidate.update', $condidate->id) }}" method="POST" class="md:w-2/3 pt-4 md:pt-0" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="md:w-1/3 mb-10">
                <input type="file" id="image-input" name="user" class="">
                </div>

                <div>
                    <input type="text" name="fullname" value="{{ $condidate->fullname }}" class="input" placeholder="Address">

                </div>

                <div class="flex flex-col md:flex-row justify-center md:justify-between mt-4 md:mt-2 space-y-4 md:space-y-0">
                    <input type="text" name="address" value="{{ $condidate->address }}" class="input" placeholder="Address">
                    <input type="text" name="phone" value="{{ $condidate->phone }}" class="input" placeholder="Phone">
                </div>

                <button type="submit" name="submit" class="text-white mt-16 bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Update</button>
            </form>
        </div>
    </div>
</body>

</html>
