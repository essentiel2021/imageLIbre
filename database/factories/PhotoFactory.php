<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->image();
        $imageFile = new File($image);
        return [
            'album_id'=>Album::factory(),
            'title' => $this->faker->sentence,
            'thumbail_path'=> $path = 'storage/'.Storage::putFile('photos',$imageFile),
            'thumbail_url'=> config('app.url').'/'.Str::after($path, 'public/'),
        ];
    }
}
