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
        $alreadySubmitOption    =   false;
        $fieldToIncrement   =   (int)$requestVars['optionId'];
        
        $previousResponse   =   DB_Read(array('Table'=>'userinfo','Fields'=>'presentvotestatus,presentvoteoption','clause'=>'userid = '.$_SESSION['userid']),'ASSOC','');
        if($previousResponse[0]['presentvotestatus'] == 1){
            $alreadySubmitOption    =   $previousResponse[0]['presentvoteoption'];
        }
        if($alreadySubmitOption){
            DB_Query('Update presentOption set presentoptionvotecount = presentoptionvotecount-1 where presentoptionid = '.$alreadySubmitOption);
        }
        $db_response    =   DB_Query('Update userinfo set presentvotestatus = 1,presentvoteoption = '.$fieldToIncrement.' where userid = '.$_SESSION['userid']);
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
//        $db_response    =   DB_Query('Update presentOption set presentoptionvotecount = presentoptionvotecount+1 where presentoptionid = '.$fieldToIncrement);
        return $db_response;
    }

?>