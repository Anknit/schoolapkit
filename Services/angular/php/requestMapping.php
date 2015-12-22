<?php
    function mapRequestAction(){
        $mapRequestOutput   =   array();
        switch($_REQUEST['action']){
            case STATE_CITY_SEARCH:
                $mapRequestOutput   =   processDataRequest('search_state_city',$_REQUEST['data']);
                break;
            case STATE_CITY_SEARCH:
                $mapRequestOutput   =   processDataRequest('search_city_location',$_REQUEST['data']);
                break;
            default:
                break;
        }
        return $mapRequestOutput;
    }
?>