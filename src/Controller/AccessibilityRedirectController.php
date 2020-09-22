<?php

namespace Drupal\accessibility_report\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Accessibility report controller.
 */
class AccessibilityRedirectController extends ControllerBase {

  /**
   * Redirects to accessibility report.
   */
  public function accessibilityRedirect() {
    $accessibilityReportPath = \Drupal::config('accessibility_report.accessibilityadmin')->get('accessibility_report_path');
    return new  \Drupal\Core\Routing\TrustedRedirectResponse($accessibilityReportPath);
  }

}
