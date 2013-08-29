<?php
    //My userView that will include all the include pages i have. 
class userView {

    public function showHeader($pageTitle = '') {
        include "header.inc";
    }

    public function showFooter() {
        include "footer.inc";
    }

    public function showLocation($rows) {
        include "showLocation.inc";
    }

    public function showCoasterDetails($rows) {
        include "showLocationDetails.inc";
    }

    public function show($template, $data = array()) {
        $templatePath = "views/${template}.inc";
        if (file_exists($templatePath)) {
            include $templatePath;
        }
    }
}