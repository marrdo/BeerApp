<div class="form-floating mb-3">
  <input 
    type="<?= htmlspecialchars($type) ?>" 
    class="<?= htmlspecialchars($class ?? 'form-control') ?>" 
    id="<?= htmlspecialchars($fieldId) ?>" 
    name="<?= htmlspecialchars($fieldName) ?>"
    placeholder="<?= htmlspecialchars($placeholder ?? '') ?>" 
    value="<?= htmlspecialchars($value ?? '') ?>" 
    <?= !empty($required) ? 'required' : '' ?> 
    <?= !empty($readonly) ? 'readonly' : '' ?> 
    <?= !empty($disabled) ? 'disabled' : '' ?> 
    <?= !empty($maxlength) ? 'maxlength="' . htmlspecialchars($maxlength) . '"' : '' ?> 
    <?= !empty($minlength) ? 'minlength="' . htmlspecialchars($minlength) . '"' : '' ?> 
    <?= !empty($pattern) ? 'pattern="' . htmlspecialchars($pattern) . '"' : '' ?> 
    <?= !empty($title) ? 'title="' . htmlspecialchars($title) . '"' : '' ?> 
    <?= !empty($autocomplete) ? 'autocomplete="' . htmlspecialchars($autocomplete) . '"' : '' ?> 
    <?= !empty($autofocus) ? 'autofocus' : '' ?> 
    <?= !empty($step) ? 'step="' . htmlspecialchars($step) . '"' : '' ?> 
    <?= !empty($min) ? 'min="' . htmlspecialchars($min) . '"' : '' ?> 
    <?= !empty($max) ? 'max="' . htmlspecialchars($max) . '"' : '' ?> 
    <?= !empty($ariaLabel) ? 'aria-label="' . htmlspecialchars($ariaLabel) . '"' : '' ?> 
    <?= !empty($ariaDescribedby) ? 'aria-describedby="' . htmlspecialchars($ariaDescribedby) . '"' : '' ?>
  >
  <label for="<?= htmlspecialchars($fieldId) ?>"><?= htmlspecialchars($label) ?></label>
</div>