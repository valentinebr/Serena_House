<?php
 namespace MailPoetVendor\Symfony\Component\Validator\Constraints; if (!defined('ABSPATH')) exit; use MailPoetVendor\Symfony\Component\PropertyAccess\PropertyAccess; use MailPoetVendor\Symfony\Component\Validator\Constraint; use MailPoetVendor\Symfony\Component\Validator\Exception\ConstraintDefinitionException; abstract class AbstractComparison extends \MailPoetVendor\Symfony\Component\Validator\Constraint { public $message; public $value; public $propertyPath; public function __construct($options = null) { if (null === $options) { $options = []; } if (\is_array($options)) { if (!isset($options['value']) && !isset($options['propertyPath'])) { throw new \MailPoetVendor\Symfony\Component\Validator\Exception\ConstraintDefinitionException(\sprintf('The "%s" constraint requires either the "value" or "propertyPath" option to be set.', \get_class($this))); } if (isset($options['value']) && isset($options['propertyPath'])) { throw new \MailPoetVendor\Symfony\Component\Validator\Exception\ConstraintDefinitionException(\sprintf('The "%s" constraint requires only one of the "value" or "propertyPath" options to be set, not both.', \get_class($this))); } if (isset($options['propertyPath']) && !\class_exists(\MailPoetVendor\Symfony\Component\PropertyAccess\PropertyAccess::class)) { throw new \MailPoetVendor\Symfony\Component\Validator\Exception\ConstraintDefinitionException(\sprintf('The "%s" constraint requires the Symfony PropertyAccess component to use the "propertyPath" option.', \get_class($this))); } } parent::__construct($options); } public function getDefaultOption() { return 'value'; } } 