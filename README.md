## Apiato OtpKey Container
### Multi-Factor Authentication MFA  , 2FA.

####This Container is used to manage the 2 Factor Authentication using any app like Google Authenticator
 
>Just add the  use HasOtpKeyTrait in the User Model

>Migrate the  table 'otp_keys'

>and you are ready to go

 ###Usage

####To find if user has MFA Key 

```
$user-> HasOtp();

 ```
This will return the full record of the Otp Key.

```
object   // OtpKey
id          // Hashed OtpKey Id
user_id
code      // Base64 OtpKey Code
qr_code    // QR Code Image
active     // Active or not
created_at
updated_at
readable_created_at
readable_updated_at
 ```


####To Create New MFA key
 
````
$user-> CreateOtpKey();
````
This will return :
The Otp_key Record created
with otp Key ( basse 64 TOTP key)
QR code inform of Base 64 Image
and the user Id


####Update the Key

````
$user->UpdateKey();

````
This will regnertae the Key and updates the record


####To generate a QR code for a given code

````
$user->GetQrCode($code)
````


####To Verfiy a given Token is valid ( the six numbers in the authenticator)

````
$user->ValidateKey($Code);       // The code must be the six digits in the Authenticator

 ````
