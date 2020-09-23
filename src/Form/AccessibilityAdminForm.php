<?php

namespace Drupal\web_accessibility_statement\Form;

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
      'web_accessibility_statement.accessibilityadmin',
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
    $config = $this->config('web_accessibility_statement.accessibilityadmin');
    $form['web_accessibility_statement_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Accessibility statement absolute url'),
      '#description' => $this->t('Add the absolute url to the accessibility report.'),
      '#maxlength' => 128,
      '#size' => 64,
      '#default_value' => $config->get('web_accessibility_statement_url'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('web_accessibility_statement.accessibilityadmin')
      ->set('web_accessibility_statement_url', $form_state->getValue('web_accessibility_statement_url'))
      ->save();
  }

}
