<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnswerQuizTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function can_answer_the_quiz()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $attributes = [
            'suggestions' => $this->faker()->paragraph(),
            'is_the_information_right' => 'yes',
            'fast_site' => 5
        ];

        $this->actingAs($user)
        ->post('/quizzes', [
            'suggestions' => $attributes['suggestions'],
            'is_the_information_right' => 'yes',
            'fast_site' => 5
        ]);

        $this->assertDatabaseHas('quizzes', $attributes);
    }
}
