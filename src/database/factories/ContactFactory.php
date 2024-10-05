<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class; // モデルを指定する

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),  // メソッドとして呼び出す
            'last_name' => $this->faker->lastName(),    // メソッドとして呼び出す
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),  // 性別の選択肢を一般的なものに修正
            'email' => $this->faker->safeEmail(),        // メソッドとして呼び出す
            'tel' => $this->faker->numerify('###########'),      // メソッドとして呼び出す
            'address' => $this->faker->address(),        // メソッドとして呼び出す
            'building' => $this->faker->word(),          // ビル名の生成に適したメソッドに修正
            'detail' => $this->faker->sentence(),        // メソッドとして呼び出す
        ];
    }
}
