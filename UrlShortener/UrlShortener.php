<?php

class UrlShortener {
    private $baseUrl = 'https://example.com/'; // change this to your domain

    public function shorten($url) {
        $code = $this->generateCode();
        $this->saveCode($url, $code);
        return $this->baseUrl . $code;
    }

    private function generateCode() {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < 10; $i++) {
            $code .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $code;
    }

    private function saveCode($url, $code) {
        file_put_contents('codes.txt', "$code $url\n", FILE_APPEND);
    }
}
