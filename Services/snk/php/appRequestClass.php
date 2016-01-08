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
        $db_response    =   DB_Query('Select ui.presentvotestatus,ui.presentvoteoption,po.*,olt.* from userinfo as ui,presentOption as po left join optionlisttable as olt on po.optionlisttableid = olt.optionid where ui.userid = '.$_SESSION['userid'],'ASSOC','','presentoptionid');
        return $db_response;
    }
    function get_present_options($requestVars){
        $db_response    =   array();
        $orderStatus    =   DB_Query('Select * from orderstatus left join optionlisttable on orderstatus.orderoptionid = optionlisttable.optionid order by orderstatus.orderid desc limit 0,1','ASSOC','');
        $db_response    =   DB_Query('Select ui.presentvotestatus,ui.presentvoteoption,po.*,olt.* from userinfo as ui,presentOption as po left join optionlisttable as olt on po.optionlisttableid = olt.optionid where ui.userid = '.$_SESSION['userid'],'ASSOC','','presentoptionid');
        return array('orderstatus'=>$orderStatus[0],'optiondata'=>$db_response);
    }
    function get_next_day_options($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Query('Select ui.nextvotestatus,ui.nextvoteoption,olt.* from userinfo as ui,optionlisttable as olt where ui.userid ='.$_SESSION['userid'].' order by olt.optionVoteCount desc','ASSOC','');
        return $db_response;
    }
    function submit_next_day_option($requestVars){
        $db_response    =   array();
        $alreadySubmitOption    =   false;
        $fieldToIncrement   =   (int)$requestVars['optionId'];

        $previousResponse   =   DB_Read(array('Table'=>'userinfo','Fields'=>'nextvotestatus,nextvoteoption','clause'=>'userid = '.$_SESSION['userid']),'ASSOC','');
        if($previousResponse[0]['nextvotestatus'] == 1){
            $alreadySubmitOption    =   $previousResponse[0]['nextvoteoption'];
        }
        if($alreadySubmitOption){
            DB_Query('Update optionlisttable set optionVoteCount = optionVoteCount-1 where optionid = '.$alreadySubmitOption);
        }
        $db_response    =   DB_Query('Update userinfo set nextvotestatus = 1,nextvoteoption = '.$fieldToIncrement.' where userid = '.$_SESSION['userid']);
        $db_response    =   DB_Query('Update optionlisttable set optionVoteCount = optionVoteCount+1 where optionid = '.$fieldToIncrement);
        $db_response    =   DB_Query('Select ui.nextvotestatus,ui.nextvoteoption,olt.* from userinfo as ui,optionlisttable as olt where ui.userid ='.$_SESSION['userid'].' order by olt.optionVoteCount desc','ASSOC','');
        return $db_response;
    }
    function change_pswd($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Read(
            array(
                'Table'=>'userinfo',
                'Fields'=>'password',
                'clause'=>'userid = '.$_SESSION['userid']
            ),'ASSOC','');
        if($db_response[0]['password'] == md5($requestVars['currentPswd'])){
            $db_response    =   DB_Update(array('Table'=>'userinfo','Fields'=>array('password'=>md5($requestVars['newPswd'])),'clause'=>'userid = '.$_SESSION['userid']));
            if(!$db_response){
                $db_response =   102; // password update failed
            }
        }
        else{
            $db_response  =   101;   // passwords do not match
        }
        return $db_response;
    }
?>