<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Models\UserReview;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserReviewFactory extends Factory
{
    protected $model = UserReview::class;

    public function definition(): array
    {
        return [
            'reviewed_user_id' => User::factory(),
            'reviewer_user_id' => User::factory(),
            'service_order_id' => Str::ulid(),
            'description' => $this->faker->text(200),
            'rating' => $this->faker->numberBetween(1, 5),
            'is_done' => $this->faker->boolean(),
            'is_visible' => $this->faker->boolean(),
        ];
    }

    public function reviewedBy(User $user): static
    {
        return $this->state([
            'reviewer_user_id' => $user->id,
        ]);
    }

    public function reviewedUser(User $user): static
    {
        return $this->state([
            'reviewed_user_id' => $user->id,
        ]);
    }

    public function serviceOrder(string $serviceOrderId): static
    {
        return $this->state([
            'service_order_id' => $serviceOrderId,
        ]);
    }
}
