<?php

namespace Webkul\GoogleShoppingFeed\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Core\Repositories\CountryRepository;

class OAuthAccessTokenRepository extends Repository
{
    /**
     * Specify Model class name.
     *
     */
    public function model(): string
    {
        return 'Webkul\GoogleShoppingFeed\Contracts\OAuthAccessToken';
    }
    
    /**
     * Get Countries.
     * 
     * @return array
     */
    public function getCountries() 
    {
        $countries = app(CountryRepository::class)->all();

        foreach ($countries as $country) {
           $formattedCountry[$country->code ] = $country->name;
        }

        return $formattedCountry;
    }
}