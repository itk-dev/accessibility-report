<?php

namespace Drupal\web_accessibility_statement\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Web accessibility statement controller.
 */
class AccessibilityRedirectController extends ControllerBase {

  /**
   * Redirects to accessibility statement.
   */
  public function accessibilityRedirect() {
    $accessibilityStatementPath = \Drupal::config('web_accessibility_statement.accessibilityadmin')->get('web_accessibility_statement_url');
    return new  \Drupal\Core\Routing\TrustedRedirectResponse($accessibilityStatementPath);
  }

}
