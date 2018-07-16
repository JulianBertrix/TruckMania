<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAORole;

class RoleController extends Controller {

    private $role;

    public function __construct(){
        parent::__construct();
        $this->role = new DAORole();
    }

    public function getAll(){
        return $this->role->getAll();
    }

    public function getAllBy($filter){
        return $this->role->getAllBy($filter);
    }
    public function retrieve($id){
        return $this->role->retrieve($id);
    }

    public function create($newRole){
        return $this->role->create($newRole);
    }

    public function delete($id){
        return $this->role->delete($id);
    }

    public function updateMe($idRole,$newValeurs) {
        return $this->role->updateMe($idRole,$newValeurs);
    }

    public function update($newValeurs) {
        return $this->role->update($newValeurs);
    }

    public function theLastOne() {
        return $this->role->theLastOne();
    }

}
