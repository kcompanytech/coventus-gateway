<?php

namespace Kcompany\CoventusGateway\Services;

use InvalidArgumentException;

class LoginService extends BaseClientService
{
    /**
     * login
     *
     * @return array
     */
    public function login(string $emailOrphone, string $password): array|string|null
    {
        $params = ['version' => 2, 'adgangskode' => $password];
        // Mobil_land_alpha2 (ISO 3166-1)
        if (strlen($emailOrphone) == 8) {
            $params['log_ind_med'] = 'mobil';
            $params['mobil'] = $emailOrphone;
        } elseif (filter_var($emailOrphone, FILTER_VALIDATE_EMAIL) !== false) {
            $params['log_ind_med'] = 'email';
            $params['email'] = $emailOrphone;
        } else {
            throw new InvalidArgumentException('The input must be a valid email address or an 8-digit phone number.');
        }
        return $this->curlService->post('dataudv/api/medlemslogin/login.php', $params);
    }
}
