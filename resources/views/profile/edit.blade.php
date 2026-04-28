@extends('dashboard')

@section('titre','Profil')

@section('content')

<div class="py-12 bg-slate-100 dark:bg-slate-950 min-h-screen">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 text-slate-900 dark:text-white">

        <!-- PROFILE INFO -->
        <div class="p-4 sm:p-8 rounded-2xl
                    bg-white dark:bg-slate-900
                    border border-slate-200 dark:border-slate-700 shadow">

            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- PASSWORD -->
        <div class="p-4 sm:p-8 rounded-2xl
                    bg-white dark:bg-slate-900
                    border border-slate-200 dark:border-slate-700 shadow">

            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- DELETE ACCOUNT -->
        <div class="p-4 sm:p-8 rounded-2xl
                    bg-white dark:bg-slate-900
                    border border-slate-200 dark:border-slate-700 shadow">

            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>

</div>

@endsection