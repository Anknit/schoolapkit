<?php
    class requestProcessor {
        private $calledMethod;
        public function __construct($requestName) {
            $this->calledMethod =   $requestName;
        }
        public function __destruct() {
            $this->calledMethod =   '';
        }
        public function callAppMethod ($requestVars){
            $methodResponse  =   call_user_func($this->calledMethod,$requestVars);
            return $methodResponse;
        }
    }
    
    function processDataRequest($requestName,$requestVars){
        $processObject  =   new requestProcessor($requestName);
        $processOutput  =   $processObject->callAppMethod($requestVars);
        return $processOutput;
    }

    function submit_option_selection($requestVars){
        $db_response    =   array();
        $fieldToIncrement   =   '';
        switch($requestVars['optionId']){
            case '1':
                $fieldToIncrement   =   1;
                break;
            case '2':
                $fieldToIncrement   =   2;
                break;
            default:
                break;
        }
        $db_response    =   DB_Query('Update presentOption set presentoptionvotecount = presentoptionvotecount+1 where presentoptionid = '.$fieldToIncrement);
        return $db_response;
    }
    
    function get_present_options($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Query('Select * from presentOption left join optionlisttable on presentOption.optionlisttableid = optionlisttable.optionid','ASSOC','','presentoptionid');
        return $db_response;
    }

    function get_next_day_options($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Query('Select * from optionlisttable','ASSOC','','optionid');
        return $db_response;
    }

    function submit_next_day_option(){
        $db_response    =   array();
        $fieldToIncrement   =   (int)$requestVars['optionId'];
        $db_response    =   DB_Query('Update presentOption set presentoptionvotecount = presentoptionvotecount+1 where presentoptionid = '.$fieldToIncrement);
        return $db_response;
    }

?>