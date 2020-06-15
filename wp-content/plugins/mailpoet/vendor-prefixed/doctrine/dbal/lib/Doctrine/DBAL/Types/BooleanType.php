<?php
 namespace MailPoetVendor\Doctrine\DBAL\Types; if (!defined('ABSPATH')) exit; use MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform; class BooleanType extends \MailPoetVendor\Doctrine\DBAL\Types\Type { public function getSQLDeclaration(array $fieldDeclaration, \MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { return $platform->getBooleanTypeDeclarationSQL($fieldDeclaration); } public function convertToDatabaseValue($value, \MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { return $platform->convertBooleansToDatabaseValue($value); } public function convertToPHPValue($value, \MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { return $platform->convertFromBoolean($value); } public function getName() { return \MailPoetVendor\Doctrine\DBAL\Types\Type::BOOLEAN; } public function getBindingType() { return \PDO::PARAM_BOOL; } } 