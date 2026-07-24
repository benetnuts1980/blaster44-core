@extends('layouts.app')

@section('title', 'Mon profil')

@section('content')

<div class="min-h-screen bg-[#0A0A0A] text-white py-32">

    <div class="max-w-5xl mx-auto px-6">

        <h1 class="text-5xl font-black mb-10">
            👤 Mon <span class="text-lime-400">Profil</span>
        </h1>

        <div class="space-y-8">

            <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-8 shadow-lg shadow-lime-500/10">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-8 shadow-lg shadow-lime-500/10">
                @include('profile.partials.update-password-form')
            </div>

            <div class="bg-[#111111] border border-red-500/20 rounded-3xl p-8 shadow-lg shadow-red-500/10">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>

</div>

@endsection
