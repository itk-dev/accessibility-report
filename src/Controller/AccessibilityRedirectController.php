<?php

namespace Drupal\web_accessibility_statement\Controller;

use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Drupal\web_accessibility_statement\Form\AccessibilityAdminForm;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Web accessibility statement controller.
 */
class AccessibilityRedirectController extends ControllerBase {

  public function __construct(
    private readonly ImmutableConfig $config,
  ) {
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $config = $container->get('config.factory')->get(AccessibilityAdminForm::CONFIG_NAME);

    return new static($config);
  }

  /**
   * Redirects to web accessibility statement URL.
   */
  public function accessibilityRedirect() {
    $url = $this->config->get('url');

    if (NULL === $url) {
      throw new NotFoundHttpException();
    }

    return new TrustedRedirectResponse($url);
  }

}
