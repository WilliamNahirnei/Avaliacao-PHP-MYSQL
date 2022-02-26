<?php
    namespace Server\Routes;
    class Route {
        private static $getRoutesFunctions = [];
        public static function get($routeUri, $functionReference) {
            self::$getRoutesFunctions[$routeUri] = $functionReference; 
        }
        public static function fecthRouteList(){
            return self::$getRoutesFunctions;
        }
    }
