@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @cannot('create', Quiz::class)
            <h1 class="text-gray-100 text-2xl mb-2">Hi! <span class="underline">{{ auth()->user()->name }}</span> you are up to date 🔥🔥🔥 </h1>
            <h2 class="text-gray-600 text-2xl mb-6">Last quiz was {{ $lastQuiz->created_at->format('d-m-Y H:m') }}</h1>

            <div class="p-4 border border-dashed border-gray-800 bg-gray-900 text-gray-100 whitespace-normal"
                style="overflow-wrap: break-word;">
                {{ json_encode($lastQuiz) }}
            </div>
            @endcannot

            @can('create', new App\Quiz())
                <h1 class="text-gray-100 text-2xl mb-6">Hi! <span class="underline">{{ auth()->user()->name }}</span> you should answer the monthly Quiz! 🗒</h1>

                <div class="card">
                    <div class="card-header">Let's see how much we improved</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('quizzes.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="suggestions" class="uppercase text-sm font-bold">¿Qué te gustaría que agregáramos al informe?</label>
                                <textarea class="form-control" id="suggestions" name="suggestions" rows="3" required></textarea>
                                @error('suggestions')
                                    <span class="uppercase mt-2 text-red-600 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="is_the_information_right" class="uppercase text-sm font-bold" required>¿La información es correcta?</label>
                                <select class="form-control" id="is_the_information_right" name="is_the_information_right">
                                    <option value="yes">Si</option>
                                    <option value="no">No</option>
                                    <option value="both">Más o Menos</option>
                                </select>
                                @error('is_the_information_right')
                                    <span class="uppercase mt-2 text-red-600 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="fast_site" class="uppercase text-sm font-bold">“¿Del 1 al 5, es rápido el sitio?</label>
                                <select class="form-control" id="fast_site" name="fast_site" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('fast_site')
                                    <span class="uppercase mt-2 text-red-600 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="bg-indigo-500 px-3 py-1 text-lg tracking-normal rounded text-indigo-200">
                                Send 👍
                            </button>
                        </form>
                    </div>
                </div>
            @endcan

        </div>
    </div>
</div>

@endsection
