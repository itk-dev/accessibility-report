<?php

namespace Drupal\web_accessibility_statement\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class AccessibilityAdminForm.
 */
class AccessibilityAdminForm extends ConfigFormBase {

  public const CONFIG_NAME = 'web_accessibility_statement.settings';

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::CONFIG_NAME,
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
    $config = $this->config(self::CONFIG_NAME);

    $form['url'] = [
      '#type' => 'url',
      '#title' => $this->t('Web accessibility statement URL'),
      '#description' => $this->t('Absolute URL to the web accessibility statement.'),
      '#maxlength' => 256,
      '#size' => 64,
      '#required' => TRUE,
      '#default_value' => $config->get('url'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config(self::CONFIG_NAME)
      ->set('url', $form_state->getValue('url'))
      ->save();
  }

}
