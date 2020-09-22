<?php

namespace Drupal\accessibility_report\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class AccessibilityAdminForm.
 */
class AccessibilityAdminForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'accessibility_report.accessibilityadmin',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'accessibility_admin_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('accessibility_report.accessibilityadmin');
    $form['accessibility_report_path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Accessibility report path'),
      '#description' => $this->t('Add the full path to the accessibility report.'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('accessibility_report_path'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('accessibility_report.accessibilityadmin')
      ->set('accessibility_report_path', $form_state->getValue('accessibility_report_path'))
      ->save();
  }

}
