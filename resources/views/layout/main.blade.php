<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
   
</head>

<body>
     <div class="cursor"></div>
     <div class="cursor2"></div>

    <x-navbar/>
    

    {{ $slot }}
   
    @auth
       @if(auth()->user()->is_revisor === 0)
       <x-jobBar/>
      @endif
    @endauth
    @guest
        <x-jobBar/>
    @endguest

    <x-footer/>
    
    @livewireScripts


    
</body>
</html>