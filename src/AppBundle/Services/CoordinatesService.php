<?php
/**
 * Created by PhpStorm.
 * User: gollum
 * Date: 31/05/18
 * Time: 16:16
 */

namespace AppBundle\Services;

use GuzzleHttp\Client;

class CoordinatesService
{

    /**
     * @param $address
     * @param $zipcode
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCoordinates($address, $zipcode)
    {

        $client = new Client([
            'base_uri' => 'https://api-adresse.data.gouv.fr'
        ]);
        $response = $client->request('GET', 'search/', [
                'query' => [
                    'q' => $address,
                    'postcode' => $zipcode,
                ]
            ]
        );
        $json = json_decode($response->getBody()->getContents(), true);
        $latitude = $json['features'][0]['geometry']['coordinates'][0] ?? 0;
        $longitude = $json['features'][0]['geometry']['coordinates'][1] ?? 0;

        return [$latitude, $longitude];
    }
}
