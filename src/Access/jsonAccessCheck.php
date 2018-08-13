<?php

namespace Drupal\myworkbook\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\node\NodeInterface;

/**
 * Class jsonAccessCheck.
 *
 * @package Drupal\myworkbook\Access
 */
class jsonAccessCheck implements AccessInterface {

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for API and node.
   */
  public function access($api, NodeInterface $node) {
    $config = \Drupal::config('system.site');
    $siteapikey = $config->get('siteapikey');
    $nodetype = $node->getType();
    if (isset($siteapikey) && $siteapikey == $api &&  $nodetype == "page") {
      // If the site api is found and node type is 'page' then allow access.
      return AccessResult::allowed();
    }
    return AccessResult::forbidden();
  }

}
