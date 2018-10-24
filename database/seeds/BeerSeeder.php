<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use \App\Brewer;
use \App\Beer;


class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alreadyExist = Beer::where('id', 1)->first();

        if (is_null($alreadyExist)) {
            $client = new Client();
            try{
                $response = $client->request('GET', env('API_URL'));
            }catch (Exception $exception){
                dd('Please check API_URL in ".env" and others parameters of request to beer-server in the file BeerSeeder.php');
            }

            $beers = json_decode($response->getBody()->getContents());

            foreach ($beers as $beer) {
                $array = [];
                $array = explode(' ', $beer->size);
                $quantity = (int)$array[0];
                $units = (int)$array[5];
                $price = $beer->price;
                $pricePerLitre = ($beer->price * 1000) / ($quantity * $units);

                $brewer = Brewer::where('name', $beer->brewer)->first();
                $brewer->beer()->create([
                    'name' => $beer->name,
                    'price' => $price,
                    'image_url' => $beer->image_url,
                    'country' => $beer->country,
                    'type' => $beer->type,
                    'quantity' => $quantity,
                    'volume_of_unit' => $units,
                    'price_per_litre' => $pricePerLitre
                ]);
            }

            echo("\n" . 'Congratulations! Information about beer wrote in database ->>>>> ' . env('DB_DATABASE') . "\n" .
                'You can see this in BEER table' . "\n" . "\n"
            );
        }else {
            echo("\n" . 'You already have information about BEER.'. "\n" .
                'If You want refresh all tables, please do command || php artisan migrate:refresh' . "\n" . "\n"
            );
        }
    }
}
