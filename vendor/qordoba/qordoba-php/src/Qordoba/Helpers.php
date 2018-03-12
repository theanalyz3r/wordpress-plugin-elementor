<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

// Helper functions


function isJson($string) {
  json_decode($string);
  return (json_last_error() == JSON_ERROR_NONE);
}