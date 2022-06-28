<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
//use App\Models\User;
use App\Traits\ApiResponser;
use DB;
use App\Services\AuthorService;

Class AuthorController extends Controller {
    use ApiResponser;

    public $authorService;

    public function __construct(AuthorService $authorService){
        $this->authorService = $authorService;
    }

    public function index(){
        return $this->successResponse($this -> authorService -> obtainAuthors());
    }

    public function add(Request $request){
       return $this->successResponse($this -> authorService -> createAuthor($request->all(), Response::HTTP_CREATED));
    }

    public function show($id){
        return $this->successResponse($this -> authorService -> obtainAuthor($id));   
    }

    public function update(Request $request, $id){
        return $this->successResponse($this -> authorService -> editAuthor($request->all(),$id));   
    }

    public function delete($id){
        return $this->successResponse($this -> authorService -> deleteAuthor($id));
          
    }

}