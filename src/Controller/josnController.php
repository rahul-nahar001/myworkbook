<?php

namespace Drupal\myworkbook\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * An josnController controller.
 */
class josnController extends ControllerBase {

  /**
   * Returns a json for the node.
   */
  public function json(NodeInterface $node) {
    $json_array['data'] = array(
      'type' => $node->get('type')->target_id,
      'id' => $node->get('nid')->value,
      'attributes' => array(
        'title' => $node->get('title')->value,
        'content' => $node->get('body')->value,
      ),
    );

    return new JsonResponse($json_array);
  }

}
