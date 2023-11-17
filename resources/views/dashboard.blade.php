@extends('layouts.app')

@section('title')
    Perfil: {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/user.svg') }}" alt="Imagen Usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5  flex flex-col items-center md:items-start md:justify-center py-10 md:py-10">
                <p class="text-gray-700 text-2xl">{{ auth()->user()->username }}</p>
                <p class="text-gray-800 text-xl font-bold mb-5">{{ auth()->user()->name }}</p>
                <div class="mt-5">

                </div>
                <div class="mt-5">

                </div>
            </div>
        </div>
    </div>

@endsection
