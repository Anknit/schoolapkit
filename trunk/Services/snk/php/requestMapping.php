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
            case SUBMIT_NEXT_DAY_OPTION:
                $mapRequestOutput   =   processDataRequest('submit_next_day_option',$_REQUEST['data']);
                break;
            case CHANGE_PASSWORD:
                $mapRequestOutput   =   processDataRequest('change_pswd',$_REQUEST['data']);
                break;
            default:
                break;
        }
        return $mapRequestOutput;
    }
?>