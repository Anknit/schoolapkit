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

    function get_state_list($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Read(
            array(
                'Table' => 'stateList',
                'Fields'=> 'stateId,stateName',
            )
        ,'ASSOC','','stateId');
        return $db_response;
    }

    function search_state_city($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Read(
            array(
                'Table' => 'cityList',
                'Fields'=> 'cityId,cityName',
                'clause'=> 'stateId = '.$requestVars['stateId']
            ),'ASSOC','','cityId'
        );
        return $db_response;
    }

    function search_city_location($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Read(
            array(
                'Table' => 'locationlist',
                'Fields'=> 'locationId,locationName',
                'clause'=> 'cityId = '.$requestVars['cityId']
            ),'ASSOC','','locationId'
        );
        return $db_response;
    }

    function search_state_school($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Read(
            array(
                'Table' => 'schoollist',
                'Fields'=> 'schoolId,schoolName,address,affiliationNum',
                'clause'=> 'stateName = "'.$requestVars['stateName'].'"',
                'order'=>'schoolId DESC LIMIT 0,10'
            ),'ASSOC','','schoolId'
        );
        return $db_response;
    }
?>