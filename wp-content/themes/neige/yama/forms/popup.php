<div id="form-<?= $formId ?>" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="btn btn-primary close" onclick="closeModal()">&times;</button>
            <h4 class="modal-title"><?= $formTitle ?></h4>
         </div>
         <div class="modal-body">
            <div class="hbspt-form">
               <?= get_field('form', $formId) ?>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
var form = document.getElementById('form-<?= $formId ?>'),
   page = document.getElementById('page');

page.appendChild(form);
form.onsubmit = function() {
   closeModal();
};
</script>
