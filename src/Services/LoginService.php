<?php

namespace Kcompany\CoventusGateway\Services;

use InvalidArgumentException;

class LoginService extends BaseClientService
{
    public function login(string $emailOrphone, $password)
    {
        $data = ['version' => 2, 'adgangskode' => $password];
        // Mobil_land_alpha2 (ISO 3166-1)
        if (strlen($emailOrphone) == 8)
        {
            $data['log_ind_med'] = 'mobil'; 
            $data['mobil'] = $emailOrphone;
        }elseif(filter_var($emailOrphone, FILTER_VALIDATE_EMAIL) !== false)
        {
            $data['log_ind_med'] = 'email';
            $data['email'] = $emailOrphone;
        }else{
            throw new InvalidArgumentException('The input must be a valid email address or an 8-digit phone number.');
        }

        return $this->curlService->post('dataudv/api/medlemslogin/login.php', $data);        
    }
}