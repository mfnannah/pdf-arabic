<?php

namespace Mfnannah\PdfArabic\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mfnannah\PdfArabic\PdfArabic
 */
class PdfArabic extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mfnannah\PdfArabic\PdfArabic::class;
    }
}
