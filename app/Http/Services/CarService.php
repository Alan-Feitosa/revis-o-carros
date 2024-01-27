<?php

namespace App\Http\Services;
use App\Models\Car;

class CarService extends Car{
    public function showAll(){
        return Car::get();
    }

    public function getAllCarsByPerson(int $id){
        // $car = Car::where('proprietario_id', $id)
        //             ->orderBy('name');
        $car = Car::join('proprietario', function($join){
            $join->on('proprietario.id', '=', 'proprietario_id');
        })
        ->where('proprietario_id', '=', $id)
        ->orderBy('proprietario.nome')
        ->get();
        return $car;
    }
}