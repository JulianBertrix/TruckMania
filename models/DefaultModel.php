<?php
namespace BWB\Framework\mvc\models;
use BWB\Framework\mvc\UserInterface;
use JsonSerializable;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DefaultModel
 *
 * @author loic
 */
class DefaultModel implements UserInterface,JsonSerializable{
    public function getPassword() {
        return "doe";
    }

    public function getRoles() {
        return [
            "admin",
            "registered"
        ];
    }

    public function getUsername() {
        return "john";
    }

    public function jsonSerialize() {

    }

}
