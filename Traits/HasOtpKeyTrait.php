<?php


namespace App\Containers\Vendor\OtpKey\Traits;


use App\Containers\Vendor\OtpKey\Classes\QRGenerator;
use App\Containers\Vendor\OtpKey\Classes\TwoFactorAuthenticationProvider as MFA;
use App\Containers\Vendor\OtpKey\Models\OtpKey;
use App\Containers\Vendor\OtpKey\Tasks\CreateOtpKeyTask;
use App\Containers\Vendor\OtpKey\Tasks\FindOtpKeyByUserIdTask;
use App\Containers\Vendor\OtpKey\Tasks\UpdateOtpKeyTask;
use App\Ship\Exceptions\NotFoundException;
use Lcobucci\JWT\Exception;

trait HasOtpKeyTrait
{

    public function otp_key()
    {
        return $this->belongsTo(OtpKey::class);
    }

    public function HasOtp()
    {
        try {
            return app(FindOtpKeyByUserIdTask::class)->run($this->id);
        } catch (Exception $e) {
            return false;
        }


    }

    public function CreateOtpKey()
    {
        if ($this->HasOtp()) return $this->UpdateKey($this->HasOtp());
        $Code = $this->generateKey();

        $QR = encrypt(app(QRGenerator::class)->twoFactorQrCodeSvg($this->GetQrCode($Code)));
        $OtpRecord = app(CreateOtpKeyTask::class)->run([
            'user_id' => $this->id,
            'code' => encrypt($Code),
            'qr_code' => $QR,

        ]);
        return $OtpRecord;
    }


    public function generateKey()
    {
        return app(MFA::class)->generateSecretKey();

    }


    public function UpdateKey($Record)
    {
        $Code = $this->generateKey();
        $QR = encrypt(app(QRGenerator::class)->twoFactorQrCodeSvg($this->GetQrCode($Code)));
        $OtpRecord = app(UpdateOtpKeyTask::class)->run($Record->id, [
            'code' => encrypt($Code),
            'qr_code' => $QR,
        ]);
        return $OtpRecord;
    }

    public function GetQrCode($code)
    {
        $strAuthUrl = app(MFA::class)->qrCodeUrl(
            $this->name,
            $this->email,
            $code
        );

        return $strAuthUrl;
    }

    public function ValidateKey($Code)
    {

        $secret = $this->HasOtp();
        if (!$secret) throw new NotFoundException();

        return app(MFA::class)->verify(decrypt($secret->code), $Code);
    }

    private function GetResponse(OtpKey $OtpRecord)
    {
        return [
            'code' => $OtpRecord->code,
            'qr_image' => $this->GetQrCode($OtpRecord->code),

        ];


    }

    public function ActivateMfa()
    {

        $Code = $this->HasOtp();

        return $Code->update(['active' => 1]);
    }
}
