<?php

namespace Kcompany\CoventusGateway\Services;

class DepartmentService extends BaseClientService
{
    public function getDepartment(int $id)
    {
        return $this->curlService->get('dataudv/api/adressebog/get_afdeling.php', intval($id));
    }

    public function getDepartments(array $ids = [], $offentlig = null)
    {
        $data = [];

        if(is_bool($offentlig)) 
        {
            $data = array_merge(['offentlig' => $offentlig]);
        }

        if(isset($ids))
        {
            $ids = implode(';', $ids);

            $data = array_merge(['ider' => $ids], $data);
        }

        return $this->curlService->get('dataudv/api/adressebog/get_afdelinger.php', $data);
    }
}