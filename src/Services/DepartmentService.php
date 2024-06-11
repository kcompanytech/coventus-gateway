<?php

namespace Kcompany\CoventusGateway\Services;

class DepartmentService extends BaseClientService
{    
    /**
     * getDepartment
     *
     * @param  int $id
     * @return array
     */
    public function getDepartment(int $id): array|string|null
    {
        return $this->curlService->get('dataudv/api/adressebog/get_afdeling.php', ['id' => $id]);
    }
    
    /**
     * getDepartments
     *
     * @param  array $ids
     * @param  bool $public
     * @return array
     */
    public function getDepartments(array $ids = [], bool $public = false): array|string|null
    {
        $params = [];

        if(is_bool($public)) 
        {
            $params['offentlig'] = $public;
        }

        if(isset($ids))
        {
            $ids = implode(';', $ids);

            $params['ider'] = $ids;
        }

        return $this->curlService->get('dataudv/api/adressebog/get_afdelinger.php', $params);
    }
}