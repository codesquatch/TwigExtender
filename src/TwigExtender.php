<?php

namespace CodeSquatch;

use Twig\Environment;
use Twig_Extension;
use Twig_ExtensionInterface;
use Twig_SimpleFilter;
use Twig_SimpleFunction;


class TwigExtender extends Twig_Extension implements Twig_ExtensionInterface {

  public static function returnParam($param) {
    return $param;
  }

  public function initRuntime(Environment $environment) {
    // TODO: Implement initRuntime() method.
  }

  public static function drupalAttributes(array $attributes) {
    foreach ($attributes as $attribute => &$data) {
      $data = implode(' ', (array) $data);
      $data = $attribute . '="' . $data . '"';
    }
    return $attributes ? ' ' . implode(' ', $attributes) : '';
  }

  function getFunctions() {
    return [
      new Twig_SimpleFunction('drupal_attributes', [$this, 'drupalAttributes']),
    ];
  }

  function getGlobals() {
    return [];
  }

  function getName() {
    return 'CodeSquatch\TwigExtender';
  }

}