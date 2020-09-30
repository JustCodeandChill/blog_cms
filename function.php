<?php 
        function welcome() {
            echo "welcome to php";
        }


        function add_two_number($x, $y) {
            if (!is_numeric($x) || !is_numeric($y)) {
                echo "Insufficient parameters, return null as reuslt <br>";
                return null;
            }
            return $x + $y;
        }
?>