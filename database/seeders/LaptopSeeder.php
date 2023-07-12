<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laptop;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menggunakan data dummy sebagai contoh
        $laptops = [
            [
                'company' => 'Acer',
                'product' => 'Aspire 3',
                'typename' => 'Notebook',
                'inches' => '15.6',
                'screenresolution' => '1366x768',
                'cpu' => 'AMD A9-Series 9420 3GHz',
                'ram' => '4GB',
                'memory' => '500GB HDD',
                'gpu' => 'AMD Radeon R5',
                'opsis' => 'Windows 10',
                'Weight' => '2,1kg',
                'price' => '6556880',
            ],
            [
                'company' => 'Apple',
                'product' => 'MacBook Pro',
                'typename' => 'Ultrabook',
                'inches' => '15.4',
                'screenresolution' => 'IPS Panel Retina Display 2880x1800',
                'cpu' => 'Intel Core i7 2,2GHz',
                'ram' => '16GB',
                'memory' => '256GB Flash Storage',
                'gpu' => 'Intel Iris Pro Graphics',
                'opsis' => 'Mac OS X',
                'Weight' => '2,04kg',
                'price' => '35078816.23',
            ],
            [
                'company' => 'Apple',
                'product' => 'Macbook Air',
                'typename' => 'Ultrabook',
                'inches' => '13.3',
                'screenresolution' => '1440x900',
                'cpu' => 'Intel Core i5 1,8GHz',
                'ram' => '8GB',
                'memory' => '256GB Flash Storage',
                'gpu' => 'Intel HD Graphics 6000',
                'opsis' => 'macOs',
                'Weight' => '1,34kg',
                'price' => '18993642.14',
            ],
            [
                'company' => 'Asus',
                'product' => 'ZenBook UX430UN',
                'typename' => 'Ultrabook',
                'inches' => '14',
                'screenresolution' => 'Full HD 1920x1080',
                'cpu' => 'Intel Core i7 8550U 1,8GHz',
                'ram' => '16GB',
                'memory' => '512GB SSD',
                'gpu' => 'Nvidia GeForce MX150',
                'opsis' => 'Windows 10',
                'Weight' => '1,3kg',
                'price' => '24506339',
            ],
            [
                'company' => 'Acer',
                'product' => 'Swift 3',
                'typename' => 'Ultrabook',
                'inches' => '14',
                'screenresolution' => 'IPS Panel Full HD 1920x1080',
                'cpu' => 'Intel Core i5 8250U 1,6GHz',
                'ram' => '8GB',
                'memory' => '256GB SSD',
                'gpu' => 'Intel UHD Graphics 620',
                'opsis' => 'Windows 10',
                'Weight' => '1,6kg',
                'price' => '12621994',
            ],
        ];

        // Menyimpan data dummy ke dalam database
        foreach ($laptops as $laptop) {
            Laptop::create($laptop);
        }
    }
}
