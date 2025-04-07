<?php
namespace App\Repository\interfaces;

interface DoctorTitleInterface{
    function getAll();
    function getById($id);
    function create($data);
    function edit($id, $data);
    function delete($id);
}