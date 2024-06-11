<?php

namespace Kcompany\CoventusGateway\Services;

class CurlService
{
    /**
     *
     * @var string
     */        
    private string $baseUrl;
    /**
     *
     * @var string
     */
    private string $clientId;
    /**
     * 
     * @var string
     */
    private string $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('coventus-gateway.coventus.base_url'), '/'); // Ensure no trailing slash
        $this->clientId = config('coventus-gateway.coventus.client_id');
        $this->apiKey = config('coventus-gateway.coventus.api_key');
    }
    /**
     * Build http url query and sets default parameters
     *
     * @param  string $endpoint
     * @param  array  $params
     *
     * @return string
     */
    private function buildUrl(string $endpoint, array $params = []): string
    {
        // Default parameters to include in every request
        $defaultParams = [
            'key' => $this->apiKey,
            'organization' => $this->clientId,
        ];

        $params = array_merge($defaultParams, $params);

        $url = $this->baseUrl.'/'.ltrim($endpoint, '/');
        if (!empty($params)) {
            $queryString = http_build_query($params);
            $url .= '?'.$queryString;
        }

        return $url;
    }
    /**
     * Execute curl
     *
     * @param  string            $endpoint
     * @param  string            $method
     * @param  array             $data
     * @param  array             $params
     *
     * @return array|string|null
     */
    private function executeCurl(string $endpoint, string $method, array $data = [], array $params = []):  array|string|null
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
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                if ($data) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                }
                break;
            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if ($data) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                }
                break;
            default:
                if ($data) {
                    $url = sprintf('%s?%s', $url, http_build_query($data));
                }
        }

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Error:'.curl_error($ch);
        }

        curl_close($ch);

        return json_decode($result, true);
    }
    /**
     * Uses get method
     *
     * @param  string            $endpoint
     * @param  array             $params
     *
     * @return array|string|null
     */   
    public function get(string $endpoint, array $params = []): array|string|null
    {
        return $this->executeCurl($endpoint, 'GET', [], $params);
    }
    /**
     * Uses post method
     *
     * @param  string            $endpoint
     * @param  array             $data
     * @param  array             $params
     *
     * @return array|string|null
     */
    public function post(string $endpoint, array $data = [], array $params = []): array|string|null
    {
        return $this->executeCurl($endpoint, 'POST', $data, $params);
    }
    /**
     * Uses put method
     *
     * @param  string            $endpoint
     * @param  array             $data
     * @param  array             $params
     *
     * @return array|string|null
     */
    public function put(string $endpoint, array $data = [], array $params = []): array|string|null
    {
        return $this->executeCurl($endpoint, 'PUT', $data, $params);
    }
    /**
     * Uses delete method
     *
     * @param  string            $endpoint
     * @param  array             $data
     * @param  array             $params
     *
     * @return array|string|null
     */
    public function delete(string $endpoint, array $data = [], array $params = []): array|string|null
    {
        return $this->executeCurl($endpoint, 'DELETE', $data, $params);
    }
}
