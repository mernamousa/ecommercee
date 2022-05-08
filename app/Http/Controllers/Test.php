<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function test(){

        $arr = ['arr1','arr2','arr3'];

        $arr2 = [['ssssss','vale'],'val','val'];
        //its correct but we was use same keys we was wrong
        $arr3 = ["a"=>['ssssss','vale'],"b"=>'val',"c"=>'val'];



        $arr = [0=>'arr1',1=>'arr2',2=>'arr3'];
        
        foreach($arr as $key => $value){
            echo $arr[$key]."__".$value . "<br>";
        }


        for($i=0; $i < count($arr); $i++){
            echo $arr[$i]."<br>";
        }


    }
}
