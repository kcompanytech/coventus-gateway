<?php

namespace Kcompany\CoventusGateway\Services;

class DepartmentService extends BaseClientService
{
    public function getDepartment(int $id)
    {
        return $this->curlService->get('dataudv/api/adressebog/get_afdeling.php', intval($id));
    }

    public function getDepartments(array $ids, ?bool $public)
    {
        $data = [];

        if (is_bool($public)) {
            $data['offentlig'] = $public;
        }

        if (isset($ids)) {
            $ids = implode(';', $ids);

            $data['ider'] = $ids;
        }

        return $this->curlService->get('dataudv/api/adressebog/get_afdelinger.php', $data);
    }
}
