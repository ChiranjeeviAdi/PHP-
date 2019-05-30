<?php

$files = $_FILES;
$file_key = 'imageFile'; 
/*
 Use this to get the file objects if multiple files in one objects
 Example you sending the files something like this 
 imageFile[1]=FILEObject,
 imageFile[2]=FILEObject
*/

function getFileObject($files,$file_key){
     $fileObjects = array();
     if(isset($files[$file_key])){
               foreach($files[$file_key]['tmp_name'] as $key => $tmp_name)
               {
                    if(array_key_exists($key,$fileObjects)){

                    }else{
                              $fileObjects[$key]=[];
                              
                    }
                    $file['name'] = $files[$file_key]['name'][$key];
                    $file['size'] = $files[$file_key]['size'][$key];
                    $file['tmp_name'] = $files[$file_key]['tmp_name'][$key];
                    $file['type'] = $files[$file_key]['type'][$key];
                    $file['error'] = $files[$file_key]['error'][$key];
                    $fileObjects[$key] = $file;

               }		
     }
     return $fileObjects;
}

$fileObjects = getFileObject($_FILES,'imageFile');
print_r($fileObjects); 
/*
return as 
Array
(
    [1] => Array
        (
            [name] => 3.png
            [size] => 4378
            [tmp_name] => /private/var/tmp/phpWtM13k
            [type] => image/png
            [error] => 0
        )

    [2] => Array
        (
            [name] => 2.png
            [size] => 64874
            [tmp_name] => /private/var/tmp/phplpNN8Z
            [type] => image/png
            [error] => 0
        )

)

*/

