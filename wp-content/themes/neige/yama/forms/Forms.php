<?php
namespace Yama;

class Forms {

   static public function createButton($formId, $buttonText, $class = 'btn btn-primary', $formValues = null) {
      return include(__DIR__ . '/button.php');
   }

   static public function createPopUp($formId, $formTitle = '') {
      return include(__DIR__ . '/popup.php');
   }

   static public function createForm($formId, $deferred = TRUE) {
      return include(__DIR__ . '/form.php');
   }
}

?>
