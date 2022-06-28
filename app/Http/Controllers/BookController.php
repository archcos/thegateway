<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
//use App\Models\User;
use App\Traits\ApiResponser;
use DB;
use App\Services\BookService;
use App\Services\AuthorService;

Class BookController extends Controller {
    use ApiResponser;

    public $bookService;

    public function __construct(BookService $bookService){
        $this->bookService = $bookService;
    }

    public function index(){
    
        return $this->successResponse($this -> bookService -> obtainBooks());
    }

    public function add(Request $request){
       return $this->successResponse($this -> bookService -> createBook($request->all(), Response::HTTP_CREATED));
    }

    public function show($id){
      
        return $this->successResponse($this -> bookService -> obtainBook($id));
      
    }

    public function update(Request $request, $id){
        return $this->successResponse($this -> bookService -> editBook($request->all(),$id));   
    }

    public function delete($id){
        return $this->successResponse($this -> bookService -> deleteBook($id));
          
    }

}