<?php

namespace Kcompany\CoventusGateway\Services;

class FinansService extends BaseClientService
{    
    /**
     * getFinans
     *
     * @param  string $from
     * @param  string $to
     * @param  string $account
     * @return array
     */
    public function getFinans(string $from, string $to, string $account = null): array|string|null
    {
        $params = ['fraDato' => $from, 'tilDato' => $to];
        if (isset($account)) {
            $params['regnskab'] = $account;
        }

        return $this->curlService->get('dataudv/api/finans/bogfoeringsjournal.php', $params);
    }
}
