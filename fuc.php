<?php
    function findElementInArray($array, $element) {
        foreach ($array as $subArray) {
            if($subArray[0] === $element){
                return true;
            }
            // foreach ($subArray as $key => $value) {
            //     if ($value === $element) {
            //         return true;
            //     }
            // }
        }
        return false;
    }
    function findCartId($array, $iduser) {
        foreach ($array as $subArray) {
            if($subArray['user_id'] === $iduser){
                return true;
            }
            // foreach ($subArray as $key => $value) {
            //     if ($value === $element) {
            //         return true;
            //     }
            // }
        }
        return false;
    }

?>