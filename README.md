# [Apiato](https://github.com/apiato/apiato) 2FA Container

### Multi-Factor Authentication MFA  , 2FA.

#### This Container is used to manage the 2 Factor Authentication using any app like Google Authenticator

#### Note: This container is not fully tested, use with caution.

### Installation
Only Works in Existing Apiato Application   <br>
Read more about the Apiato container installer in the [docs](http://apiato.io/docs/miscellaneous/container-installer)!

<br>




#### Steps

> composer require elshaden/apiato-otpkey 

> Add the ***use HasOtpKeyTrait***  in the User Model

> Migrate the  table 'otp_keys'

> and you are ready to go

> Check Config File in Configs Dir for any changes

### Usage

#### To find if user has MFA Key 

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
<br>

#### To Create New MFA key
 
````
$user-> CreateOtpKey();
````
This will return :
The Otp_key Record created
with otp Key ( basse 64 TOTP key)
QR code inform of Base 64 Image
and the user Id

<br>

#### Update the Key

````
$user->UpdateKey();

````
This will regnertae the Key and updates the record

<br>

#### To generate a QR code for a given code

````
$user->GetQrCode($code) ;
````
 <br>


#### To Verfiy a given Token is valid ( the six numbers in the authenticator)

````
$user->ValidateKey($Code);       // The code must be the six digits in the Authenticator

 ````

<br>

#### Generate Code

````
$user->GenerateCode();
````

This will generate a 6 Digits Code based on the user token, at any given time
The code should match any authenticator App's such as Google Authenticator


<br>

# API Endpoints

Endpoint | Method |Parameteres | Usage | Response
| :--- | ---: | ---: | ------: | :---:
**/otpkeys**  | POST |user_id | Creates New User Token  | ``string "id",   int "user_id",  string "code",   image "qr_code" ``
**/validate-otpkeys**  | POST |id , pin , slots| Validates 6 digits pin   | ``bool "result" ``
**/validate-usercode**  | POST |pin | Validates pin By User Bearer Token  |  ``bool "result" ``
**/generate-otpkey**  | GET | | Generates 6 Digits pin From  Bearer Token  | ``int "code"   ``

 In Addition to Find, delete and Update OtpToken for any user.    

 Note when validating the Otp in  validate-otpkeys   slots  means validate the key for past <slots> of 30 seconds each.

For example 10 Slots means 10 * 30 seconds = 300 seconds    / 60     =  5 minutes. So the Otp is valid for the pas 5 minutes.

For 5 Minutes Token,   slots  =  5 * 60   = 300

For one day Token,   slots  =  24 * 60 * 60   = 86400   

the longer the period the more time it takes to check the validity, so please try to be conservative.















