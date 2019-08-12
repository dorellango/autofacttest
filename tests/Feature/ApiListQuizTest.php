<?php

namespace Tests\Feature;

use App\Quiz;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiListQuizTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_fetch_all_the_quizzes()
    {
        $jhonQuiz = factory(Quiz::class)->create();
        $janeQuiz = factory(Quiz::class)->create();

        $response = $this->get('/api/quizzes')
        ->assertStatus(200);

        $this->assertTrue($response->original->contains($jhonQuiz));
        $this->assertTrue($response->original->contains($janeQuiz));
    }

    /** @test */
    public function return_answers_as_formated_chart_data()
    {
        factory(Quiz::class, 3)->create(['is_the_information_right' => 'yes']);
        factory(Quiz::class, 4)->create(['is_the_information_right' => 'no']);
        factory(Quiz::class, 5)->create(['is_the_information_right' => 'both']);

        $response = $this->get('/api/quizzes-chart')->json();

        $this->assertEquals($response, [
            [
                'answer' => 'both',
                'total' => 5,
            ],
            [
                'answer' => 'no',
                'total' => 4,
            ],
            [
                'answer' => 'yes',
                'total' => 3,
            ]
        ]);
    }
}
