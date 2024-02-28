<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container mx-auto p-8 mb-10 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Companies Management</h2>
        {{--  <a href="{{ route('projects.create') }}">  --}}
        <button type="button"
            class="py-2.5 px-5 me-2 text-sm font-medium text-white focus:outline-none bg-blue-600 rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Porject
            List</button></a>
        <div class="overflow-x-auto">
            <form action="" method="get" class="w-full">
                <table class="w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 border-b">Campany ID</th>
                            <th class="px-6 py-3 border-b">name</th>
                            <th class="px-6 py-3 border-b">description</th>
                            <th class="px-6 py-3 border-b">localisation</th>
                            <th class="px-6 py-3 border-b">logo</th>
                            <th class="px-6 py-3 border-b">owner</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($companies as $company)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 border-b">{{ $company->id }}</td>
                                <td class="px-6 py-3 border-b">{{ $company->name }}</td>
                                <td class="px-6 py-3 border-b">{{ $company->description }}</td>
                                <td class="px-6 py-3 border-b">{{ $company->localisation }}</td>
                                <td class="px-6 py-3 border-b h-32 w-28"><img
                                        src="{{ $company->getFirstMediaUrl('images') }}" alt="image"></td>
                                {{--  <td class="px-6 py-3 border-b">{{ $company->user->role->name }}</td>  --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
