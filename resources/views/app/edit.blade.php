<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo app</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="bg-slate-800 h-screen">
    <header class="relative h-56 w-full bg-gradient-to-r from-slate-700 to-zinc-300 ">
        <img src="{{asset('image/bgtodo.jpg')}}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30 object-[center_35%]">
    </header>
        <div class="flex justify-center items-center flex-col pt-4 ">
            @if ($errors->any())
            <div class="alert alert-danger rounded-sm py-2 w-1/4 ">
                @foreach ($errors->all() as $error )
                    {{$error}}
                @endforeach
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success rounded-sm py-2 w-1/4 ">
                    {{session('success')}}
            </div>
            @endif
            <div class="flex flex-col gap-4">
                <h1 class="text-2xl text-gray-300">Edit Todo</h1>
            <div class="relative mb-6 w-full h-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <i class="fa-solid fa-list-check"></i>
            </div>
            <div class="flex gap-4">
                <form action="{{route('todo.update', $data->id)}}" method="post" class="flex gap-4">
                    @csrf
                    @method('put')
                    <input type="text" id="input-group-1" name="task" value="{{old('task', $data->task)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-72 ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Create a new task here dude">
                    <div class="w-8 h-10 bg-slate-700 text-center rounded flex items-center justify-center cursor-pointer">
                        <button type="submit">
                            <i class="fa-solid fa-paper-plane text-white"></i>
                        </button>
                    </div>
                </form>
            </div>

            </div>
            </div>
        </div>

</body>
</html>
