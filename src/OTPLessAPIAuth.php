<?php

namespace Otpless;

require '../vendor/autoload.php';

class OTPLessAPIAuth
{
    public function sendOtp($clientId, $clientSecret, $phoneNumber, $email, $expiry, $hash, $otpLength, $channels, $metadata)
    {
        try {
            $url = 'https://auth.otpless.app/auth/v1/initiate/otp';
            $headers = array(
                "clientId: $clientId",
                "clientSecret: $clientSecret",
                "Content-Type: application/json",
            );

            $data = array(
                "otpLength" => $otpLength,
                "otpHash" => $hash,
                "channels" => $channels,
                "expiry" => $expiry,
                "metadata" => $metadata,
            );

            if (isset($phoneNumber) && !is_null($phoneNumber)) {
                $data['phoneNumber'] = $phoneNumber;
            }

            if (isset($email) && !is_null($email)) {
                $data['email'] = $email;
            }

            $jsonData = json_encode($data);

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $responseBody = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('cURL error: ' . curl_error($ch));
            }

            curl_close($ch);

            $responseData = json_decode($responseBody, true);

            return json_encode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function verifyOtp($clientId, $clientSecret, $requestId, $otp)
    {
        try {
            $url = 'https://auth.otpless.app/auth/v1/verify/otp';

            $headers = array(
                "clientId: $clientId",
                "clientSecret: $clientSecret",
                "Content-Type: application/json",
            );

            $data = array(
                "otp" => $otp,
                "requestId" => $requestId,
            );

            $jsonData = json_encode($data);

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $responseBody = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('cURL error: ' . curl_error($ch));
            }

            curl_close($ch);

            $responseData = json_decode($responseBody, true);

            return json_encode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function generateMagicLink($clientId, $clientSecret, $phoneNumber, $email, $expiry, $redirectURI, $channels, $metadata)
    {
        try {
            $url = 'https://auth.otpless.app/auth/v1/initiate/magiclink';

            $headers = array(
                "clientId: $clientId",
                "clientSecret: $clientSecret",
                "Content-Type: application/json",
            );

            $data = array(
                "redirectURI" => $redirectURI,
                "channels" => $channels,
                "expiry" => $expiry,
                "metadata" => $metadata,
            );

            if (isset($phoneNumber) && !is_null($phoneNumber)) {
                $data['phoneNumber'] = $phoneNumber;
            }

            if (isset($email) && !is_null($email)) {
                $data['email'] = $email;
            }
            $jsonData = json_encode($data);

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $responseBody = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('cURL error: ' . curl_error($ch));
            }

            curl_close($ch);

            $responseData = json_decode($responseBody, true);

            return json_encode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function generateOTPLink($clientId, $clientSecret, $phoneNumber, $email, $expiry, $hash, $otpLength, $redirectURI, $channels, $metadata)
    {
        try {
            $url = 'https://auth.otpless.app/auth/v1/initiate/otplink';

            $headers = array(
                "clientId: $clientId",
                "clientSecret: $clientSecret",
                "Content-Type: application/json",
            );

            $data = array(
                "otpLength" => $otpLength,
                "otpHash" => $hash,
                "redirectURI" => $redirectURI,
                "channels" => $channels,
                "expiry" => $expiry,
                "metadata" => $metadata,
            );

            if (isset($phoneNumber) && !is_null($phoneNumber)) {
                $data['phoneNumber'] = $phoneNumber;
            }

            if (isset($email) && !is_null($email)) {
                $data['email'] = $email;
            }
            $jsonData = json_encode($data);

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $responseBody = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('cURL error: ' . curl_error($ch));
            }

            curl_close($ch);

            $responseData = json_decode($responseBody, true);

            return json_encode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function verifyCode($clientId, $clientSecret, $code)
    {
        try {
            $url = "https://auth.otpless.app/auth/v1/verify/code";
            $headers = array(
                "clientId: $clientId",
                "clientSecret: $clientSecret",
                "Content-Type: application/json",
            );

            $data = array(
                "code" => $code,
            );

            $jsonData = json_encode($data);

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseBody = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('cURL error: ' . curl_error($ch));
            }

            curl_close($ch);

            $responseData = json_decode($responseBody, true);

            return json_encode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function initiateOAuth($clientId, $clientSecret, $channels, $redirectURI, $expiry, $metadata)
    {
        try {
            $url = "https://auth.otpless.app/auth/v1/initiate/oauth";

            $headers = array(
                "clientId: $clientId",
                "clientSecret: $clientSecret",
                "Content-Type: application/json",
            );

            $data = array(
                "channels" => $channels,
                "redirectURI" => $redirectURI,
                "expiry" => $expiry,
                "metadata" => $metadata,
            );

            $jsonData = json_encode($data);

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseBody = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('cURL error: ' . curl_error($ch));
            }

            curl_close($ch);

            $responseData = json_decode($responseBody, true);

            return json_encode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function checkOtpStatus($clientId, $clientSecret, $url, $requestId)
    {
        try {
            $headers = array(
                "clientId: $clientId",
                "clientSecret: $clientSecret",
                "Content-Type: application/json",
            );

            $data = array(
                "requestId" => $requestId,
            );

            $jsonData = json_encode($data);

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseBody = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('cURL error: ' . curl_error($ch));
            }

            curl_close($ch);

            $responseData = json_decode($responseBody, true);

            return json_encode($responseData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
