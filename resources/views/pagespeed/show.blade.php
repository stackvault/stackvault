@extends('layouts.app')

@section('content')
    <div class="bg-blue-800 text-gray-200 h-32 p-5">
        <div class="w-full mb-4">
            Get Daily updates on your sites performance sent directly to your e-mail.
        </div>
        <div class="flex flex-inline justify-center">
            <input class="rounded px-3 py-1 text-gray-800" type="text" name="url" placeholder="https://mysite.com"/>
            <button class="ml-1 bg-blue-500 px-3 py-1 font-display text-gray-200 rounded hover:bg-blue-400">Do Something</button>
        </div>
    </div>
    <div class="h-32 px-5 py-24">
        We also think you stink..
    </div>
@endsection