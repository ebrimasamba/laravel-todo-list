<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Edit a todo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 py-10 flex items-center justify-center min-h-screen">
    <div class="max-w-lg w-full mx-auto ">
        <div
            class="p-6 text-center shadow-lg shadow-indigo-500/10 bg-gradient-to-r bg-indigo-500 via-indigo-400 to-indigo-300 text-white mb-6 rounded-xl">
            <a href="/" class="font-bold text-xl text-center mb-8">
                Edit Task</a>
        </div>


        <div class="mb-6">
            @error('title')
                <div
                    class="bg-rose-500 text-white text-sm mb-2 p-2 rounded-lg flex items-center shadow-lg shadow-rose-500/10 gap-2 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>

                    <span>{{ $message }}</span>
                </div>
            @enderror

            <form action="/todos/update/{{ $todo->id }}" method="POST" class="flex flex-col space-y-4">
                @method('PATCH')
                @csrf <div class="flex gap-4 items-center">
                    <input type="text" value="{{ $todo->title }}" name="title" id="title"
                        placeholder="What is your goal today?"
                        class="flex-1 p-3.5  bg-white rounded-lg shadow-lg shadow-gray-500/10 focus:shadow-none transition text-[15px] focus:outline-none focus:ring-2 focus:ring-indigo-500 border-none">

                    <button
                        class="h-10 w-10 inline-flex justify-center items-center text-sm hover:scale-110 transition bg-indigo-500 font-bold text-white rounded-full pointer-events-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>


                    </button>
                </div>

            </form>


        </div>


</body>

</html>
