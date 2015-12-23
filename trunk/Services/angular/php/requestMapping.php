<?php
    function mapRequestAction(){
        $mapRequestOutput   =   array();
        switch($_REQUEST['action']){
            case STATE_CITY_SEARCH:
                $mapRequestOutput   =   processDataRequest('search_state_city',$_REQUEST['data']);
                break;
            case CITY_LOCATION_SEARCH:
                $mapRequestOutput   =   processDataRequest('search_city_location',$_REQUEST['data']);
                break;
            case STATE_SCHOOL_SEARCH:
                $mapRequestOutput   =   processDataRequest('search_state_school',$_REQUEST['data']);
                break;
            case SCHOOL_INFO_SEARCH:
                $mapRequestOutput   =   processDataRequest('search_school_info',$_REQUEST['data']);
                break;
            default:
                break;
        }
        return $mapRequestOutput;
    }
?>