<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Create a todo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Figtree:300,regular,500,600,700,800,900,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 py-10">
    <div class="max-w-lg mx-auto ">
        <div class="p-6 text-center shadow-lg shadow-indigo-500/10 bg-gradient-to-r bg-indigo-500 via-indigo-400 to-indigo-300 text-white mb-6 rounded-xl" >
            <a href="/" class="font-bold text-xl text-center mb-8">
                Today's Tasks</a>
        </div>


        <div class="mb-6">
                @error('title')
    <div class="bg-rose-500 text-white text-sm mb-2 p-2 rounded-lg flex items-center shadow-lg shadow-rose-500/10 gap-2 font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
          </svg>
          
          
        <span>{{ $message }}</span>
    </div>
    @enderror

            <form action="/todos/" method="POST" class="flex flex-col space-y-4">
                @csrf
                <div class="flex gap-4 items-center">
                    <input type="text" name="title" id="title" placeholder="What is your goal today?"
                    class="flex-1 p-3.5  bg-white rounded-lg shadow-lg shadow-gray-500/10 focus:shadow-none transition text-[15px] focus:outline-none focus:ring-2 focus:ring-indigo-500 border-none">

                    <button class="h-10 w-10 inline-flex justify-center items-center text-sm hover:scale-110 transition bg-indigo-500 font-bold text-white rounded-full pointer-events-auto shadow-lg shadow-indigo-500/10"
                    
                    
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                      </svg>
                    
                   </button>
                </div>
            
            </form>


        </div>
     
       <div class="">
        <div class="">
            <h2 class="font-bold mb-2">Incompleted ({{count($incompleted_todos)}})</h2>
            <div class="overflow-y-auto max-h-[300px] pr-2 pb-5 todos space-y-3">
    
                @foreach ($incompleted_todos as $todo)
                <div class="bg-white shadow-lg group shadow-gray-500/10 rounded-xl transition py-4 flex gap-3 items-center px-3 relative border-l-4  {{$todo->is_completed ? "border-indigo-500 rounded-l-none" : "border-transparent "}}">
            
                  <form action="/todos/completed/{{$todo->id}}" method="post">
                    @csrf
                    @method("PATCH")
                    <input type="checkbox" class="rounded-full border-gray-300 w-5 h-5 text-emerald-500 focus:outline-none focus:ring-emerald-500 cursor-pointer"  {{$todo->is_completed ? "checked" : ""}}   name="is_completed" onchange="this.form.submit()">
                  </form>
                    <div class="flex-1 pr-8">
                        <h3 class="font-medium {{$todo->is_completed? "line-through decoration-gray-500" :  ""}}">{{{$todo->title}}}</h3>
    
                    </div>
    
                    <div class="flex space-x-3 items-center">
                        <a href="/todos/edit/{{$todo->id}}" class="bg-sky-100 p-2 text-sky-500 hover:bg-sky-500 hover:text-white rounded-full hover:scale-110 transition cursor-pointer opacity-0 group-hover:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                              </svg>
                              </a>
                       <form action="/todos/{{$todo->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="text-rose-500 p-2 bg-rose-100 hover:bg-rose-500 hover:text-white rounded-full hover:scale-110 transition cursor-pointer opacity-0 group-hover:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                              </svg>
                              
                        </button>
                       </form>
                    </div>
                </div>
                @endforeach
        </div>

        <div class="mt-3">
            <h2 class="font-bold mb-2">Completed ({{count($completed_todos)}})</h2>
            <div class="overflow-y-auto max-h-[300px] pr-2 pb-5 todos space-y-3">
    
                @foreach ($completed_todos as $todo)
                <div class="bg-white shadow-lg group shadow-gray-500/10 rounded-xl transition py-4 flex gap-3 items-center px-3 relative border-l-4  {{$todo->is_completed ? "border-indigo-500 rounded-l-none" : "border-transparent "}}">
            
                  <form action="/todos/completed/{{$todo->id}}" method="post">
                    @csrf
                    @method("PATCH")
                    <input type="checkbox" class="rounded-full border-gray-300 w-5 h-5 text-emerald-500 focus:outline-none focus:ring-emerald-500 cursor-pointer"  {{$todo->is_completed ? "checked" : ""}}   name="is_completed" onchange="this.form.submit()">
                  </form>
                    <div class="flex-1 pr-8">
                        <h3 class="font-medium {{$todo->is_completed? "line-through decoration-gray-500" :  ""}}">{{{$todo->title}}}</h3>
    
                    </div>
    
                    <div class="flex space-x-3 items-center">
                    
                       <form action="/todos/{{$todo->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="text-rose-500 p-2 bg-rose-100 hover:bg-rose-500 hover:text-white rounded-full hover:scale-110 transition cursor-pointer opacity-0 group-hover:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                              </svg>
                              
                        </button>
                       </form>
                    </div>
                </div>
                @endforeach
           </div>
           
       </div>
        </div>

    
    </div>
</body>

</html>
