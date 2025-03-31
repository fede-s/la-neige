<?php

class HubSpot {

   static public function createButton($formId, $buttonText, $class = 'btn btn-primary', $formValues = null) {
      return include(__DIR__ . '/hub-button.php');
   }

   static public function createPopUp($formId, $formTitle = '') {
      return include(__DIR__ . '/hub-popup.php');
   }

   static public function createForm($formId, $deferred = TRUE) {
      return include(__DIR__ . '/hub-form.php');
   }
}

?>
