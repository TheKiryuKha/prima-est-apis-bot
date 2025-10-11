<?php

declare(strict_types=1);

namespace App\Services;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Requests\Location;
use AntistressStore\CdekSDK2\Entity\Responses\CitiesResponse;

final readonly class CDEKAPIService
{
    private CdekClientV2 $cdek;

    public function __construct()
    {
        $this->cdek = new CdekClientV2(
            config()->string('cdek.account'),
            config()->string('cdek.secret')
        );
    }

    /**
     * @return array<CitiesResponse>
     */
    public function getCities(string $city): array
    {
        $request = new Location()->setCity($city);

        return $this->cdek->getCities($request);
    }
}
