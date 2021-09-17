<?php


namespace App\Containers\Vendor\OtpKey\Classes;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Collection;
use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class TwoFactorAuthenticationProvider
{
    protected $engine;

    public function __construct(Google2FA $engine)
    {
        $this->engine = $engine;
    }

    public function generateSecretKey()
    {
        return $this->engine->generateSecretKey();
    }

    public function generateRecoveryCodes($times = 8, $random = 10)
    {
        return Collection::times($times, function () use ($random) {
            return Str::random($random).'-'.Str::random($random);
        })->toArray();
    }

    public function qrCodeUrl(string $companyName, string $companyEmail, string $secret)
    {
        return $this->engine->getQRCodeUrl($companyName, $companyEmail, $secret);
    }

    public function verify(string $secret, string $code)
    {
        return $this->engine->verifyKey($secret, $code);
    }
}
