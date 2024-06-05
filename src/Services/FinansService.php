<?php

namespace Kcompany\CoventusGateway\Services;

class FinansService extends BaseClientService
{
    public function getFinans($from, $to, $account = null)
    {
        $params = ['fraDato' => $from, 'tilDato' => $to];
        if (isset($account)) {
            $params['regnskab'] = $account;
        }

        return $this->curlService->get('dataudv/api/finans/bogfoeringsjournal.php', $params);
    }
}
