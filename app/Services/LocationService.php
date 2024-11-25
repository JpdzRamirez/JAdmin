<?php

namespace App\Services;

use App\Contracts\CountryServiceInterface;
use App\Contracts\StateServiceInterface;
use App\Contracts\CityServiceInterface;

use App\Exceptions\CurlRequestException;

class LocationService implements CountryServiceInterface, StateServiceInterface, CityServiceInterface
{

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    private function curlRequest($url)
    {
        $maxRetries = 3;
        $attempts = 0;
        $responseData = null;
    
        while ($attempts < $maxRetries) {
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_VERBOSE, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    
                $response = curl_exec($ch);
    
                if (curl_errno($ch)) {
                    throw new CurlRequestException('cURL Error: ' . curl_error($ch));
                }
    
                curl_close($ch);
    
                // Eliminar caracteres "&" que no son entidades HTML
                $response = preg_replace('/&(?![a-z0-9#]+;)/i', '', $response);
    
                // Decodificar JSON y verificar errores
                $responseData = json_decode($response, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new CurlRequestException('Error en la decodificación de JSON: ' . json_last_error_msg());
                }
    
                return $responseData;
    
            } catch (CurlRequestException $e) {
                error_log("Error en intento $attempts: " . $e->getMessage());
                $attempts++;
                usleep(500000); // Esperar 0.5 segundos antes de intentar nuevamente
            }
        }
    
        // Retornar null si no se pudo obtener una respuesta válida después de los intentos
        return null;
    }

    public function fetchCountries()
    {
        // Ruta al archivo JSON local
        $filePath = public_path('assets/locations/allCountries.json'); 
    
        if (file_exists($filePath)) {
            // Leer el contenido del archivo JSON
            $response = file_get_contents($filePath);
            // Decodificar el JSON
            $responseData = json_decode($response, true);
    
            // Verificar si hubo un error en la decodificación JSON
            if (json_last_error() !== JSON_ERROR_NONE) {
                error_log('Error en la decodificación de JSON: ' . json_last_error_msg());
                return []; // Retorna un arreglo vacío si hay un error
            }
    
            // Filtrar los datos solo con 'name.common' y 'flags.png'
            $filteredData = array_map(function ($country) {
                return [
                    'name' => $country['name']['common'] ?? '',
                    'flag' => $country['flags']['png'] ?? '',
                    'phoneCode' => isset($country['idd']['root'], $country['idd']['suffixes']) 
                    ? $country['idd']['root'] . implode('', $country['idd']['suffixes']) 
                    : ''
                ];
            }, $responseData);
    
            // Ordenar alfabéticamente por el nombre común del país
            usort($filteredData, function ($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
    
            return $filteredData;
        }
    
        // Retorna un arreglo vacío si el archivo falla
        return [];
    }

    public function fetchStates($countryName)
    {
        $geonameId = $this->getCountryId($countryName)['geonameID'];
        $url = "http://api.geonames.org/childrenJSON?geonameId={$geonameId}&username=jpdzramirez&lang=es";

        return $this->curlRequest($url);
    }

    public function fetchCities($stateId)
    {
        $url = "http://api.geonames.org/childrenJSON?geonameId={$stateId}&username=jpdzramirez";
        return $this->curlRequest($url);
    }

    public function getCountryId($countryName)
    {
        $url = 'http://api.geonames.org/countryInfoJSON?username=jpdzramirez';
        $response = $this->curlRequest($url);

        if ($response !== false) {
            foreach ($response['geonames'] as $country) {
                if (strcasecmp($country['countryName'], $countryName) === 0) {
                    $response = [
                        'geonameID' => $country['geonameId'],
                        'countryID' => $country['countryCode']
                    ];
                    return $response; // Retorna el geonameId
                }
            }
        }
        return null;
    }

    public function getStateId($stateName, $countryID)
    {
        $stateNameEncoded = urlencode($stateName);
        $url = "http://api.geonames.org/searchJSON?q={$stateNameEncoded}&country={$countryID}&featureCode=ADM1&maxRows=1&username=jpdzramirez";

        $response = $this->curlRequest($url);
        if ($response !== false && isset($response['geonames'][0])) {
            return $response['geonames'][0]['geonameId']; // Retorna el geonameId
        }
        return null;
    }
}