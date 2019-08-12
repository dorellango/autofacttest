@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="text-gray-100 text-2xl mb-2">Hi CHIEF!!‍ 👮‍ <span class="underline">{{ auth()->user()->name }}</span> </h1>
            <h2 class="text-gray-600 text-2xl mb-16">Check all the answered quizzes</h1>

        </div>

        <table class="w-full text-left table-collapse bg-gray-900">
            <thead>
                <tr class="border border-gray-300">
                    <th class="text-lg text-gray-400 p-2 bg-gray-900">User</th>
                    <th class="text-lg text-gray-400 p-2 bg-gray-900">¿Qué te gustaría que agregáramos al informe?</th>
                    <th class="text-lg text-gray-400 p-2 bg-gray-900">¿La información es correcta?</th>
                    <th class="text-lg text-gray-400 p-2 bg-gray-900">¿Del 1 al 5, es rápido el sitio?</th>
                    <th class="text-lg text-gray-400 p-2 bg-gray-900">Answered at</th>
                </tr>
            </thead>
            <tbody class="align-baseline">
                @foreach ($quizzes as $quiz)
                    <tr class="border-l border-gray-300">
                        <td class="p-2 border-t border-gray-300 font-mono text-gray-300 whitespace-no-wrap bg-gray-800 border-r">
                            {{ $quiz->user->name }}
                        </td>
                        <td class="p-2 border-t border-gray-300 font-mono text-gray-300 whitespace-no-wrap bg-gray-800 border-r">
                            {{ $quiz->suggestions }}
                        </td>
                        <td class="p-2 border-t border-gray-300 font-mono text-gray-300 whitespace-no-wrap bg-gray-800 border-r">
                            {{ $quiz->is_the_information_right }}
                        </td>
                        <td class="p-2 border-t border-gray-300 font-mono text-gray-300 whitespace-no-wrap bg-gray-800 border-r">
                            {{ $quiz->fast_site }}
                        </td>
                        <td class="p-2 border-t border-gray-300 font-mono text-gray-300 whitespace-no-wrap bg-gray-800 border-r">
                            {{ $quiz->created_at->format('d-m-Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $quizzes->links() }}

        <div class="mt-24 col-md-8">
            <div class="mb-16 border border-dashed border-gray-600 bg-gray-900 p-4">
                <answer-chart :data="[40, 20, 10]" :labels="['Si', 'No', 'Más o Menos']"></answer-chart>
                <h2 class="text-center text-2xl mt-6 text-gray-100">
                    ¿La información es correcta?
                </h2>
            </div>
            <
        </div>
    </div>
</div>

@endsection
