<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportCsvRequest;
use App\Models\Property;
use Illuminate\Http\JsonResponse;

class CsvController extends Controller
{
    public function __invoke(ImportCsvRequest $request): JsonResponse
    {
        $csvData = file_get_contents($request->file('csv'));
        $rows = array_map('str_getcsv', explode("\n", $csvData));
        $header = array_shift($rows);



        foreach ($rows as $row) {
            $row = array_combine($header, $row);


            Property::query()->updateOrCreate([
                'name' => $row['Name'],

            ], [
                'name' => $row['Name'],
                'price' => $row['Price'],
                'bedrooms' => $row['Bedrooms'],
                'bathrooms' => $row['Bathrooms'],
                'storeys' => $row['Storeys'],
                'garages' => $row['Garages'],
            ]);
        }

        return response()->json([
            'success' => true
        ], 201);
    }
}
