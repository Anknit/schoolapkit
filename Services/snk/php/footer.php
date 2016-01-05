<?php
?>
        <div class='container'>
            <div class='container-fluid center-block'>
                <p class='center-block text-primary text-center'>&#169; 2015 Designed by Ankit Agarwal</p>
            </div>
        </div>
        <footer>
<?php
    require_once 'dependencyScripts.php';
//    $stateListData   =   processDataRequest('get_state_list','');
?>
            <script type="text/javascript">
//                var stateJson   =   '<?php // echo json_encode($stateListData); ?>';
            </script>
            <script type="text/javascript" src="./../../Common/js/jquery/jquery.js"></script>
            <script type="text/javascript" src="./../../Common/js/bootstrap/bootstrap.min.js"></script>
            <script type="text/javascript" src="./../../Common/js/angular/angular.min.js"></script>
            <script type="text/javascript" src="./../../Common/js/angular/angular-route.min.js"></script>
            <script type="text/javascript" src="./js/appmodule.js"></script>
<!--
            <script type="text/javascript" src="./controller/left-pane-controller.js"></script>
-->
            <script type="text/javascript" src="./controller/home-controller.js"></script>
            <script type="text/javascript" src="./controller/next-day-controller.js"></script>
<!--
            <script type="text/javascript" src="./controller/school-controller.js"></script>
            <script type="text/javascript" src="./controller/school-search-controller.js"></script>
-->
        </footer>
    </body>
</html>