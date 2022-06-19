<?php
namespace App\Repository;
use App\DataMapper;
class PersonRepository
{
    private DataMapper\PersonDataMapper $mapper;
    private array $persons;
    public function __construct()
    {
        $this->mapper = new DataMapper\PersonDataMapper();
        $this->persons = $this->mapper->getAll();
    }
    public function getAll() :array
    {
        return $this->persons;
    }
    public function getById($id):array
    {
        foreach ($this->persons as $it){
            if ($it['id'] == $id) return array ($it);
        }
        return array();
    }
    public function getByPhoneNumber($phone) :array
    {
        foreach ($this->persons as $it){
            if ($it['phoneNumber'] == $phone) return array ($it);
        }
       return array();
    }
    public function deleteById($id){
        $this->mapper->deleteById($id);
        $this->persons = $this->mapper->getAll();
    }
    public function add($name, $phone, $address){
        $this->mapper->add($name, $phone, $address);
        $this->persons = $this->mapper->getAll();
    }
}