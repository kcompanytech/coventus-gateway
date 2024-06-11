<?php

namespace Kcompany\CoventusGateway\Services;

use InvalidArgumentException;

class OrganizationService extends BaseClientService
{
    /**
     * getOrganizations
     *
     * @return array
     */
    public function getOrganizations(): array|string|null
    {
        return $this->curlService->get('dataudv/api/adressebog/get_organisationer.php');
    }

    /**
     * getExtraFields
     *
     * @return array
     */
    public function getExtraFields(?string $scope = null, ?int $departmentId = null, ?int $groupId = null): array|string|null
    {
        $params = [];

        if (isset($scope)) {
            if ($scope != 'forening' || $scope != 'afdeling' || $scope != 'gruppe') {
                throw new InvalidArgumentException('Scope does not exist');
            }
            $params['scope'] = $scope;
        }

        if ($scope == 'afdeling' && isset($departmentId)) {
            $params['afdeling'] = $departmentId;
        }

        if ($scope == 'gruppe' && isset($groupId)) {
            $params['gruppe'] = $groupId;
        }

        return $this->curlService->get('dataudv/api/adressebog/get_ekstra_felter.php', $params);
    }
}
