<?php

namespace App\Libraries;

class BookApiClient
{
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = env('api.baseURL', 'http://127.0.0.1:8000/api');
    }

    /**
     * Get all books with optional filters
     */
    public function getAllBooks($params = [])
    {
        $url = $this->apiBaseUrl . '/books';
        
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        
        return $this->request('GET', $url);
    }

    /**
     * Get single book by ID
     */
    public function getBook($id)
    {
        $url = $this->apiBaseUrl . '/books/' . $id;
        return $this->request('GET', $url);
    }

    /**
     * Create new book
     */
    public function createBook($data)
    {
        $url = $this->apiBaseUrl . '/books';
        return $this->request('POST', $url, $data);
    }

    /**
     * Update existing book
     */
    public function updateBook($id, $data)
    {
        $url = $this->apiBaseUrl . '/books/' . $id;
        return $this->request('PUT', $url, $data);
    }

    /**
     * Delete book
     */
    public function deleteBook($id)
    {
        $url = $this->apiBaseUrl . '/books/' . $id;
        return $this->request('DELETE', $url);
    }

    /**
     * Make HTTP request using cURL
     */
    protected function request($method, $url, $data = null)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        if ($data !== null && in_array($method, ['POST', 'PUT', 'PATCH'])) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return [
                'success' => false,
                'message' => 'cURL Error: ' . $error,
                'data' => null
            ];
        }

        curl_close($ch);

        $decoded = json_decode($response, true);
        
        if ($httpCode >= 200 && $httpCode < 300) {
            return $decoded;
        }

        return [
            'success' => false,
            'message' => $decoded['message'] ?? 'Request failed',
            'data' => null
        ];
    }
}
