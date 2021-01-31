<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Chips (Fries)
        $menu = new Menu([
            'imagePath' => 'Chips.jpg',
            'dish' => 'Chips(Fries)',
            'description' => 'None',
            'price' => '100',
        ]);

        $menu->save();

        #Hamburger
        $menu = new Menu([
            'imagePath' => 'Hamburger.jpg',
            'dish' => 'Hamburger',
            'description' => 'None',
            'price' => '250',
        ]);

        $menu->save();

        #Chips Masala
        $menu = new Menu([
            'imagePath' => '150',
            'dish' => 'Chips Masala',
            'description' => 'None',
            'price' => '150',
        ]);

        $menu->save();

        #Spice fries
        $menu = new Menu([
            'imagePath' => 'SpiceFries.jpg',
            'dish' => 'Spice Fries',
            'description' => 'None',
            'price' => '150',
        ]);

        $menu->save();

        #Sausage
        $menu = new Menu([
            'imagePath' => 'Sausage.jpg',
            'dish' => 'Sausage',
            'description' => 'None',
            'price' => '50',
        ]);

        $menu->save();

        #Smokie
        $menu = new Menu([
            'imagePath' => 'Smokie.jpg',
            'dish' => 'Smokie',
            'description' => 'None',
            'price' => '30',
        ]);

        $menu->save();

        #Chicken 1/4
        $menu = new Menu([
            'imagePath' => 'Chicken-1.jpg',
            'dish' => 'Chicken 1/4',
            'description' => 'None',
            'price' => '200',
        ]);

        $menu->save();

        #Chicken 1/2
        $menu = new Menu([
            'imagePath' => 'Chicken-2.jpg',
            'dish' => 'Chicken 1/2',
            'description' => 'None',
            'price' => '400',
        ]);

        $menu->save();

        #Chicken 3/4
        $menu = new Menu([
            'imagePath' => 'Chicken-3.jpg',
            'dish' => 'Chicken 3/4',
            'description' => 'None',
            'price' => '600',
        ]);

        $menu->save();

        #Chicken Full
        $menu = new Menu([
            'imagePath' => 'Chicken.jpg',
            'dish' => 'Chicken Full',
            'description' => 'None',
            'price' => '800',
        ]);

        $menu->save();

        #Salad
        $menu = new Menu([
            'imagePath' => 'Salad.jpg',
            'dish' => 'Salad',
            'description' => 'None',
            'price' => '150',
        ]);

        $menu->save();

        #Kachumbari
        $menu = new Menu([
            'imagePath' => 'Kachumbari.jpg',
            'dish' => 'Kachumbari',
            'description' => 'None',
            'price' => '50',
        ]);

        $menu->save();
    }
}
