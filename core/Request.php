<?php

class Request {
    public $uri, $method, $get, $post, $files, $cookies, $server;

    public function __construct() {
        $this->uri = $_SERVER["REQUEST_URI"];
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
        $this->cookies = $_COOKIE;
        $this->server = $_SERVER;
    }
}