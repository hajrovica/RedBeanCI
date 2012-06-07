<?php

class Model_song extends RedBean_SimpleModel {

 // public function update() {
 //  if ( $this->title != 'test' ) {
 //    throw new Exception("Illegal title!");
 //  }
 // }


    function dispense(){
        echo "dispense";
    }
    function open(){
        echo "open";
    }
    function update(){
        echo "update";
    }
    function after_update() {
        echo "after_update";
    }

}
