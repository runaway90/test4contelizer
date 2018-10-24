<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use \App\Brewer;

class BrewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alreadyExist = Brewer::where('id', 1)->first();

        if (is_null($alreadyExist)) {
            $client = new Client();
            try{
                $response = $client->request('GET', env('API_URL'));
            }catch (Exception $exception){
                dd('Please check API_URL in ".env" and others parameters of request to beer-server in the file BrewerSeeder.php');
            }

            $brewers = json_decode($response->getBody()->getContents());

            foreach ($brewers as $value){
                $name = $value->brewer;
                $one = Brewer::where('name', $name)->count();
                if($one < 1){
                    Brewer::create([
                        'name' => $name
                    ]);
                }
            }
            echo("\n".'Congratulations! Information about brewers wrote in database ->>>>> '.env('DB_DATABASE')."\n".
                'You can see this in BREWER table'."\n"."\n"
            );
        }else{
            echo("\n" . 'You already have information about BREWER.'. "\n" .
                'If You want refresh all tables, please do command || php artisan migrate:refresh' . "\n" . "\n"
            );
        }

    }
}
