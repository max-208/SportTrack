
<?php
    interface CalculDistance {
        /**
        * Retourne la distance en mètres entre 2 points GPS exprimés en degrés.
        * @param float $lat1 Latitude du premier point GPS
        * @param float $long1 Longitude du premier point GPS
        * @param float $lat2 Latitude du second point GPS
        * @param float $long2 Longitude du second point GPS
        * @return float La distance entre les deux points GPS
        */
        public function calculDistance2PointsGPS($lat1, $long1, $lat2, $long2);

        /**
        * Retourne la distance en metres du parcours passé en paramètres. Le parcours est
        * défini par un tableau ordonné de points GPS.
        * @param Array $parcours Le tableau contenant les points GPS
        * @return float La distance du parcours
        */
        public function calculDistanceTrajet(Array $parcours);
    }

    class CalculDistanceImpl implements CalculDistance {
        
        public function calculDistance2PointsGPS($lat1, $long1, $lat2, $long2){
            $R = 6378137;
            $newlat1 = pi() * ($lat1) / 180;
            $newlat2 = pi() * ($lat2) / 180;
            $newlong1 = pi() * ($long1) / 180;
            $newlong2 = pi() * ($long2) / 180;
            return $R*acos(sin($newlat2)*sin($newlat1)+cos($newlat2)*cos($newlat1)*cos($newlong2-$newlong1));
        }

        public function calculDistanceTrajet(Array $parcours){
            $distance  = 0;
            $i = 0;
            while( $i < count($parcours)) {
                if($i != 0){
                    $distance = $distance + $this->calculDistance2PointsGPS($parcours[$i]['latitude'],$parcours[$i]['longitude'],$parcours[$i-1]['latitude'],$parcours[$i-1]['longitude']);
                }
                $i = $i+1;
            }
            echo('distance : '.$distance);
            return $distance;
        }
    }


?>