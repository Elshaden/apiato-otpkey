<?php


namespace App\Containers\Vendor\OtpKey\Classes;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class QRGenerator
{
    /**
     * Get the QR code SVG of the user's two factor authentication QR code URL.
     *
     * @return string
     */
    public function twoFactorQrCodeSvg($URL)
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(config('vendor-otpKey.QR_Code_size'), 0, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd
            )
        ))->writeString($URL);

        return trim(substr($svg, strpos($svg, "\n") + 1));
    }

}
