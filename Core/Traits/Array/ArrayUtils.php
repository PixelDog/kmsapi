<?php

namespace KMS\Traits;

trait ArrayUtils
{

  /**
  * Flatten a multidimensional array into a single array
  * @return array
  */
  public function flatten(array $array): array{
    $return = [];
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
  }

  /**
  * Check that an array has necessary keys
  * @return bool
  */
  public function checkRequired(array $template, array $array): bool {
    if (empty(array_diff($template, array_keys($array)))) {
      return true;
    }
    return false;
  }
}
