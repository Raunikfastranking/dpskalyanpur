<?php
/**
 * Extra Edge enquiry form mount point.
 * Same widget/fields as popup Enquire Now form (session, hostel, grade, etc.).
 *
 * Optional vars before include:
 * - $eeFormDomId (string) unique DOM id
 * - $eeFormTitle (string|null)
 * - $eeFormTitleClass (string)
 */
$eeFormDomId = preg_replace('/[^A-Za-z0-9_-]/', '', (string) ($eeFormDomId ?? 'ee-form-page'));
if ($eeFormDomId === '') {
    $eeFormDomId = 'ee-form-page';
}
$eeFormTitle = $eeFormTitle ?? null;
$eeFormTitleClass = $eeFormTitleClass ?? 'text-center text-2xl font-bold text-blue-main mb-6';
?>
<?php if (!empty($eeFormTitle)): ?>
    <h2 class="<?= htmlspecialchars($eeFormTitleClass, ENT_QUOTES, 'UTF-8') ?>">
        <?= htmlspecialchars($eeFormTitle, ENT_QUOTES, 'UTF-8') ?>
    </h2>
<?php endif; ?>
<div
    id="<?= htmlspecialchars($eeFormDomId, ENT_QUOTES, 'UTF-8') ?>"
    class="dps-ee-form"
    data-ee-org="superhouseeducation"
    data-ee-form="form-3"
    style="width: 100%; max-width: 448px; margin: 0 auto; box-sizing: border-box;"
></div>
