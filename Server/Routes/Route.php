<?php
    namespace Server\Routes;
    class Route {

        private static $allRoutesRoutesFunctions = [
            'get'    => [],
            'post'   => [],
            'put'    => [],
            'delete' => []
        ];

        public static function get($routeUri, $functionReference) {
            //self::$getRoutesFunctions[$routeUri] = $functionReference;
            self:: $allRoutesRoutesFunctions['get'][$routeUri] = $functionReference;
        }

        public static function post($routeUri, $functionReference) {
            self:: $allRoutesRoutesFunctions['post'][$routeUri] = $functionReference;
        }

        public static function put($routeUri, $functionReference) {
            self:: $allRoutesRoutesFunctions['put'][$routeUri] = $functionReference;
        }

        public static function delete($routeUri, $functionReference) {
            self:: $allRoutesRoutesFunctions['delete'][$routeUri] = $functionReference;
        }

        public static function fecthRouteList(){
            return self::$allRoutesRoutesFunctions;
        }

    }
