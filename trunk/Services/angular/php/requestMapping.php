<?php
    function mapRequestAction(){
        $mapRequestOutput   =   array();
        switch($_REQUEST['action']){
            case SCHOOL_SEARCH:
                $mapRequestOutput   =   processDataRequest('search_state_city',$_REQUEST['data']);
                break;
            default:
                break;
        }
        return $mapRequestOutput;
    }
?>