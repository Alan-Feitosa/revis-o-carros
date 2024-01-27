<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CarService;

class CarController extends Controller{   
    protected $service;

    public function __construct(CarService $service){
        $this->service = $service;
    }
    public function index(){
        return response()->json(['deu bom']);
    }

    public function show(int $id){
        return response()->json([$id]);
    }

    public function showAll(){
        return response()->json([
            $this->service->showAll()
        ]);
    }

    public function getAllCarsByPerson(int $id){
        return response()->json([
            $this->service->getAllCarsByPerson($id)
        ]);
    }
}
