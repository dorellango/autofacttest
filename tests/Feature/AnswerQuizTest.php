<?php

namespace Tests\Feature;

use App\Quiz;
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

    /** @test */
    public function it_require_suggestions()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
        ->post('/quizzes', [])
        ->assertSessionHasErrors('suggestions');

        $this->assertEmpty(Quiz::all());
    }

    /** @test */
    public function it_require_is_the_information_right()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
        ->post('/quizzes', [])
        ->assertSessionHasErrors('is_the_information_right');

        $this->assertEmpty(Quiz::all());
    }

    /** @test */
    public function fast_site_cannot_be_grater_than_five()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
        ->post('/quizzes', [
            'fast_site' => 6
        ])
        ->assertSessionHasErrors('fast_site');

        $this->assertEmpty(Quiz::all());
    }

    /** @test */
    public function fast_site_cannot_be_lower_than_one()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
        ->post('/quizzes', [
            'fast_site' => 0
        ])
        ->assertSessionHasErrors('fast_site');

        $this->assertEmpty(Quiz::all());
    }

    /** @test */
    public function fast_site_should_be_numeric()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
        ->post('/quizzes', [
            'fast_site' => 'notanumber'
        ])
        ->assertSessionHasErrors('fast_site');

        $this->assertEmpty(Quiz::all());
    }
}
