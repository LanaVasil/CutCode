<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
  public function definition(): array
  {
    return [
      'name' => $this->faker->company(),
      'status' => $this->faker->boolean(),
      'sort' => $this->faker->numberBeetween(),
      // 'slug' => не додаємо буде генеруватися на рівні eventov в моделі

      // 'slug' => ucfirst($this->faker->words(1, true)),
      // 'name' => ucfirst($this->faker->words(2, true)),
      // 'name' => $this->faker->bank(),
      // 'name' => $this->faker->name(),
      // 'strit' => $this->faker->address(), 
      // 'email' => $this->faker->email(), 
      // 'name' => $this->$faker->text();
      // 'serial' => $this->faker->numberBetween($min = 1000000000, $max = 9999999999),
      // 'serial' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
      // $faker->unique()->randomDigitNotNull();
      // Faker также предлагает специальные модификаторы для помощи в тестировании, такие как unique(), optional() или valid(). 
      // 'sort' => $this->faker->numberBeetween(),
      // 'start_at' => $this->faker->dateTime()->format('Y-m-d')
      // ->format('d-m-Y H:i:s')
      // $this->faker->unique()->numberBetween(1, 20)

      // $faker->unique($reset = true)->randomDigitNotNull;
      // $faker->optional()->randomDigit
      // $faker->optional($weight = 0.1)->randomDigit; // 90% chance of NULL
      // $faker->optional($weight = 0.9)->randomDigit; // 10% chance of NULL
      // $faker->optional($weight = 0.5, $default = false)->randomDigit; // 50% chance of FALSE
      // $faker->optional($weight = 0.9, $default = 'abc')->word; // 10% chance of 'abc'
      // $faker->optional()->passthrough(mt_rand(5, 15));
//       dayOfMonth($max = 'now')              // '04'
// dayOfWeek($max = 'now')               // 'Friday'
// month($max = 'now')                   // '06'
// monthName($max = 'now')               // 'January'
// year($max = 'now')  
// баркоде isbn10 

// base:
// randomDigit             // 7
// randomDigitNot(5)       // 0, 1, 2, 3, 4, 6, 7, 8, or 9
// randomDigitNotNull      // 5
// randomNumber($nbDigits = NULL, $strict = false) // 79907610
// randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) // 48.8932
// numberBetween($min = 1000, $max = 9000) // 8567
// randomLetter            // 'b'
// // returns randomly ordered subsequence of a provided array
// randomElements($array = array ('a','b','c'), $count = 1) // array('c')
// randomElement($array = array ('a','b','c')) // 'b'
// shuffle('hello, world') // 'rlo,h eoldlw'
// shuffle(array(1, 2, 3)) // array(2, 1, 3)
// numerify('Hello ###') // 'Hello 609'
// lexify('Hello ???') // 'Hello wgt'
// bothify('Hello ##??') // 'Hello 42jz'
// asciify('Hello ***') // 'Hello R6+'
// regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'); // sm0@y8k96a.ej

// 
// name($gender = null|'male'|'female')      // 'Dr. Zane Stroman'
// firstName($gender = null|'male'|'female') // 'Maynard'
// firstNameMale                             // 'Maynard'
// firstNameFemale                           // 'Rachel'
// lastName                                  // 'Zulauf'

    ];
  }
}
