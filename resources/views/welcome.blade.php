<x-home>
    <div class="bg-white py-24">

    <div class="container w-full max-w-6xl mx-auto px-2 py-8">
        <div class="flex flex-wrap -mx-2">
            @foreach ($publications as $publication)
                <div class="w-full md:w-1/3 px-5 pb-12">
                    <div class="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth">
                        <a href="#" class="no-underline hover:no-underline">
                            <img src="{{ $publication->getFirstMediaUrl('publication') }}"
                                class="h-48 w-full rounded-t shadow-lg">
                            <div class="p-6 h-auto md:h-48">
                                <p class="text-gray-600 text-xs md:text-sm"> {{ $publication->company->name }}</p>
                                <div class="font-bold text-xl text-gray-900">{{ $publication->title }} </div>
                                <p class="text-gray-800 font-serif text-base mb-5">
                                    {{ $publication->description }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between inset-x-0 bottom-0 p-6">
                                <div class="flex">
                                    <img class="w-8 h-8 rounded-full "
                                        src="{{ $representatives->getFirstMediaUrl('user') }}" alt="Avatar of Author">
                                    <p class="text-gray-600 text-xs md:text-sm">{{ $representatives->fullname }}</p>

                                </div>

                                <p class="text-gray-600 text-xs md:text-sm">
                                    {{ $publication->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</x-home>
