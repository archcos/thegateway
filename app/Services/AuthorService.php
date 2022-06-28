<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;


    public function __construct(){
        $this -> baseUri = config('services.author.base_uri');
        $this -> secret = config('services.author.secret');
    }

    public function obtainAuthors(){
        return $this->performRequest('GET','/author');
    }

    public function createAuthor($data){
        return $this->performRequest('POST','author',$data);
    }

    public function obtainAuthor($id){
        return $this->performRequest('GET',"/author/{$id}");
    }

    public function editAuthor($data, $id){
        return $this->performRequest('PUT', "/author/{$id}", $data);
    }

    public function deleteAuthor($id){
        return $this->performRequest('DELETE', "/author/{$id}" );
    }
}

