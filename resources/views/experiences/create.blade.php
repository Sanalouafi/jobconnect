<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Experience</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-center mb-8">Create Experience</h1>

    <form method="POST" action="{{ route('experience.store') }}" class="max-w-lg mx-auto">
        @csrf
        @method('POST')
        <div class="mb-4">
            <label for="name" class="block mb-1">Name:</label>
            <input type="text" id="name" name="name" class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" required>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block mb-1">Start Date:</label>
            <input type="date" id="start_date" name="start_date" class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block mb-1">End Date:</label>
            <input type="date" id="end_date" name="end_date" class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
        </div>

        <div class="mb-4">
            <label for="company_name" class="block mb-1">Company Name:</label>
            <input type="text" id="company_name" name="company_name" class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-1">Description:</label>
            <textarea id="description" name="description" class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" required></textarea>
        </div>

        <div class="mb-4">
            <label for="task" class="block mb-1">Task:</label>
            <textarea id="task" name="task" class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" required></textarea>
        </div>

        <button type="submit" name="submit" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded py-2">Submit</button>
    </form>
</div>

</body>
</html>
