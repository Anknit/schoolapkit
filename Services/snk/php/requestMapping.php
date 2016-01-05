<?php
    function mapRequestAction(){
        $mapRequestOutput   =   array();
        switch($_REQUEST['action']){
            case SUBMIT_OPTION:
                $mapRequestOutput   =   processDataRequest('submit_option_selection',$_REQUEST['data']);
                break;
            case PRESENT_OPTION_STATUS:
                $mapRequestOutput   =   processDataRequest('get_present_options',$_REQUEST['data']);
                break;
            case NEXT_DAY_OPTIONS:
                $mapRequestOutput   =   processDataRequest('get_next_day_options',$_REQUEST['data']);
                break;
            default:
                break;
        }
        return $mapRequestOutput;
    }
?>