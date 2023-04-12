<?php

namespace App\Http\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendEmailService
{
    public function sendVerificationEmail($email)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'anhd10315@gmail.com';
            $mail->Password = 'sahguxffvzeahbzs';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('anhd10315@gmail.com', 'Booking Doctor');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Email verification';
            $mail->Body = '<h2>You have registered successfully</h2>';

            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendApprovedDoctorEmail($email)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'anhd10315@gmail.com';
            $mail->Password = 'sahguxffvzeahbzs';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('anhd10315@gmail.com', 'Booking Doctor');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Doctor Request Approved';
            $mail->Body = '<h2>Great! Your request to become a doctor has been approved</h2>';
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendRefusedDoctorEmail($email)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'anhd10315@gmail.com';
            $mail->Password = 'sahguxffvzeahbzs';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('anhd10315@gmail.com', 'Booking Doctor');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Doctor Request is refused';
            $mail->Body = '<h2>Unfortunately! Your request has been refused</h2><br>
            But we’d like to thank you for talking to our team and giving us the
            opportunity to learn about your skills and accomplishments.<br> 
            We hope you’ll keep us in mind and we encourage you to apply again.<br> 
            We wish you good luck with your job search and professional future
            endeavors.';
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendAcceptBookingEmail($email)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'anhd10315@gmail.com';
            $mail->Password = 'sahguxffvzeahbzs';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('anhd10315@gmail.com', 'Booking Doctor');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Booking is accepted';
            $mail->Body = '<h2>Your booking has been accepted by the doctor <br> The doctor will be at your address in a moment</h2>';
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendCancelBookingEmail($email)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'anhd10315@gmail.com';
            $mail->Password = 'sahguxffvzeahbzs';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('anhd10315@gmail.com', 'Booking Doctor');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Booking is cancelled';
            $mail->Body = '<h2>Sorry, your booking was canceled for some reason <br> You can review and book another doctor.</h2>';
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendCompleteBookingEmail($email)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'anhd10315@gmail.com';
            $mail->Password = 'sahguxffvzeahbzs';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('anhd10315@gmail.com', 'Booking Doctor');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Booking is completed';
            $mail->Body = '<h2>Your booking is complete <br> Thank you for trusting the doctor. <br>
            You can rate and comment for our doctor to improve more</h2>';
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
