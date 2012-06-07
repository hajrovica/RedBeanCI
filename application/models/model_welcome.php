<?php

/**
*
*/
class Model_welcome extends RedBean_SimpleModel
{


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