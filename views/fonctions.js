class fonctions {

    function calculDistance2PointsGPS(lat1, long1, lat2, long2){
        R = 6378137;
        newlat1 = pi() * (lat1) / 180;
        newlat2 = pi() * (lat2) / 180;
        newlong1 = pi() * (long1) / 180;
        newlong2 = pi() * (long2) / 180;
        return R*acos(sin(newlat2)*sin(newlat1)+cos(newlat2)*cos(newlat1)*cos(newlong2-newlong1));
    }

    function calculDistanceTrajet( parcours){
        var distance  = 0;
        var i = 0;
        while( i < count(parcours)) {
            if(i != 0){
                distance = distance + this.calculDistance2PointsGPS(parcours[i]['latitude'],parcours[i]['longitude'],parcours[i-1]['latitude'],parcours[i-1]['longitude']);
            }
            i = i+1;
        }
        echo('distance : ' + distance);
        return distance;
    }

}