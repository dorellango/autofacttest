<?php

namespace Tests\Feature;

use App\Quiz;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListQuizzesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_the_answered_quizzes()
    {
        $admin = factory(User::class)->create(['is_admin' => true]);
        $jhonQuiz = factory(Quiz::class)->create();
        $janeQuiz = factory(Quiz::class)->create();

        $this->actingAs($admin)
        ->get(route('quizzes.index'))
        ->assertViewIs('quizzes.index')
        ->assertViewHas('quizzes', function ($quizzes) use ($janeQuiz, $jhonQuiz) {
            return $quizzes->contains($janeQuiz) && $quizzes->contains($jhonQuiz);
        });
    }

    /** @test */
    public function non_admins_cannot_access()
    {
        $anyone = factory(User::class)->create();
        $this->actingAs($anyone)
        ->get(route('quizzes.index'))
        ->assertStatus(403);
    }
}
