<?php
require('fpdf.php');

function generateReceipt($insid, $name, $email, $amount, $msg, $mobile, $purpose, $today, $directory) {
    //create pdf object
    $pdf = new FPDF('P', 'mm', 'A4');
    //add new page
    $pdf->AddPage();

    //set font to arial, bold, 14pt
    $pdf->SetFont('Arial', 'B', 14);

    //Cell(width , height , text , border , end line , [align] )
    $pdf->Cell(130, 5, 'Amma Orphan Home', 0, 0);
    $pdf->Cell(59, 5, 'Donation Receipt', 0, 1);//end of line

    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(130, 5, '# 4-133, Hemachandrapuram,', 0, 0);
    $pdf->Cell(22, 5, 'Receipt No:', 0, 0);
    $pdf->Cell(37, 5, " ". $insid, 0, 1);//end of line

    $pdf->Cell(130, 5, 'Karukonda Gram Panchayat,', 0, 0);
    $pdf->Cell(11, 5, 'Date:', 0, 0);
    $pdf->Cell(37, 5, " ". date("M jS, Y", strtotime($today)), 0, 1);//end of line

    $pdf->Cell(130, 5, 'Kothagudem, Telangana, India.', 0, 1);
    $pdf->Cell(130, 5, 'Phone: +91 87907 82983', 0, 1);
    $pdf->Cell(130, 5, 'www.ammaorphanhome.org', 0, 1);

    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189, 10, '', 0, 1);//end of line

    //receipt contents
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Donar Name', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, "$name", 1, 1);

    //Numbers are right-aligned so we give 'R' after new line parameter
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Address', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, ' -', 1, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Email', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, "$email", 1, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Phone', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, "$mobile", 1, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Donation Cause', 1, 0);
    $pdf->SetFont('Arial', '', 12);

    // Donation for Amma Home
    if(!empty($purpose)){
        if($purpose == 'Donation for Amma Home'){
            if(!empty($msg)){
                $pdf->Cell(120, 5, "$msg", 1, 1);
            } else {
                $pdf->Cell(120, 5, "$purpose", 1, 1);
            }
        } else {
            $pdf->Cell(120, 5, "$purpose", 1, 1);
        }
    } else {
        $pdf->Cell(120, 5, "$msg", 1, 1);
    }

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Donation Amount', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, "Rs." .$amount. "/-", 1, 1);

    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(180, 10, '', 0, 1);//end of line
    $pdf->Cell(180, 5, 'Thank you for your generous donation!', 1, 0, 'C');
    $pdf->Output($directory . "Donation_" .$insid. ".pdf", "F");
}

function sendEmail($file_name, $name, $email, $directory){
    if(!empty($file_name)) {
        $file = $directory . $file_name;
        $file_size = filesize($file);
        $handle = fopen($file, "r");
        $content = fread($handle, $file_size);
        fclose($handle);
        $content = chunk_split(base64_encode($content));

        $uid = md5(uniqid(time()));
        $body = " 
                <html> 
                <body>
                   <table style='border: 0px solid #06F;padding:10px;border-radius:10px;'>
                      <tr>
                          <td width='500'>
                              <div class='maindiv'>
<pre>Hi $name,

Greetings from Amma Orphan Home!
Thanks you for you donation, Please find the attached receipt.
Your Sincerely!

Thanks & Regards,
Amma Orphan Home.

If you have any questions, you may contact Teja E, President of Amma Orphan Home, at +918790782983.
</pre>
                              </div>
                          </td>
                      </tr>
                  </table>
                </body>
                </html>";

        $eol = PHP_EOL;
        // Basic headers
        $header = "From: info@ammaorphanhome.org" . $eol;
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"";

        // Put everything else in $message
        $message = "--" . $uid . $eol;
        $message .= "Content-Type: text/html; charset=ISO-8859-1" . $eol;
        $message .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
        $message .= $body . $eol;

        $message .= "--" . $uid . $eol;
        $message .= "Content-Type:  pdf ; name=\"" . $file_name . "\"" . $eol;
        $message .= "Content-Transfer-Encoding: base64" . $eol;
        $message .= "Content-Disposition: attachment; filename=\"" . $file_name . "\"" . $eol;
        $message .= $content . $eol;
        $message .= "--" . $uid . "--";

        // send the mail
        if (mail($email, "Thank you for your Donation - Amma Orphan Home", $message, $header)) {
        } else {
        }
    }
}
?>
