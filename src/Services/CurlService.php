<?php

namespace Kcompany\CoventusGateway\Services;

class CurlService
{
    private $baseUrl;
    private $clientId;
    private $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('coventus-gateway.coventus.base_url'), '/'); // Ensure no trailing slash
        $this->clientId = config('coventus-gateway.coventus.client_id');
        $this->apiKey = config('coventus-gateway.coventus.api_key');
    }

    private function buildUrl($endpoint, $params = [])
    {
        // Default parameters to include in every request
        $defaultParams = [
            'key' => $this->apiKey,
            'organization' => $this->clientId
        ];

        $params = array_merge($defaultParams, $params);

        $url = $this->baseUrl . '/' . ltrim($endpoint, '/');
        if (!empty($params)) {
            $queryString = http_build_query($params);
            $url .= '?' . $queryString;
        }

        return $url;
    }

    private function executeCurl($endpoint, $method, $data = [], $params = [])
    {
        $url = $this->buildUrl($endpoint, $params);
        $ch = curl_init();

        switch ($method) {
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, 1);
                if ($data) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                }
                break;
            case 'PUT':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                }
                break;
            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                if ($data) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                }
                break;
            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        }

        curl_close($ch);

        return json_decode($result, true);
    }

    public function get($endpoint, $params = [])
    {
        return $this->executeCurl($endpoint, 'GET', [], $params);
    }

    public function post($endpoint, $data = [], $params = [])
    {
        return $this->executeCurl($endpoint, 'POST', $data, $params);
    }

    public function put($endpoint, $data = [], $params = [])
    {
        return $this->executeCurl($endpoint, 'PUT', $data, $params);
    }

    public function delete($endpoint, $data = [], $params = [])
    {
        return $this->executeCurl($endpoint, 'DELETE', $data, $params);
    }
}
