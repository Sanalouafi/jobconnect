<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />

</head>
<body>

<nav class="bg-white border-gray-200 dark:bg-gray-200 dark:border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-black">Flowbite</span>
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
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
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-01² dark:bg-gray-00 md:dark:bg-gray-00 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-00 dark:hover:bg-gray-00 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-00">Profile</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-00 dark:hover:bg-gray-00 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-00">Favoris</a>
        </li>

      </ul>
    </div>
    </div>
  </nav>


  <div class="container mx-auto w-5/5 h-32 mt-20 rounded-lg shadow-lg">
    <div class="section1 bg-gray-100 flex flex-row justify-evenly align-content-center pt-10 rounded-lg shadow-lg">
        <div class="img rounded-full w-52 h-52">
            <img src="" class="img rounded-full w-64 h-64"  alt="">
        </div>
        <div class="flex flex-col justify-evenly md:w-2/3 md:pl-8 pt-4 md:pt-0 ">
            <div>
                <h1 class="text-2xl font-bold text-gray-800"> {{ $user->fullname }}</h1>
            </div>
            <div class="flex flex-col md:flex-row justify-evenly mt-2 text-gray-600">
                <h3 class="mt-2 md:mt-0 md:ml-1">Address : {{ $user->address }}</h3>
                <h3 class="mt-2 md:mt-0 md:ml-1">Phone : {{ $user->phone }}</h3>
                <h3 class="mt-2 md:mt-0 md:ml-1">Status : {{ $user->status }}</h3>
            </div>
        </div>
    </div>

    <div class="dropdown bg-gray-100 rounded-lg shadow-lg pt-10 mt-10 ">
        <div class="mt-8 ml-12">
            <h1 class="text-3xl font-bold mb-4">Information</h1>

            <div class="space-y-4">
                <div class="border-b border-gray-200 pb-4">
                    <button class="font-semibold text-left w-full focus:outline-none" onclick="toggleAnswer(event)">Competences</button>
                    <p class="hidden mt-2">To get started, simply sign up for an account and follow the instructions provided.</p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="border-b border-gray-200 pb-4">
                    <button class="font-semibold text-left w-full focus:outline-none" onclick="toggleAnswer(event)">Formation <button></button></button>
                    <p class="hidden mt-2">To get started, simply sign up for an account and follow the instructions provided.</p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="border-b border-gray-200 pb-4">
                    <button class="font-semibold text-left w-full focus:outline-none" onclick="toggleAnswer(event)">Experience</button>
                    <p class="hidden mt-2">To get started, simply sign up for an account and follow the instructions provided.</p>
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
