<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,

            // 日本人っぽい名前
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,

            // 性別（1:男 2:女 3:その他）
            'gender' => $this->faker->numberBetween(1, 3),

            // それっぽいメール
            'email' => $this->faker->unique()->safeEmail,

            // 日本の携帯番号っぽく
            'tel' => '090-' .
                $this->faker->numberBetween(1000, 9999) . '-' .
                $this->faker->numberBetween(1000, 9999),

            // 日本の住所
            'address' => $this->faker->prefecture .
                $this->faker->city .
                $this->faker->streetAddress,

            // 建物名（nullあり）
            'building' => $this->faker->optional()->bothify('○○マンション ###号室'),

            // お問い合わせ内容はランダムでOK
            'detail' => $this->faker->realText(120),
        ];
    }
}
