<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;


    public function __construct(){
        $this -> baseUri = config('services.book.base_uri');
        $this -> secret = config('services.book.secret');
    }

    public function obtainBooks(){
        return $this->performRequest('GET','/book');
    }

    public function createBook($data){
        return $this->performRequest('POST','book',$data);
    }

    public function obtainBook($id){
        return $this->performRequest('GET',"/book/{$id}");
    }

    public function editBook($data, $id){
        return $this->performRequest('PUT', "/book/{$id}", $data);
    }

    public function deleteBook($id){
        return $this->performRequest('DELETE', "/book/{$id}" );
    }
}

