<?php
/**
 * InvoiceTypeEnum
 *
 * PHP version 5
 *
 * @category Class
 * @package  App\libraries
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * e-MCF
 *
 * DGI Bénin - Tous droits réservés
 *
 * OpenAPI spec version: 1.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.23
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace App\libraries\Model;
use \App\libraries\ObjectSerializer;

/**
 * InvoiceTypeEnum Class Doc Comment
 *
 * @category Class
 * @package  App\libraries
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InvoiceTypeEnum
{
    /**
     * Possible values of this enum
     */
    const FV = 'FV';
const FA = 'FA';
const EV = 'EV';
const EA = 'EA';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::FV,
self::FA,
self::EV,
self::EA,        ];
    }
}
