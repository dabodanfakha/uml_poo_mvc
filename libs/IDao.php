<?php
interface IDao{
    public function add($obj);
    public function update($obj);
    public function delete($id,$nomId);
    public function findAll();
    public function findById($id);
}