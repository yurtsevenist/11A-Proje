<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $urunler=['Gömlek','Pantolon','T-Shirt','Kazak','Şort','Mayo','Süveter','Takım Elbise','Ceket'];
        $kategori=['Erkek','Kadın','Çocuk','Aksesuar'];
        $beden=['XS','S','M','L','XL'];
        $renk=['Kırmızı','Siyah','Beyaz','Kahverengi','Sarı','Lacivert','Yeşil','Gri'];
        return [
            'code'=>Str::random(6),
            'name' => $urunler[rand(0,8)],
            'photo'=>$this->faker->imageUrl(640, 480, 'all', true,'Faker'),
            'info'=>$this->faker->text(100),
            'category' => $kategori[rand(0,3)],
            'size'=>$beden[rand(0,4)] ,
            'color'=>$renk[rand(0,7)],
            'price'=>$this->faker->randomFloat(2, 9, 100),
            'point'=>$this->faker->numberBetween(0, 5),
            'number'=>$this->faker->numberBetween(0, 500),
        ];
    }
}
