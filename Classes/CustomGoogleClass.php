<?php

namespace App\Containers\Vendor\OtpKey\Classes;

class CustomGoogleClass
{
      /**
       * Find a valid One Time Password.
       *
       * @param string $secret
       * @return bool|int
       */
      public function GenerateValidOTP($secret)
      {

            $startingTimestamp = $this->makeCurretTimestamp();
            return $this->engine->oathTotp($secret, $startingTimestamp);

      }

      /**
       * Get/use a starting timestamp for key verification.
       *
       * @param string|int|null $timestamp
       *
       * @return int
       */
      protected function makeCurretTimestamp($timestamp = null)
      {
            if (is_null($timestamp)) {
                  return $this->engine->getTimestamp();
            }

            return (int)$timestamp;
      }
}
