<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvData = file_get_contents(base_path('database/seeders/property-data.csv'));
        $rows = array_map('str_getcsv', explode("\n", $csvData));
        $header = array_shift($rows);


        foreach ($rows as $row) {
            $row = array_combine($header, $row);


            Property::query()->create([
                'name' => $row['Name'],
                'price' => $row['Price'],
                'bedrooms' => $row['Bedrooms'],
                'bathrooms' => $row['Bathrooms'],
                'storeys' => $row['Storeys'],
                'garages' => $row['Garages'],
            ]);
        }
    }
}
