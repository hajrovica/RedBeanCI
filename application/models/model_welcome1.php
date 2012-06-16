<?php

// class MyModelFormatter implements RedBean_IModelFormatter
// {

//    public function formatModel($model)
//     {
//         return $model . '_object';
//     }
// }

class Model_welcome extends RedBean_SimpleModel
{


    function dispense(){
        echo "dispense - ";
        echo $this->id . '<br>';
    }
    function open(){
        echo "open - ";
        echo $this->id . '<br>';
    }
    function update(){
        echo "update - ";
        echo $this->id . '<br>';
    }
    function after_update() {
        echo "after_update - ";
        echo $this->id . '<br>';
    }

    function delete() {
        echo "delete - ";
        echo $this->id . '<br>';
    }
    function after_delete() {
        echo "after_delete - ";
        echo $this->id . '<br>';
    }

    function test(){
        echo "Test function!". '<br>';

    }



}